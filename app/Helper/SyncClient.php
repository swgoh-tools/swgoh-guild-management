<?php

declare(strict_types=1);

namespace App\Helper;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

class SyncClient
{
    protected $lockfile = 'sync.lock';
    // protected $datadir = '/app/public/data/';
    protected $authdir = 'auth/';
    public $ignoreThreshold = false;
    protected $guild_id = 0;
    protected $guild_code = 0;
    protected $player_code = 0;
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
        // 'help.data.statModList' => '',
        // 'help.data.statModSetList' => '',
        // 'help.data.statProgressionList' => '',
        // 'help.data.tableList' => '',
        // 'help.data.targetingSetList' => '',
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

    // public static function getStatus()
    // {
    //     return [];
    // }

    public static function getTargets()
    {
        return [
            'toons' => 'toons',
            'squads' => 'Known Squad List',
            'ships' => 'ships',
            'abilities' => 'abilities',
            'guild' => 'guild',
            'h-units' => 'swgoh.help Units',
            'h-abilities' => 'swgoh.help AbilityList',
            's' => 'Access Token',
            'help.battles' => '',
            'help.events' => '',
            'help.squads' => '',
            'help.zetas' => '',
            'help.data.abilityList' => '',
            'help.data.battleEnvironmentsList' => '',
            'help.data.battleTargetingRuleList' => '',
            'help.data.categoryList' => '',
            'help.data.challengeList' => '',
            'help.data.challengeStyleList' => '',
            'help.data.effectList' => '',
            'help.data.environmentCollectionList' => '',
            'help.data.equipmentList' => '',
            'help.data.eventSamplingList' => '',
            'help.data.guildExchangeItemList' => '',
            'help.data.guildRaidList' => '',
            'help.data.helpEntryList' => '',
            'help.data.materialList' => '',
            'help.data.playerTitleList' => '',
            'help.data.powerUpBundleList' => '',
            'help.data.raidConfigList' => '',
            'help.data.recipeList' => '',
            'help.data.requirementList' => '',
            'help.data.skillList' => '',
            'help.data.starterGuildList' => '',
            'help.data.statModList' => '',
            'help.data.statModSetList' => '',
            'help.data.statProgressionList' => '',
            'help.data.tableList' => '',
            'help.data.targetingSetList' => '',
            'help.data.territoryBattleDefinitionList' => '',
            'help.data.territoryWarDefinitionList' => '',
            'help.data.unitsList' => '',
            'help.data.unlockAnnouncementDefinitionList' => '',
            'help.data.warDefinitionList' => '',
            'help.data.xpTableList' => '',
        ];
    }

    public static function getRoster($player_code, $combat_type = 1)
    {
        if (!$player_code) {
            return null;
        }
        $filename = "swgoh.help/guild/$player_code/units.out.$combat_type.json";
        if (Storage::disk('sync')->exists($filename)) {
            return [
                json_decode(Storage::disk('sync')->get($filename), true),
                Storage::disk('sync')->lastModified($filename),
            ];
        }
    }

    public static function getSquadList()
    {
        $filename = 'swgoh.help/squads/squads.json';
        if (Storage::disk('sync')->exists($filename)) {
            return json_decode(Storage::disk('sync')->get($filename), true);
        }
    }

    public static function getZetaList()
    {
        $filename = 'swgoh.help/zetas/zetas.json';
        if (Storage::disk('sync')->exists($filename)) {
            return json_decode(Storage::disk('sync')->get($filename), true)['zetas'];
        }
    }

    public static function getSkillMap()
    {
        $filename = 'swgoh.help/data/skillList/skillList.out.map.json';
        if (Storage::disk('sync')->exists($filename)) {
            return json_decode(Storage::disk('sync')->get($filename), true);
        }
    }

    public static function getAbilityMap()
    {
        switch (app()->getLocale()) {
            case 'de':
                $lang = 'GER_DE';
                break;

            default:
                $lang = 'ENG_US';
                break;
        }
        $filename = "swgoh.help/data/abilityList/abilityList.out.map.$lang.json";
        if (Storage::disk('sync')->exists($filename)) {
            return json_decode(Storage::disk('sync')->get($filename), true);
        }
        $filename = 'swgoh.help/data/abilityList/abilityList.out.map.ENG_US.json';
        if (Storage::disk('sync')->exists($filename)) {
            return json_decode(Storage::disk('sync')->get($filename), true);
        }
    }

    public static function getSkillKeys()
    {
        $filename = 'swgoh.help/data/skillList/skillList.out.map.json';
        $skills = null;
        if (Storage::disk('sync')->exists($filename)) {
            $skills = json_decode(Storage::disk('sync')->get($filename), true);
        }
        if (!$skills) {
            return null;
        }

        switch (app()->getLocale()) {
            case 'de':
                $lang = 'GER_DE';
                break;

            default:
                $lang = 'ENG_US';
                break;
        }
        $filename = "swgoh.help/data/abilityList/abilityList.out.map.$lang.json";
        $abilities = null;
        if (Storage::disk('sync')->exists($filename)) {
            $abilities = json_decode(Storage::disk('sync')->get($filename), true);
        } else {
            $filename = 'swgoh.help/data/abilityList/abilityList.out.map.ENG_US.json';
            if (Storage::disk('sync')->exists($filename)) {
                $abilities = json_decode(Storage::disk('sync')->get($filename), true);
            }
        }
        if ($abilities) {
            foreach ($skills as $skill => $ability) {
                $skills[$skill] = $abilities[$ability] ?? $ability;
            }
        }

        return $skills;
    }

    public static function getUnitKeys()
    {
        switch (app()->getLocale()) {
            case 'de':
                $lang = 'GER_DE';
                break;

            default:
                $lang = 'ENG_US';
                break;
        }
        $filename = "swgoh.help/data/unitsList/unitsList.$lang.json";
        $units = null;
        if (Storage::disk('sync')->exists($filename)) {
            $units = json_decode(Storage::disk('sync')->get($filename), true);
        } else {
            $filename = 'swgoh.help/data/unitsList/unitsList.ENG_US.json';
            if (Storage::disk('sync')->exists($filename)) {
                $units = json_decode(Storage::disk('sync')->get($filename), true);
            }
        }
        $result = [];
        if ($units) {
            foreach ($units as $key => $value) {
                $result[$value['baseId'] ?? 'error']['name'] = $value['nameKey'] ?? '';
                $result[$value['baseId'] ?? 'error']['desc'] = $value['descKey'] ?? '';
                $result[$value['baseId'] ?? 'error']['side'] = $value['forceAlignment'] ?? '';
            }
        }

        return $result;
    }

    public static function getEventList()
    {
        switch (app()->getLocale()) {
            case 'de':
                $lang = 'GER_DE';
                break;

            default:
                $lang = 'ENG_US';
                break;
        }
        $filename = "swgoh.help/events/events.$lang.json";
        if (Storage::disk('sync')->exists($filename)) {
            return json_decode(Storage::disk('sync')->get($filename), true)['events'] ?? null;
        }
        $filename = 'swgoh.help/events/events.ENG_US.json';
        if (Storage::disk('sync')->exists($filename)) {
            return json_decode(Storage::disk('sync')->get($filename), true)['events'] ?? null;
        }
        $filename = 'swgoh.help/events/events.json';
        if (Storage::disk('sync')->exists($filename)) {
            return json_decode(Storage::disk('sync')->get($filename), true)['events'] ?? null;
        }

        return null;
    }

    public function isRunning()
    {
        if (Storage::disk('sync')->exists($this->lockfile)) {
            return Storage::disk('sync')->lastModified($this->lockfile);
        }
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

        if (auth()->check() && auth()->user()->hasRole('admin')){
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

        switch (app()->getLocale()) {
            case 'de':
                $lang = 'GER_DE';
                break;

            default:
                $lang = 'ENG_US';
                break;
        }
        // // param NOT case sensitive, so it's just for fun
        // $lang = strtolower($lang);

        try {
            // throw new MyException();
            Storage::disk('sync')->put($this->lockfile, '');

            $help_prefix = 'help.data.';
            if (false !== strpos($target, $help_prefix)) {
                $collection = explode('.', $target, 3)[2];

                $sync_status[$help_prefix.$collection] = $this->syncHelpData($collection, $this->getHelpDataBody($collection, $lang), $this->sample[$help_prefix.$collection] ?? null, $lang);
                $sync_status[$help_prefix.$collection.'structure'] = $this->syncHelpDataStructure($collection);
                $this->prepareHelpData($collection, $lang);
            } else {
                switch ($target) {
                    case 'toons':
                        $sync_status['toons'] = $this->syncGgToons();
                        break;

                    case 'squads':
                        $sync_status['squads'] = $this->syncHelpSquads();
                        break;

                    case 'ships':
                        $sync_status['ships'] = $this->syncGgShips();
                        break;

                    case 'abilities':
                        $sync_status['abilities'] = $this->syncGgAbilities();
                        break;

                    case 'guild':
                        $sync_status['guild'] = $this->syncGgGuildUnits($this->guild_code);
                        break;

                    case 'h-units':
                        $sync_status['h-units'] = $this->syncHelpGuild($this->player_code);
                        $this->prepareHelpGuild($this->player_code, $sync_status['h-units']['status'] ?? null);
                        break;

                    case 'h-abilities':
                        $sync_status['h-abilities'] = $this->syncHelpAbilities();
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
                        $sync_status['s'] = substr($this->getAccessToken(), 0, 7);
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

    private function prepareHelpGuild($player_allycode, $status = null): void
    {
        $source = "swgoh.help/guild/$player_allycode/units.json";
        $target = "swgoh.help/guild/$player_allycode/units.out.%s.json";

        // if ('NEW' != $status && Storage::disk('sync')->exists($target)) {
        //     // source didn't change and a target exists
        //     return;
        // }

        if (Storage::disk('sync')->exists($source)) {
            $data = Storage::disk('sync')->get($source);
            $units = json_decode($data, true);
            // Storage::disk('sync')->put('roster_'.time(), serialize($units));
            // dd($units);
            // @TODO

            if (isset($units[0])) {
                $guild_info = [];
                $roster = [];
                $roster_by_unit = [];
                foreach ($units[0] as $key => $value) {
                    if ('roster' == $key) {
                        $roster = $value;
                    } else {
                        $guild_info[$key] = $value;
                    }
                }
                // save guild meta data
                Storage::disk('sync')->put(sprintf($target, 'guild'), \json_encode($guild_info));

                // save player data
                Storage::disk('sync')->put(sprintf($target, 'roster'), \json_encode($roster));

                foreach ($roster as $key => $player) {
                    Storage::disk('sync')->put(sprintf($target, 'player.'.$player['allyCode'] ?? $player['id']), \json_encode($player));
                    foreach ($player['roster'] as $unit_key => $unit_value) {
                        // dd($unit_value);
                        uksort($unit_value, [$this, 'cmpUnitValue']);
                        $roster_by_unit[$unit_value['combatType'] ?? 0][$unit_value['defId']][] = array_merge(['pid' => $player['id'], 'allyCode' => $player['allyCode'], 'player' => $player['name']], $unit_value);
                    }
                }
                foreach ($roster_by_unit as $c_type => $sub_roster) {
                    ksort($sub_roster); // slow!
                    Storage::disk('sync')->put(sprintf($target, "$c_type"), \json_encode($sub_roster));
                }

                // // collect unit data (transform)
                // $roster = null;
                // if (isset($units['roster']) && \is_array($units['roster'])) {
                //     $roster = $units['roster'];
                // } elseif (isset($units[0]) && isset($units[0]['roster']) && \is_array($units[0]['roster'])) {
                //     $roster = $units[0]['roster'];
                // }
                // if ($roster) {
                //     ksort($roster); // slow!
                //     $roster = json_encode($roster, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
                //     Storage::disk('sync')->put($target, $roster);
                // }
            }
        }
    }

    private function cmpUnitValue($a, $b)
    {
        $sort = array_flip($this->sort);

        return $sort[$a] ?? -1 <=> $sort[$b] ?? -1;
    }

    public function syncHelpGuild($player_allycode)
    {
        $source = 'https://api.swgoh.help/swgoh/guild';
        $dir = "swgoh.help/guild/$player_allycode/";
        $file = 'units';
        $ext = 'json';
        $threshold = 60 * 60 * 24;

        if (!$player_allycode || !\is_int($player_allycode)) {
            return false;
        }

        $token = $this->getAccessToken();

        if ($token) {
            $body = [
                'allycode' => $player_allycode,
                'language' => 'eng_us',
                'roster' => true,
                'units' => true,
                'mods' => false,
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

            return $this->syncData($source, $dir, $file, $ext, $threshold, $context);
        }
    }

    protected function prepareHelpData($collection, $lang): void
    {
        switch ($collection) {
            case 'abilityList':
                $source = "swgoh.help/data/abilityList/abilityList.$lang.json";
                $target = "swgoh.help/data/abilityList/abilityList.out.map.$lang.json";

                if (Storage::disk('sync')->exists($source)) {
                    $data = json_decode(Storage::disk('sync')->get($source), true);

                    $result = [];
                    if (\is_array($data)) {
                        foreach ($data as $key => $value) {
                            $result[$value['id'] ?? 'error'] = $value['nameKey'] ?? 'error';
                        }
                        // save ability mapping
                        Storage::disk('sync')->put($target, \json_encode($result));
                    }
                }

                break;

            case 'skillList':
                $source = "swgoh.help/data/skillList/skillList.$lang.json";
                $target = 'swgoh.help/data/skillList/skillList.out.map.json';

                if (Storage::disk('sync')->exists($source)) {
                    $data = json_decode(Storage::disk('sync')->get($source), true);

                    $result = [];
                    if (\is_array($data)) {
                        foreach ($data as $key => $value) {
                            $result[$value['id'] ?? 'error'] = $value['abilityReference'] ?? 'error';
                        }
                        // save ability mapping
                        Storage::disk('sync')->put($target, \json_encode($result));
                    }
                }

                break;

            default:
                break;
        }
    }

    protected function getHelpDataBody($collection, $lang)
    {
        switch ($collection) {
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
                        ],
                    ];
                break;

            case 'skillList':
                $body = [
                    'collection' => $collection,
                    'language' => $lang,
                    'enums' => true,
                    'project' => [
                        'id' => 1,
                        'abilityReference' => 1,
                        'isZeta' => 1,
                        ],
                    ];
                break;

            case 'abilityList':
                $body = [
                    'collection' => $collection,
                    'language' => $lang,
                    'enums' => true,
                    'project' => [
                        'id' => 1,
                        'nameKey' => 1,
                        'abilityType' => 1,
                        'cooldownType' => 1,
                        'aiParams' => 1,
                        ],
                    ];
                break;

            case 'equipmentList':
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

            default:
                $body = null;
                break;
        }

        return $body;
    }

    public function syncHelpDataStructure($collection)
    {
        $source = "https://api.swgoh.help/structures/$collection.json";
        $dir = "swgoh.help/data/$collection/";
        $file = "$collection.STRUCTURE";
        $ext = 'json';
        $threshold = 60 * 60 * 24;

        return $this->syncData($source, $dir, $file, $ext, $threshold);
    }

    public function syncHelp($path, $body, $lang = null)
    {
        $source = "https://api.swgoh.help/swgoh/$path";
        $dir = "swgoh.help/$path/";
        $file = $path;
        $ext = 'json';
        $threshold = 60 * 60 * 24;

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

            return $this->syncData($source, $dir, $file, $ext, $threshold, $context);
        }
    }

    public function syncHelpData($collection, $body, $id, $lang)
    {
        $source = 'https://api.swgoh.help/swgoh/data';
        $dir = "swgoh.help/data/$collection/";
        $file = "$collection.$lang";
        $ext = 'json';
        $threshold = 60 * 60 * 24;

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

            return $this->syncData($source, $dir, $file, $ext, $threshold, $context);
        }
    }

    private function getAccessToken()
    {
        $dir = $this->authdir.'swgoh.help/';
        $filename = $dir.'access.json';

        $response = Storage::get($filename);
        if ($response) {
            $response = json_decode($response, true);
            if (array_key_exists('access_token', $response) && array_key_exists('expires_in', $response)) {
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
                'header' => "Accept-language: en\n".
                        "Content-Type: application/x-www-form-urlencoded\n".
                        'Payload: '.base64_encode("username=$https_user&password=$https_password&grant_type=password&client_id=$client_id&client_secret=$client_secret")."\n",
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
        $result = json_decode($result, true);
        if (array_key_exists('access_token', $result)) {
            Storage::put($filename, json_encode($result));

            return $result['access_token'];
        }

        return false;
    }

    public function syncGgGuildUnits($swgoh_guild_id)
    {
        if (!$swgoh_guild_id) {
            return;
        }
        $source = "https://swgoh.gg/api/guild/$swgoh_guild_id/";
        $dir = "swgoh.gg/guild/$swgoh_guild_id/";
        $file = 'units';
        $ext = 'json';
        $threshold = 60 * 60 * 24;

        return $this->syncData($source, $dir, $file, $ext, $threshold);
    }

    // public function syncGgGuildUnitsLegacy($swgoh_guild_id)
    // {
    //     $source = "https://swgoh.gg/api/guilds/$swgoh_guild_id/units/";
    //     $dir = "swgoh.gg/guilds/$swgoh_guild_id/units/";
    //     $file = 'units';
    //     $ext = 'json';
    //     $threshold = 60 * 60 * 24;
    //     return $this->syncData($source, $dir, $file, $ext, $threshold);
    // }

    public function syncGgToons()
    {
        $source = 'https://swgoh.gg/api/characters/';
        $dir = 'swgoh.gg/characters/';
        $file = 'characters';
        $ext = 'json';
        $threshold = 60 * 60 * 24 * 3;

        return $this->syncData($source, $dir, $file, $ext, $threshold);
    }

    public function syncGgAbilities()
    {
        $source = 'https://swgoh.gg/api/abilities/';
        $dir = 'swgoh.gg/abilities/';
        $file = 'abilities';
        $ext = 'json';
        $threshold = 60 * 60 * 24 * 3;

        return $this->syncData($source, $dir, $file, $ext, $threshold);
    }

    public function syncGgAbility($id)
    {
        $source = "https://swgoh.gg/api/abilities/$id/";
        $dir = 'swgoh.gg/abilities/ability/';
        $file = "$id";
        $ext = 'json';
        $threshold = 60 * 60 * 24 * 3;

        return $this->syncData($source, $dir, $file, $ext, $threshold);
    }

    public function syncGgShips()
    {
        $source = 'https://swgoh.gg/api/ships/';
        $dir = 'swgoh.gg/ships/';
        $file = 'ships';
        $ext = 'json';
        $threshold = 60 * 60 * 24 * 3;

        return $this->syncData($source, $dir, $file, $ext, $threshold);
    }

    public function syncHelpSquads()
    {
        $source = 'https://swgoh.help/data/squads.json';
        $dir = 'swgoh.help/squads/';
        $file = 'squads';
        $ext = 'json';
        $threshold = 60 * 60 * 24 * 7;

        return $this->syncData($source, $dir, $file, $ext, $threshold);
    }

    private function syncData($source, $dir, $file, $ext, $threshold, $context = null)
    {
        $time = time();
        $filename = "$dir$file.$ext";
        $filename_ts = "$dir$file.$time.$ext";
        $filename_hash = "$dir$file.md5";
        $filename_retry = "$dir$file.retry";
        $filename_sync = "$dir$file.sync";

        $threshold_retry = 60 * 1; // 10 min cooldown

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

        if (!$last_sync || ($this->ignoreThreshold || $time - $last_sync > $threshold)) {
            if (Storage::disk('sync')->exists($filename_retry) && ($time - Storage::disk('sync')->lastModified($filename_retry) < $threshold_retry)) {
                // need some cooldown
                // prevents sync spawn in case there are errors
                // example: source not available / timeout
                return ['time' => $last_sync, 'status' => 'WAIT/RETRY'];
            }
            Storage::disk('sync')->put($filename_retry, ''); // continue but log time of request

            try {
                $data = file_get_contents($source, false, $context);
                if ($data) {
                    // Storage::disk('sync')->put('test_'.time(), $data);
                    if (Storage::disk('sync')->exists($filename_hash)) {
                        $last_hash = Storage::disk('sync')->get($filename_hash);
                        $last_hash_ts = Storage::disk('sync')->lastModified($filename_hash);
                    }

                    $hash = md5($data);
                    if ($hash == $last_hash) {
                        Storage::disk('sync')->put($filename_sync, $time);

                        return ['time' => $last_hash_ts, 'status' => 'EQUAL', 'url' => Storage::disk('sync')->url($filename), 'size' => Storage::disk('sync')->size($filename)];
                    }

                    $data = json_decode($data);
                    $data = json_encode($data, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
                    if (Storage::disk('sync')->put($filename, $data)) {
                        Storage::disk('sync')->put($filename_hash, $hash);
                        Storage::disk('sync')->copy($filename, $filename_ts);

                        return ['time' => $time, 'status' => 'NEW', 'url' => Storage::disk('sync')->url($filename), 'size' => Storage::disk('sync')->size($filename)];
                    }
                } else {
                    return [
                        'status' => 'PROBLEM',
                        'error' => isset($http_response_header) ? implode('<br />', $http_response_header) : '',
                    ];
                }
            } catch (Exception $e) {
                return [
                    'status' => 'ERROR',
                    'error' => $e->getCode().':'.$e->getMessage().':'.isset($http_response_header) ? implode('|', $http_response_header) : '',
                ];
            }
        } else {
            // data is current
            return ['time' => $last_sync, 'status' => 'CURRENT', 'url' => Storage::disk('sync')->url($filename), 'size' => Storage::disk('sync')->size($filename)];
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
}
