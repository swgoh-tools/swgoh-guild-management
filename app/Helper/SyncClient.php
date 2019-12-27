<?php

declare(strict_types=1);

namespace App\Helper;

use App\Guild;
use App\Player;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

class SyncClient
{
    protected $lockfile = 'sync.lock';
    // protected $datadir = '/app/public/data/';
    protected $authdir = 'auth/';
    // protected $code_pattern = '/^[1-9]{9}$/';
    public $ignoreThreshold = false;
    public $origin = 'default'; // database flag used to identify why a database entry was added. Like website, crawler, manual...
    public $threshold = 0; // period how long existing data is used before it is declared stale
    public $threshold_retry = 60; // internal cooldown of processing requests
    protected $guild_id = 0;
    protected $guild_code = 0;
    protected $player_code = 0;
    protected $language = null;
    protected $missingGuildCodeWorkaround = false; //it is not possible to retrieve guild data with a guild reference. Guilds are identified by any member code. This flag is used to trigger additional workaround functions.
    protected $sort = [
        'id',
        'defId',
        'nameKey',
        'xp',
        'combatType',
        'crew',
        'mods',
        'equipped',
        'skills',
        'gear',
        'level',
        'rarity',
        'gp',
        'allyCode',
        'player',
        'pid',
    ];
    protected $sample = [
        'help.data.abilityList' => 'basicability_arc170clonesergeant',
        // 'help.data.battleEnvironmentsList' => '', // no id
        'help.data.battleTargetingRuleList' => 'target_self',
        'help.data.categoryList' => 'longitudinally_implemented',
        'help.data.challengeList' => 'daily-complete-light-mission',
        'help.data.challengeStyleList' => 'MAIN_1',
        'help.data.effectList' => 'generic_target_lock_single',
        'help.data.environmentCollectionList' => 'character_pvp_battle_collection',
        'help.data.equipmentList' => '001',
        'help.data.eventSamplingList' => 'rancor',
        // 'help.data.guildExchangeItemList' => '', // no id
        // 'help.data.guildRaidList' => '', // no id
        'help.data.helpEntryList' => 1, // carefull, this one is int
        'help.data.materialList' => 'shipability_mat_A',
        'help.data.playerTitleList' => 'GUILD_MEMBER_LEVEL_LEADER',
        'help.data.powerUpBundleList' => 'power-up-02-TIER_02',
        // 'help.data.raidConfigList' => '',
        // 'help.data.recipeList' => '',
        // 'help.data.requirementList' => '',
        // 'help.data.skillList' => '',
        // 'help.data.starterGuildList' => '',
        'help.data.statModList' => '111',
        'help.data.statModSetList' => '1',
        // 'help.data.statProgressionList' => '',
        // 'help.data.tableList' => '',
        'help.data.targetingSetList' => 'default_pvp',
        // 'help.data.territoryBattleDefinitionList' => '',
        // 'help.data.territoryWarDefinitionList' => '',
        // 'help.data.unitsList' => '',
        // 'help.data.unlockAnnouncementDefinitionList' => '',
        // 'help.data.warDefinitionList' => '',
        // 'help.data.xpTableList' => '',
    ];

    // public function __construct()
    // {

    // }

    public function isRunning()
    {
        if (Storage::disk('sync')->exists($this->lockfile)) {
            if (time() - Storage::disk('sync')->lastModified($this->lockfile) < $this->threshold_retry) {
                // return date instead of "true". Is used to display info for user on frontend
                return Storage::disk('sync')->lastModified($this->lockfile);
            }
        }

        return false;
    }

    public function clearLock()
    {
        return Storage::disk('sync')->delete($this->lockfile);
    }

    public function sync($target)
    {
        if ($this->isRunning()) {
            return 'already syncing';
        }

        if (auth()->check() && auth()->user()->hasRole('admin')) {
            ini_set('error_reporting', 'E_ALL');
            ini_set('display_errors', '1');
        }

        $sync_status = Cache::get('sync_status', []);
        $sync_status['error'] = '';
        ini_set('max_execution_time', '500');
        ini_set('default_socket_timeout', '300');
        ini_set('upload_max_filesize', '25M');
        ini_set('post_max_size', '25M');
        ini_set('memory_limit', '512M'); // 256 not enough
        ini_set('max_input_time', '300');

        $lang = SyncHelper::getLang($this->language);

        try {
            // throw new MyException();
            Storage::disk('sync')->put($this->lockfile, '');

            $help_prefix = 'help.data.';
            if (false !== strpos($target, $help_prefix)) {
                $collection = explode('.', $target, 3)[2];

                $sync_status[$help_prefix . $collection] = $this->syncHelpData($collection, $this->getHelpDataBody($collection, $lang), $this->sample[$help_prefix . $collection] ?? null, $lang);
                $this->prepareHelpData($collection, $lang);
                if (auth()->check() && auth()->user()->hasRole('admin')) {
                    // if admin, retrieve PEEK file (list of ids) and structure file
                    $sync_status[$help_prefix . $collection . 'PEEK'] = $this->syncHelpData($collection, null, null, $lang);
                    $sync_status[$help_prefix . $collection . 'STRUCTURE']['status'] = 'DISABLED';
                    // $sync_status[$help_prefix.$collection.'STRUCTURE'] = $this->syncHelpDataStructure($collection); //structure endpoints no longer exist
                }
            } else {
                switch ($target) {
                    case 'g-players':
                        $sync_status[$target] = $this->syncHelpGuildPlayers($this->player_code, 'players');
                        $this->prepareHelpGuildPlayers($this->guild_id);
                        break;

                    // case 'g-roster':
                    //     $sync_status[$target] = $this->syncHelpGuildPlayers($this->player_code, 'roster');
                    //     break;

                    // case 'g-units':
                    //     $sync_status[$target] = $this->syncHelpGuildPlayers($this->player_code, 'units');
                    //     break;

                    case 'gg.characters':
                        $sync_status[$target] = $this->syncGgToons();
                        break;

                    case 'gg.gear':
                        $sync_status[$target] = $this->syncGgGear();
                        break;

                    case 'gg.ships':
                        $sync_status[$target] = $this->syncGgShips();
                        break;

                    case 'gg.abilities':
                        $sync_status[$target] = $this->syncGgAbilities();
                        break;

                    case 'gg.guild.units':
                        $sync_status[$target] = $this->syncGgGuildUnits($this->guild_code);
                        break;

                    case 'crawler':
                        $this->origin = 'crawler';
                        $sync_status[$target . '-pre'] = $this->syncHelpPlayers($this->player_code);
                        $this->prepareHelpPlayers();

                        $this->origin = 'crawler2'; // allows to identify entries that where created as followup on guild sync
                        /*
                         * Do NOT break! After crawler has finished, run guild sync for any player that has a guild returned
                         */
                        // no break
                    case 'help.guild.units':
                        $sync_status[$target] = $this->syncHelpGuild($this->player_code);
                        if (\is_array($this->guild_id)) {
                            foreach ($this->guild_id as $id) {
                                $this->prepareHelpGuild($id);
                            }
                        } else {
                            $this->prepareHelpGuild($this->guild_id);
                        }
                        break;

                    case 'help.battles':
                        $body = [
                            'language' => $lang,
                            'enums' => true,
                        ];
                        $sync_status[$target] = $this->syncHelp('battles', $body, $lang);
                        break;

                    case 'help.events':
                        $body = [
                            'language' => $lang,
                            'enums' => true,
                        ];
                        $sync_status[$target] = $this->syncHelp('events', $body, $lang);
                        break;

                    case 'help.squads':
                        $sync_status[$target] = $this->syncHelp('squads', []);
                        break;

                    case 'help.zetas':
                        $body = [
                            'project' => [
                                'zetas' => 1,
                                ],
                            ];
                        $sync_status[$target] = $this->syncHelp('zetas', $body);
                        break;

                    case 's':
                        $sync_status[$target] = substr($this->getAccessToken(), 0, 7);
                        break;

                    default:
                        // code...
                        break;
                }
            }

            // $sync_status['ability'] = $this->syncGgAbility('specialskill_GRIEVOUS02');
        } catch (\Throwable $t) {
            $sync_status['error'] = $t; //get_class($e);
            $sync_status['test'] = time(); //get_class($e);
            dd($t);
        } catch (\Exception $e) {
            $sync_status['error'] = $e; //get_class($e);
            $sync_status['test'] = time(); //get_class($e);
            dd($e);
        } finally {
            Cache::forever('sync_status', $sync_status);
            $this->clearLock();

            return $sync_status;
        }
    }

    private function prepareHelpPlayers()
    {
        $source = 'swgoh.help/players/players.CRAWLER.json';
        $crawler_pending_guild = 'swgoh.help/players/players.CRAWLER.PENDING.json';
        $crawler_done_guild_log = 'swgoh.help/players/players.CRAWLER.DONE.with-guild.log';
        $crawler_done_single_log = 'swgoh.help/players/players.CRAWLER.DONE.no-guild.log';
        $crawler_error_log = 'swgoh.help/players/players.CRAWLER.ERROR.log';

        $pending_codes = [];
        if (Storage::disk('sync')->exists($crawler_pending_guild)) {
            $data = Storage::disk('sync')->get($crawler_pending_guild);
            $pending_codes = json_decode($data, true);
        }

        $player_codes_input = $this->player_code;
        $player_codes_processed = [];
        // DELETE all player codes
        // we add them back later, if needed
        $this->player_code = [];

        if (Storage::disk('sync')->exists($source)) {
            $data = Storage::disk('sync')->get($source);
            $players = json_decode($data, true);

            /*
             * DELETE the crawler file
             * we want any subsequent runs to call the api for new data
             * the files have random codes and cannot be reused
             */
            Storage::disk('sync')->delete($source);

            if ($players) {
                foreach ($players as $key => $player) {
                    $player_allyCode = $player['allyCode'] ?? '';
                    $player_name = $player['name'] ?? '';
                    $player_gp = null;
                    $guild_id = $player['guildRefId'] ?? '';
                    $guild_name = $player['guildName'] ?? '';
                    // Save player data to database
                    if ($player_allyCode && $player_name) {
                        $player_codes_processed[] = $player_allyCode;
                        if (isset($player['stats']) && \is_array($player['stats'])) {
                            foreach ($player['stats'] as $stat) {
                                /*
                                 * Carefull with this one
                                 * Unfortunately, stats are returned without static keys
                                 * We have to iterate through them and find the one we are looking for
                                 * Way 1a (used): Check 'nameKey' for "STAT_GALACTIC_POWER_ACQUIRED_NAME", needs lang to be null
                                 * Way 1b: Check 'nameKey' for "Galactic Power:", needs lang to be en_us
                                 * Way 2: Use 'index' and hope GP stays index 1
                                 * Way 3: Take the first array element and hope it will always be GP
                                 */
                                if (($stat['nameKey'] ?? '') == 'STAT_GALACTIC_POWER_ACQUIRED_NAME') {
                                    $player_gp = $stat['value'] ?? null;
                                }
                            }
                        }

                        Player::updateOrCreate(
                            ['code' => $player['allyCode']],
                            [
                                'name' => $player['name'],
                                'refId' => $player['id'] ?? null,
                                'guildRefId' => $player['guildRefId'] ?? null,
                                'level' => $player['level'] ?? null,
                                'gp' => $player_gp,
                                'origin' => $this->origin,
                                'lastActivity' => $player['lastActivity'] ?? null,
                                'updated' => $player['updated'] ?? null,
                                ]
                        );

                        if ($guild_id && $guild_name) {
                            // add playercode back because it belongs to a guild member
                            $pending_codes[] = $player['allyCode'];
                            Storage::disk('sync')->append($crawler_done_guild_log, time() . ' ' . $player['allyCode']);

                            $existing_guild = Guild::where('refId', $player['guildRefId'])->first();

                            if (!$existing_guild) {
                                $new_guild = Guild::create([
                                    // 'user_id' => null,
                                    'code' => null,
                                    'name' => $player['guildName'],
                                    'refId' => $player['guildRefId'],
                                    'origin' => $this->origin,
                                ]);
                            }
                        } else {
                            Storage::disk('sync')->append($crawler_done_single_log, time() . ' ' . $player['allyCode']);
                        }
                    }
                }
            }

            // Check if there are enough pending codes for a guild sync
            $guild_sync_threshold = 10;
            if (\count($pending_codes) > $guild_sync_threshold) {
                for ($i = 0; $i < $guild_sync_threshold; ++$i) {
                    $this->player_code[] = array_shift($pending_codes);
                }
                Storage::disk('sync')->append($crawler_done_guild_log, time() . ' sent to sync: ' . implode(', ', $this->player_code));
            }

            // save $pending_codes back for next run
            Storage::disk('sync')->put($crawler_pending_guild, json_encode($pending_codes));

            // log any codes that are left over as error
            $left_over = array_diff($player_codes_input, $player_codes_processed);
            if ($left_over) {
                Storage::disk('sync')->append($crawler_error_log, time() . ' ' . implode(', ', $left_over));
            }
        } else {
            return ['error' => 'File not found: ' . $source];
        }
    }

    private function prepareHelpGuild($guild_id): void
    {
        $source = "swgoh.help/guild/$guild_id/guild.json";
        $target = "swgoh.help/guild/$guild_id/guild.out.%s.json";

        if (Storage::disk('sync')->exists($source)) {
            $data = Storage::disk('sync')->get($source);
            $units = json_decode($data, true);

            if (isset($units[0])) {
                $guild_info = [];
                $roster = [];
                foreach ($units[0] as $key => $value) {
                    if ('roster' == $key) {
                        $roster = $value;
                    } else {
                        $guild_info[$key] = $value;
                    }
                }
                // save guild meta data
                Storage::disk('sync')->put(sprintf($target, 'guild'), json_encode($guild_info));

                // save player data
                // Storage::disk('sync')->put(sprintf($target, 'roster'), \json_encode($roster));

                // Guild member list without roster
                Storage::disk('sync')->put(sprintf($target, 'players'), json_encode($roster));

                $leader_code = null;
                foreach ($roster as $key => $player) {
                    // Save player data to database
                    $player_allyCode = $player['allyCode'] ?? null;
                    $player_name = $player['name'] ?? null;
                    $player_guildMemberLevel = $player['guildMemberLevel'] ?? null;

                    if ($player_allyCode && $player_name) {
                        Player::updateOrCreate(
                            ['code' => $player_allyCode],
                            [
                                'name' => $player_name,
                                'refId' => $player['id'] ?? null,
                                'guildRefId' => $guild_info['id'] ?? null,
                                'level' => $player['level'] ?? null,
                                'gp' => $player['gp'] ?? null,
                                'origin' => $this->origin,
                                ]
                        );
                        if ('GUILDLEADER' == $player_guildMemberLevel) {
                            $leader_code = $player_allyCode;
                        }
                    }
                }

                $guild_refId = $guild_info['id'] ?? null;
                $guild_name = $guild_info['name'] ?? null;
                if ($guild_refId && $guild_name) {
                    Guild::updateOrCreate(
                        ['refId' => $guild_refId],
                        [
                            // 'user_id' => null,
                            'code' => $leader_code,
                            'name' => $guild_name,
                            'gp' => $guild_info['gp'] ?? null,
                            'origin' => $this->origin,
                        ]
                    );
                }
            }
        }
    }

    private function prepareHelpGuildPlayers($guild_id, $status = null): void
    {
        $source = "swgoh.help/guild/$guild_id/players.json";
        $target = "swgoh.help/guild/$guild_id/units.out.%s.json";
        $target_players = 'swgoh.help/guild/players/units.out.player.%s.json';

        if (Storage::disk('sync')->exists($source)) {
            $data = Storage::disk('sync')->get($source);
            $roster = json_decode($data, true);

            if ($roster) {
                $guild_players = [];
                $roster_by_unit = [];

                foreach ($roster as $key => $player) {
                    // dd($player);
                    Storage::disk('sync')->put(sprintf($target_players, $player['allyCode'] ?? $player['id']), json_encode($player));

                    // Save player data to database
                    if (isset($player['allyCode']) && isset($player['name'])) {
                        Player::updateOrCreate(
                            ['code' => $player['allyCode']],
                            [
                                'name' => $player['name'],
                                'refId' => $player['id'] ?? null,
                                'guildRefId' => $player['guildRefId'] ?? null,
                                'level' => $player['level'] ?? null,
                                'gp' => $player['gp'] ?? null,
                                'origin' => 'prepHelpGP',
                                ]
                        );
                    }

                    foreach ($player['roster'] as $unit_key => $unit_value) {
                        uksort($unit_value, [$this, 'cmpUnitValue']);
                        $roster_by_unit[$unit_value['combatType'] ?? 0][$unit_value['defId']][] = array_merge(['pid' => $player['id'], 'allyCode' => $player['allyCode'], 'player' => $player['name']], $unit_value);
                    }
                    $guild_players[$key] = $player;
                    unset($guild_players[$key]['roster']);
                }
                foreach ($roster_by_unit as $c_type => $sub_roster) {
                    ksort($sub_roster); // slow!
                    Storage::disk('sync')->put(sprintf($target, "$c_type"), json_encode($sub_roster));
                }

                // Guild member list without roster
                Storage::disk('sync')->put(sprintf($target, 'players'), json_encode($guild_players));
            }
        }
    }

    private function cmpUnitValue($a, $b)
    {
        $sort = array_flip($this->sort);

        return ($sort[$a] ?? -1) <=> ($sort[$b] ?? -1);
    }

    public function syncHelpGuild($player_allycode)
    {
        $source = config('swgoh.API.SWGOH_HELP.SERVER') . '/swgoh/guilds';
        $file = 'guild';
        $ext = 'json';
        $this->threshold = $this->threshold ?: 60 * 60 * 6;

        if (!$player_allycode) {
            return ['error' => 'player_allycode missing.'];
        }
        if (!\is_array($player_allycode) && !is_numeric($player_allycode)) {
            return ['error' => 'player_allycode not a number. ' . $player_allycode ?? 'empty'];
        }
        if (!\is_array($player_allycode)) {
            $dir = "swgoh.help/guild/$player_allycode/";
            $player_allycode = [$player_allycode];
        } else {
            $this->ignoreThreshold = true;
            $dir = 'swgoh.help/guild/multicode/';
        }

        $token = $this->getAccessToken();

        if ($token) {
            $body = [
                'allycodes' => $player_allycode, //, 176994547 Team Instinct
                'language' => 'eng_us',
                'enums' => true,
                // 'roster' => true,
                // 'units' => true,
                // 'mods' => false,
                // "project" => [
                //     "name" => 1,
                //     "gp" => 1,
                //     "roster" => 1
                //     ]
                ];
            $opts = [
                'http' => [
                    'method' => 'POST',
                    'header' => [
                        'Accept: application/json',
                        'Content-Type: application/json',
                        "Authorization: Bearer $token",
                    ],
                    'content' => json_encode($body),
                ],
            ];

            $context = stream_context_create($opts);

            $this->missingGuildCodeWorkaround = true;
            $result = $this->syncData($source, $dir, $file, $ext, $context);
            $this->missingGuildCodeWorkaround = false;

            return $result;
        }
    }

    public function syncHelpPlayers($allycodes)
    {
        $allycodes = SyncHelper::validateAllyCodes($allycodes);

        if (!$allycodes) {
            // empty input
            return ['error' => 'empty input'];
        }

        $body = [
            'allycodes' => $allycodes,
            // 'language' => 'eng_us',
            'enums' => true,
            'project' => [
                'id' => 1,
                'allyCode' => 1,
                'name' => 1,
                'level' => 1,
                'guildRefId' => 1,
                'guildName' => 1,
                'guildTypeId' => 1,
                'lastActivity' => 1,
                'updated' => 1,
                'stats' => 1, // contains GP as {"nameKey":"Galactic Power:","value":123456,"index":1}
                ],
            ];

        return $this->syncHelp('players', $body, 'CRAWLER');
    }

    public function syncHelpGuildPlayers($player_allycode, $endpoint)
    {
        $source = config('swgoh.API.SWGOH_HELP.SERVER') . "/swgoh/$endpoint";
        // $dir = see below
        $file = "$endpoint";
        $ext = 'json';
        $this->threshold = $this->threshold ?: 60 * 60 * 6;

        $player_allycode = SyncHelper::validateAllyCode($player_allycode);
        if (!$player_allycode) {
            return false;
        }
        $guild_source = "swgoh.help/guild/$player_allycode/guild.json";

        $allycodes = [];
        if (Storage::disk('sync')->exists($guild_source)) {
            $data = Storage::disk('sync')->get($guild_source);
            $data = json_decode($data, true);
            $units = $data[0]['roster'] ?? [];
            foreach ($units as $key => $value) {
                $allycodes[] = $value['allyCode'] ?? '';
            }
            $allycodes = array_filter($allycodes);
            $this->guild_id = $data[0]['id'] ?? null;
        }
        if (!\count($allycodes)) {
            return false;
        }

        if (!$this->guild_id) {
            return false;
        }
        $dir = "swgoh.help/guild/$this->guild_id/";

        switch ($endpoint) {
            case 'players':
                $body = [
                    'allycodes' => $allycodes,
                    'language' => 'eng_us',
                    'enums' => true,
                ];
                break;
            case 'roster':
                $body = [
                    'allycodes' => $allycodes,
                    'enums' => true,
                ];
                break;
            case 'units':
                $body = [
                    'allycodes' => $allycodes,
                    'enums' => true,
                ];
                break;

            default:
                $body = null;
                break;
        }

        if ($body && $token = $this->getAccessToken()) {
            $opts = [
                'http' => [
                    'method' => 'POST',
                    'header' => [
                        'Accept: application/json',
                        'Content-Type: application/json',
                        "Authorization: Bearer $token",
                    ],
                    'content' => json_encode($body),
                ],
            ];

            $context = stream_context_create($opts);

            return $this->syncData($source, $dir, $file, $ext, $context);
        }
    }

    protected function prepareHelpData($collection, $lang): void
    {
        $data = null;
        $result = [];
        $column_map_id = 'id';
        $column_map_value = 'nameKey';

        /*
         * Load data for everything
         * it is used multiple times below
         */
        if ($collection && $lang) {
            $source = "swgoh.help/data/$collection/$collection.$lang.json";
            $target = "swgoh.help/data/$collection/$collection.out.$lang.json";
            $target_map = "swgoh.help/data/$collection/$collection.out.map.$lang.json";
            $target_special = "swgoh.help/data/$collection/$collection.out.special.$lang.json";

            if (Storage::disk('sync')->exists($source)) {
                $data = json_decode(Storage::disk('sync')->get($source), true);
            }
        }

        switch ($collection) {
            case 'abilityList':
            case 'playerTitleList':
            case 'equipmentList':
                // if (\is_array($data)) {
                //     foreach ($data as $key => $value) {
                //         $result[$value['id'] ?? 'error'] = $value['nameKey'] ?? 'error';
                //     }
                //     // save ability mapping
                //     Storage::disk('sync')->put($target, \json_encode($result));
                // }

                break;

            case 'skillList':
                $column_map_value = 'abilityReference';

                // saves as $target_special
                $result = [];
                if (\is_array($data)) {
                    foreach ($data as $key => $value) {
                        $result[$value['id'] ?? 'error']['map'] = $value['abilityReference'] ?? 'error';
                        $result[$value['id'] ?? 'error']['max_tier'] = \count($value['tierList'] ?? []) + 1;
                    }
                    Storage::disk('sync')->put($target_special, json_encode($result));
                }

                break;

            default:
                break;
        }

        if ($data && \is_array($data)) {
            /**
             * Create MAP files if there is a nameKey
             * Map files are one-dimensional arrays with the format ['key' => 'value'].
             *
             * Required input fields: $column_map_id, $column_map_value
             *
             * saves as $target_map
             */
            $result_map = array_column($data, $column_map_value, $column_map_id);
            if ($result_map) {
                Storage::disk('sync')->put($target_map, json_encode($result_map));
            }

            // Build Associative Array for everything
            // saves as $target
            if ($result_map) {
                // reuse id from $result_map, if it exists.
                // Saves us from doing another array_column() to get the keys.
                $result_keys = array_keys($result_map);
            } else {
                // there might not be a $result_map. E.g. if $column_map_value does not exist
                // get the keys
                $result_keys = array_column($data, $column_map_id);
            }
            if ($result_keys) {
                $result = array_combine($result_keys, $data);
                Storage::disk('sync')->put($target, json_encode($result));
            }
        }
    }

    protected function getHelpDataBody($collection, $lang)
    {
        switch ($collection) {
            case 'abilityList':
                $body = [
                    'collection' => $collection,
                    'language' => $lang,
                    'enums' => true,
                    'project' => [
                        'id' => 1,
                        'nameKey' => 1,
                        'descKey' => 1,
                        'abilityType' => 1,
                        'cooldownType' => 1,
                        'aiParams' => 1,
                        ],
                    ];
                break;

            case 'battleTargetingRuleList':
                $body = [
                    'collection' => $collection,
                    'language' => $lang,
                    'enums' => true,
                    'project' => [
                        'id' => 1,
                        'excludeSelf' => 1,
                        'excludeSelectedTarget' => 1,
                        'battleDeploymentState' => 1,
                        'activeEffectTagCriteriaList' => 1,
                        'statValueList' => 1,
                        'unitSelect' => 1,
                        'battleSide' => 1,
                        'unitClassList' => 1,
                        'healthState' => 1,
                        'category' => 1,
                        'forceAlignmentList' => 1,
                        ],
                    ];
                break;

            case 'equipmentList':
            case 'playerTitleList':
                $body = [
                    'collection' => $collection,
                    'language' => $lang,
                    'enums' => true,
                    'project' => [
                        'id' => 1,
                        'nameKey' => 1,
                        ],
                    ];
                break;

            case 'skillList':
                $body = [
                    'collection' => $collection,
                    // 'language' => $lang,
                    'enums' => true,
                    'project' => [
                        'id' => 1,
                        'abilityReference' => 1,
                        'isZeta' => 1,
                        'tierList' => 1,
                        // 'tierList' => [
                        //     'recipeId' => 1,
                        //     'requiredUnitLevel' => 1,
                        //     'requiredUnitRarity' => 1,
                        //     'requiredUnitTier' => 1,
                        //     'requiredUnitRelicTier' => 1,
                        //     ],
                        ],
                    ];
                break;

            case 'unitsList':
                $body = [
                    'collection' => $collection,
                    'language' => $lang,
                    'enums' => true,
                    'match' => ['rarity' => 7],
                    'project' => [
                        'baseId' => 1,
                        'nameKey' => 1,
                        'descKey' => 1,
                        'forceAlignment' => 1,
                        'categoryIdList' => 1,
                        'combatType' => 1,
                        // 'creationRecipeReference' => 1,
                        'skillReferenceList' => 1,
                        // 'limitBreakList' => 1,
                        // 'uniqueAbilityList' => 1,
                        // 'crewAbilityList' => 1,
                        // 'crewUniqueAbilityList' => 1,
                        // 'basicAttackRef' => 1,
                        // 'leaderAbilityRef' => 1,
                        // 'limitBreakRefList' => 1,
                        // 'uniqueAbilityRefList' => 1,
                        // 'crewAbilityRefList' => 1,
                        // 'crewUniqueAbilityRefList' => 1,
                        ],
                    ];
                break;

            case 'materialList':
            case 'xpTableList':
            case 'recipeList':
                $body = [
                    'collection' => $collection,
                    'language' => $lang,
                    'enums' => true,
                    ];
                break;

            case 'statModList':
                $body = [
                    'collection' => $collection,
                    'language' => $lang,
                    'enums' => true,
                    'project' => [
                        'id' => 1,
                        'slot' => 1,
                        'setId' => 1,
                        'rarity' => 1,
                        'nameKey' => 1,
                        'descKey' => 1,
                        ],
                    ];
                break;

            case 'statModSetList':
                $body = [
                    'collection' => $collection,
                    'language' => $lang,
                    'enums' => true,
                    'project' => [
                        'id' => 1,
                        'nameKey' => 1,
                        'descKey' => 1,
                        'icon' => 1,
                        'completeBonus' => 1,
                        'maxLevelBonus' => 1,
                        'setCount' => 1,
                        ],
                    ];
                break;

            default:
                // $body = null;
                $body = [
                    'collection' => $collection,
                    'language' => $lang,
                    'enums' => true,
                    ];
                break;
        }

        return $body;
    }

    public function syncHelpDataStructure($collection)
    {
        $source = config('swgoh.API.SWGOH_HELP.SERVER') . "/structures/$collection.json";
        $dir = "swgoh.help/data/$collection/";
        $file = "$collection.STRUCTURE";
        $ext = 'json';
        $this->threshold = $this->threshold ?: 60 * 60 * 6;

        return $this->syncData($source, $dir, $file, $ext);
    }

    public function syncHelp($path, $body, $lang = null)
    {
        $source = config('swgoh.API.SWGOH_HELP.SERVER') . "/swgoh/$path";
        $dir = "swgoh.help/$path/";
        $file = $path;
        $ext = 'json';
        $this->threshold = $this->threshold ?: 60 * 60 * 6;

        if (null === $body) {
            return false;
        }

        if ($lang) {
            $file .= ".$lang";
        }

        $token = $this->getAccessToken();
        if ($token) {
            $opts = [
                'http' => [
                    'method' => 'POST',
                    'header' => [
                        'Accept: application/json',
                        'Content-Type: application/json',
                        "Authorization: Bearer $token",
                    ],
                    'content' => json_encode($body),
                ],
            ];

            $context = stream_context_create($opts);

            return $this->syncData($source, $dir, $file, $ext, $context);
        }
    }

    public function syncHelpData($collection, $body, $id, $lang)
    {
        $source = config('swgoh.API.SWGOH_HELP.SERVER') . '/swgoh/data';
        $dir = "swgoh.help/data/$collection/";
        $file = "$collection.$lang";
        $ext = 'json';
        $this->threshold = $this->threshold ?: 60 * 60 * 6;

        $token = $this->getAccessToken();

        if (!$body && !$id) {
            $file = "$collection.PEEK";
            $body = [
                'collection' => $collection,
                'language' => $lang,
                // 'structure' => true,
                // "match" => [
                // ],
                'project' => [
                    'id' => 1,
                ],
                ];
        }
        if (!$body && $id) {
            $file = "$collection.$id";
            $body = [
                'collection' => $collection,
                'language' => $lang,
                'match' => [
                    'id' => "$id",
                ],
                ];
        }
        if ($token) {
            $opts = [
                'http' => [
                    'method' => 'POST',
                    'header' => [
                        'Accept: application/json',
                        'Content-Type: application/json',
                        "Authorization: Bearer $token",
                    ],
                    'content' => json_encode($body),
                ],
            ];

            $context = stream_context_create($opts);

            return $this->syncData($source, $dir, $file, $ext, $context);
        }
    }

    private function getAccessToken()
    {
        $dir = $this->authdir . 'swgoh.help/';
        $filename = $dir . 'access.json';

        $response = Storage::get($filename);
        if ($response) {
            $response = json_decode($response, true);
            if (\array_key_exists('access_token', $response) && \array_key_exists('expires_in', $response)) {
                if ((time() - Storage::lastModified($filename)) < ($response['expires_in'] - 60)) {
                    // return saved session
                    return $response['access_token'];
                }
            }
        }

        // if we are still here, get new Access Token
        $https_user = config('swgoh.API.SWGOH_HELP.USER');
        $https_password = config('swgoh.API.SWGOH_HELP.PASSWORD');
        $https_server = config('swgoh.API.SWGOH_HELP.AUTH_SERVER');
        $client_id = config('swgoh.API.SWGOH_HELP.CLIENT_ID');
        $client_secret = config('swgoh.API.SWGOH_HELP.CLIENT_SECRET');
        $body = "username=$https_user&password=$https_password&grant_type=password&client_id=abc&client_secret=123";
        $opts = [
            'http' => [
                'method' => 'POST',
                'header' => "Accept-language: en\n" .
                        "Content-Type: application/x-www-form-urlencoded\n" .
                        'Payload: ' . base64_encode("username=$https_user&password=$https_password&grant_type=password&client_id=$client_id&client_secret=$client_secret") . "\n",
                // 'content' => $body,
                'timeout' => 30,
            ],
        ];
        $opts = [
            'http' => [
                'method' => 'POST',
                'header' => [
                    'Content-Type: application/x-www-form-urlencoded',
                ],
                'content' => $body,
            ],
        ];
        //   die(var_dump($opts));
        $context = stream_context_create($opts);
        $url = $https_server;
        $result = file_get_contents($url, false, $context, 0, 40000);
        if (false !== $result) {
            $result = json_decode($result, true);
            if (\array_key_exists('access_token', $result)) {
                Storage::put($filename, json_encode($result));

                return $result['access_token'];
            }
        }

        return false;
    }

    public function syncGgGuildUnits($swgoh_guild_id)
    {
        if (!$swgoh_guild_id) {
            return;
        }
        $source = config('swgoh.API.SWGOH_GG.SERVER') . "/guild/$swgoh_guild_id/";
        $dir = "swgoh.gg/guild/$swgoh_guild_id/";
        $file = 'units';
        $ext = 'json';
        $this->threshold = $this->threshold ?: 60 * 60 * 6;

        return $this->syncData($source, $dir, $file, $ext);
    }

    public function syncGgToons()
    {
        $source = config('swgoh.API.SWGOH_GG.SERVER') . '/characters/';
        $dir = 'swgoh.gg/characters/';
        $file = 'characters';
        $ext = 'json';
        $this->threshold = $this->threshold ?: 60 * 60 * 6 * 3;

        return $this->syncData($source, $dir, $file, $ext);
    }

    public function syncGgAbilities()
    {
        $source = config('swgoh.API.SWGOH_GG.SERVER') . '/abilities/';
        $dir = 'swgoh.gg/abilities/';
        $file = 'abilities';
        $ext = 'json';
        $this->threshold = $this->threshold ?: 60 * 60 * 6 * 3;

        return $this->syncData($source, $dir, $file, $ext);
    }

    public function syncGgAbility($id)
    {
        $source = config('swgoh.API.SWGOH_GG.SERVER') . "/abilities/$id/";
        $dir = 'swgoh.gg/abilities/ability/';
        $file = "$id";
        $ext = 'json';
        $this->threshold = $this->threshold ?: 60 * 60 * 6 * 3;

        return $this->syncData($source, $dir, $file, $ext);
    }

    public function syncGgShips()
    {
        $source = config('swgoh.API.SWGOH_GG.SERVER') . '/ships/';
        $dir = 'swgoh.gg/ships/';
        $file = 'ships';
        $ext = 'json';
        $this->threshold = $this->threshold ?: 60 * 60 * 6 * 3;

        return $this->syncData($source, $dir, $file, $ext);
    }

    public function syncGgGear()
    {
        $source = config('swgoh.API.SWGOH_GG.SERVER') . '/gear/?format=json';
        $dir = 'swgoh.gg/gear/';
        $file = 'gear';
        $ext = 'json';
        $this->threshold = $this->threshold ?: 60 * 60 * 6 * 3;

        return $this->syncData($source, $dir, $file, $ext);
    }

    public function syncHelpSquads()
    {
        $source = 'https://swgoh.help/data/squads.json';
        $dir = 'swgoh.help/squads/';
        $file = 'squads';
        $ext = 'json';
        $this->threshold = $this->threshold ?: 60 * 60 * 6 * 7;

        return $this->syncData($source, $dir, $file, $ext);
    }

    private function syncData($source, $dir, $file, $ext, $context = null)
    {
        $time = time();
        $filename = "$dir$file.$ext";
        $filename_ts = "$dir$file.$time.$ext";
        $filename_hash = "$dir$file.md5";
        $filename_retry = "$dir$file.retry";
        $filename_sync = "$dir$file.sync";

        $last_sync = 0;
        $last_hash = '';
        $last_hash_ts = 0;

        if (Storage::disk('sync')->exists($filename_sync)) {
            $last_sync = Storage::disk('sync')->lastModified($filename_sync);
        }
        if (Storage::disk('sync')->exists($filename)) {
            // needed for legacy reasons (there were no separate sync-files before)
            // and it's a good double check
            $last_sync = max($last_sync, Storage::disk('sync')->lastModified($filename));
        }

        if (!$last_sync || ($this->ignoreThreshold || !$this->threshold || $time - $last_sync > $this->threshold)) {
            if (Storage::disk('sync')->exists($filename_retry) && ($time - Storage::disk('sync')->lastModified($filename_retry) < $this->threshold_retry)) {
                // need some cooldown
                // prevents sync spawn in case there are errors
                // example: source not available / timeout
                return ['time' => $time, 'time_data' => $last_sync, 'status' => 'WAIT/RETRY'];
            }
            Storage::disk('sync')->put($filename_retry, ''); // continue but log time of request

            // try {
            $data_stream = false;
            // $data = file_get_contents($source, false, $context); // use stream instead, performance reasons

            try {
                // BUG WARNING: https://bugs.php.net/bug.php?id=74719
                // $context param throws error for NULL, even as it's optional
                // $data_stream = fopen($source, 'r', false, $context); //bugged
                if ($context) {
                    $data_stream = fopen($source, 'r', false, $context);
                } else {
                    $data_stream = fopen($source, 'r', false);
                }
            } catch (\Throwable $th) {
                //throw $th;
                $error = $th->getCode() . ':' . $th->getMessage();
            } catch (\Exception $e) {
                $error = $e->getCode() . ':' . $e->getMessage();
            }

            // $stream = $fs->readStream($source);
            // $fs->writeStream($path, $stream);
            if (false !== $data_stream) {
                // always save original response for debugging api errors
                Storage::disk('sync')->putStream($filename . '.orig', $data_stream);
                if (\is_resource($data_stream)) {
                    fclose($data_stream);
                }

                if (Storage::disk('sync')->exists($filename_hash)) {
                    $last_hash = Storage::disk('sync')->get($filename_hash);
                    $last_hash_ts = Storage::disk('sync')->lastModified($filename_hash);
                }

                $hash = md5_file(config('filesystems.disks.sync.root') . '/' . $filename . '.orig');
                if ($hash == $last_hash) {
                    Storage::disk('sync')->put($filename_sync, $time);

                    return ['time' => $time, 'time_data' => $last_hash_ts, 'status' => 'EQUAL', 'url' => Storage::disk('sync')->url($filename), 'size' => Storage::disk('sync')->size($filename)];
                }

                $data = json_decode(Storage::disk('sync')->get($filename . '.orig'), true);
                // $data = json_decode($data, true);

                if (!$data) {
                    // malformed json or empty response
                    // indicates error on api side
                    // don't save it
                    return ['time' => $time, 'status' => 'ERROR', 'error' => null === $data ? 'malformed json response' : 'empty api response'];
                }

                // $data = json_encode($data, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);

                if ($this->missingGuildCodeWorkaround) {
                    // Write guild data to guild folder instead of player folder
                    // need to get guild id from requested data first

                    $this->guild_id = [];
                    foreach ($data as $single_guild) {
                        $single_guild_id = $single_guild['id'] ?? null;
                        if ($single_guild_id) {
                            $this->guild_id[] = $single_guild_id;
                            $workaround_target = "swgoh.help/guild/$single_guild_id/$file.$ext";
                            $filename_ts = "swgoh.help/guild/$single_guild_id/$file.$time.$ext";
                            if (Storage::disk('sync')->exists($workaround_target)) {
                                Storage::disk('sync')->delete($workaround_target);
                            }
                            // Storage::disk('sync')->copy($filename.'.orig', $workaround_target);
                            // Storage::disk('sync')->putStream($workaround_target, $data);
                            Storage::disk('sync')->put($workaround_target, json_encode([$single_guild]));
                        }
                    }
                }

                if (Storage::disk('sync')->exists($filename)) {
                    Storage::disk('sync')->delete($filename);
                }
                Storage::disk('sync')->copy($filename . '.orig', $filename);
                Storage::disk('sync')->put($filename_hash, $hash);
                if (Storage::disk('sync')->exists($filename_ts)) {
                    Storage::disk('sync')->delete($filename_ts);
                }
                Storage::disk('sync')->copy($filename . '.orig', $filename_ts);

                return ['time' => $time, 'time_data' => $time, 'status' => 'NEW', 'url' => Storage::disk('sync')->url($filename), 'size' => Storage::disk('sync')->size($filename)];

            // if (Storage::disk('sync')->put($filename, $data)) {
                    //     Storage::disk('sync')->put($filename_hash, $hash);
                    //     // Storage::disk('sync')->copy($filename, $filename_ts); // use .orig file instead of pretty-printed because it saves a lot of space
                    //     Storage::disk('sync')->copy($filename.'.orig', $filename_ts);

                    //     return ['time' => $time, 'time_data' => $time, 'status' => 'NEW', 'url' => Storage::disk('sync')->url($filename), 'size' => Storage::disk('sync')->size($filename)];
                    // }
            } else {
                if (($data_stream ?? null) && \is_resource($data_stream)) {
                    fclose($data_stream);
                }
                // delete folders that only contain the retry file
                if (Storage::disk('sync')->exists($dir) && Storage::disk('sync')->files($dir) == [$filename_retry]) {
                    Storage::disk('sync')->deleteDirectory($dir);
                }

                return [
                        'status' => 'PROBLEM',
                        'source' => $source ?? '',
                        'data' => var_export($data ?? [], true),
                        'error' => ($error ?? '') . ' ' . isset($http_response_header) ? implode('<br />', $http_response_header) : '',
                    ];
            }
            // } catch (\Exception $e) {
            // return [
            //         'status' => 'ERROR',
            //         'source' => $source ?? '',
            //         'error' => $e->getCode().':'.$e->getMessage().':'.isset($http_response_header) ? implode('|', $http_response_header) : '',
            //     ];
        // }
        } else {
            // data is current
            return [
                'time' => $time,
                'time_data' => Storage::disk('sync')->lastModified($filename),
                'status' => 'CURRENT',
                'url' => Storage::disk('sync')->url($filename),
                'size' => Storage::disk('sync')->size($filename),
            ];
        }

        return false;
    }

    /**
     * Set the value of guild_id.
     *
     * @return self
     */
    public function setGuildId($guild_id)
    {
        $this->guild_id = $guild_id;

        return $this;
    }

    /**
     * Set the value of guild_code.
     *
     * @return self
     */
    public function setGuildCode($guild_code)
    {
        $this->guild_code = $guild_code;

        return $this;
    }

    /**
     * Set the value of player_code.
     *
     * @return self
     */
    public function setPlayerCode($player_code)
    {
        $this->player_code = $player_code;

        return $this;
    }

    /**
     * Set the value of language.
     *
     * @return self
     */
    public function setLanguage($language)
    {
        $this->language = $language;

        return $this;
    }
}
