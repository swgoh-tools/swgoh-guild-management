<?php

declare(strict_types=1);

namespace App\Helper;

use App\Guild;
use App\Player;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class SyncCrawler
{
    /**
     * Default storage disk.
     *
     * @var string
     */
    protected $data_disk = 'local';

    /**
     * Optional command line reference for messages.
     *
     * @var string
     */
    protected $cmd = null;
    protected $logger = null;

    /**
     * Notes for processed codes that will be written back to code files.
     *
     * @var string
     */
    protected $flags = [];

    /**
     * Default storage disk.
     *
     * @var string
     */
    protected $data_dir = 'data/crawl/';
    protected $folder_auto = 'auto/';
    protected $folder_input = 'manual/queue/';
    protected $folder_pending = 'manual/pending/';
    protected $folder_done = 'manual/done/';
    // protected $folder_error = 'manual/error/';

    public function __construct(Command $cmd = null)
    {
        $this->cmd = $cmd;
        $this->logger = new Log($cmd);
    }

    public function __destruct()
    {
        if ($this->flags && \is_array($this->flags)) {
            $flags_per_logfile = [];
            foreach ($this->flags as $code => $flag) {
                $key = substr((string) $code, 0, 3);
                $flags_per_logfile[$key][$code] = $flag;
            }
            foreach ($flags_per_logfile as $logfile_key => $logfile_flags) {
                $file = $this->data_dir . $this->folder_auto . $logfile_key . '.json';
                if (Storage::disk($this->data_disk)->exists($file)) {
                    $data = Storage::disk($this->data_disk)->get($file);
                    $data = json_decode($data, true);
                    /**
                     * Do NOT use array_merge! It drops numeric keys in favour of index keys.
                     * Either array1 + array2 (the first existing entry is used)
                     * Or array_replace (second entry prevails).
                     */
                    $data = array_replace($data, $logfile_flags);
                    Storage::disk($this->data_disk)->put($file, json_encode($data));
                    $this->logger->log('comment', 'Written code flags (' . json_encode($logfile_flags) . ") to file ($file)!");
                } else {
                    $this->logger->log('error', 'Could not write code flags (' . json_encode($logfile_flags) . ") back to file ($file)!");
                }
            }
            $this->flags = [];
        }
    }

    public function addManualCode($code)
    {
        if (!SyncHelper::validateAllyCode($code)) {
            return false;
        }
        $file = $this->data_dir . $this->folder_input . $code;

        return Storage::disk($this->data_disk)->put($file, '');
    }

    public function syncErrorFiles()
    {
        $file = 'swgoh.help/players/players.CRAWLER.ERROR.log';
        if (!Storage::disk('sync')->exists($file)) {
            return false;
        }
        $handle = Storage::disk('sync')->readStream($file);
        // $data = json_decode($data, true);
        // $handle = @fopen("/tmp/inputfile.txt", "r");
        if ($handle) {
            while (false !== ($buffer = fgets($handle))) {
                $buffer = str_replace(',', '', $buffer);
                $entries = explode(' ', $buffer);
                echo date('c', $entries[0]) ?? '-';
                unset($entries[0]);
                foreach ($entries as $entry) {
                    $code = SyncHelper::validateAllyCode(trim($entry));
                    if ($code) {
                        $this->flags[$code] = 'ERROR';
                    }
                }
            }
            if (!feof($handle)) {
                echo "Error: unexpected fgets() fail\n";
            }
            // fclose($handle);
        }

        return true;
    }

    public function checkCodeFiles(): void
    {
        $stats = [];
        $files = Storage::disk($this->data_disk)->files($this->data_dir . $this->folder_auto);
        if ($files) {
            foreach ($files as $file) {
                if (Storage::disk($this->data_disk)->exists($file)) {
                    $data = Storage::disk($this->data_disk)->get($file);
                    $data = json_decode($data, true);
                    $count_all = \count($data);
                    $stats['ALL'] = ($stats['ALL'] ?? 0) + $count_all;
                    // $pool = array_filter($data, function ($v) {
                    //     return $v <> '';
                    // });
                    // $count_notes = count($pool);
                    // $count_empty = $count_all - $count_notes;
                    // $stats['EMPTY'] = ($stats['EMPTY'] ?? 0)+ $count_empty;
                    // $unique = array_count_values($pool);
                    $unique = array_count_values($data);
                    foreach ($unique as $field => $amount) {
                        if (!$field) {
                            $field = 'EMPTY';
                        }
                        $stats[$field] = ($stats[$field] ?? 0) + $amount;
                    }
                }
            }
        }
        $this->logger->log('line', json_encode($stats));
    }

    public function rereadPlayerJsons($earliest_time = 0): void
    {
        $files = Storage::disk('sync')->files('swgoh.help/players');
        if ($files) {
            foreach ($files as $file) {
                if (!preg_match('/players\.CRAWLER\.(\d{10})\.json/', $file, $matches)) {
                    $this->logger->log('info', 'skip file: ' . $file);
                    continue;
                }
                if ($matches[1] < $earliest_time) {
                    continue;
                }
                if (Storage::disk('sync')->exists($file)) {
                    $this->logger->log('info', 'read file: ' . $file);
                    $data = Storage::disk('sync')->get($file);
                    $data = json_decode($data, true);
                    foreach ($data as $player) {
                        $player_allyCode = $player['allyCode'] ?? null;
                        $player_name = $player['name'] ?? null;
                        $player_refId = $player['id'] ?? null;
                        $player_level = $player['level'] ?? null;
                        $player_lastActivity = $player['lastActivity'] ?? null;
                        $player_updated = $player['updated'] ?? null;
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
                                    if (($stat['nameKey'] ?? '') == 'STAT_GALACTIC_POWER_ACQUIRED_NAME' || ($stat['nameKey'] ?? '') == 'Galactic Power:') {
                                        $player_gp = $stat['value'] ?? null;
                                    }
                                }
                            }

                            $db_player = Player::where('code', $player_allyCode)->first();
                            if (!$db_player) {
                                $this->logger->log('line', 'missing player found. add to database: ' . $player_allyCode);
                                Player::create(
                                    [
                                        'code' => $player_allyCode,
                                        'name' => $player_name,
                                        'refId' => $player_refId,
                                        'guildRefId' => $guild_id,
                                        'level' => $player_level,
                                        'gp' => $player_gp,
                                        'origin' => 'crawler',
                                        'lastActivity' => $player_lastActivity,
                                        'updated' => $player_updated,
                                        ]
                                );
                            } else {
                                $db_player->name = $db_player->name ?? $player_name;
                                $db_player->refId = $db_player->refId ?? $player_refId;
                                $db_player->guildRefId = $db_player->guildRefId ?? $guild_id;
                                $db_player->gp = $db_player->gp ?? $player_gp;
                                $db_player->level = $db_player->level ?? $player_level;
                                $db_player->lastActivity = $db_player->lastActivity ?? $player_lastActivity;
                                $db_player->updated = $db_player->updated ?? $player_updated;
                                if ($db_player->isDirty()) {
                                    $this->logger->log('line', 'saving ' . \count($db_player->getDirty()) . " changes for player: $player_allyCode " . json_encode($db_player->getDirty()));
                                    // $db_player->origin = 'crawler';
                                }
                                $db_player->save();
                            }

                            if ($guild_id && $guild_name) {
                                $existing_guild = Guild::where('refId', $guild_id)->first();

                                if (!$existing_guild) {
                                    $this->logger->log('line', 'missing guild found. add code to pending list: ' . $player_allyCode);
                                    $new_guild = Guild::create([
                                        // 'user_id' => null,
                                        'code' => null,
                                        'name' => $guild_name,
                                        'refId' => $guild_id,
                                        'origin' => 'crawler',
                                    ]);
                                    $crawler_pending_guild = 'swgoh.help/players/players.CRAWLER.PENDING.json';
                                    $pending_codes = [];
                                    if (Storage::disk('sync')->exists($crawler_pending_guild)) {
                                        $data = Storage::disk('sync')->get($crawler_pending_guild);
                                        $pending_codes = json_decode($data, true);
                                    }
                                    // add playercode back because it belongs to a guild member
                                    $pending_codes[] = $player_allyCode;
                                    // save $pending_codes back for next run
                                    Storage::disk('sync')->put($crawler_pending_guild, json_encode($pending_codes));
                                }
                            } else {
                                // Storage::disk('sync')->append($crawler_done_single_log, time() . ' ' . $player_allyCode);
                            }
                        }
                    }
                }
            }
        }
        // $this->logger->log('line', json_encode($stats));
    }

    public function rereadGuildJsons($smallest_guild_ref = 0): void
    {
        $directories = Storage::disk('sync')->directories('swgoh.help/guild');
        if ($directories) {
            foreach ($directories as $directory) {
                if (!preg_match('~^swgoh.help/guild/G(\d*)$~', $directory, $matches)) {
                    $this->logger->log('info', 'skip directory: ' . $directory);
                    continue;
                }
                if ($matches[1] < $smallest_guild_ref) {
                    continue;
                }
                $file = $directory . '/guild.json';
                if (Storage::disk('sync')->exists($file)) {
                    // $this->logger->log('info', "read file: " . $file);
                    $data = Storage::disk('sync')->get($file);
                    $data = json_decode($data, true);

                    $guild_id = $data[0]['id'] ?? '';
                    $guild_name = $data[0]['name'] ?? '';
                    $guild_gp = $data[0]['gp'] ?? '';

                    $guild_leader = null;
                    $guild_roster = $data[0]['roster'] ?? [];

                    foreach ($guild_roster as $player) {
                        $player_allyCode = $player['allyCode'] ?? null;
                        $player_name = $player['name'] ?? null;
                        $player_refId = $player['id'] ?? null;
                        $player_level = $player['level'] ?? null;
                        $player_lastActivity = $player['lastActivity'] ?? null; // does not exist in roster response
                        $player_updated = $player['updated'] ?? null;
                        $player_gp = $player['gp'] ?? null;
                        $player_guildMemberLevel = $player['guildMemberLevel'] ?? null;

                        if ('GUILDLEADER' == $player_guildMemberLevel) {
                            $guild_leader = $player_allyCode;
                        }

                        // Save player data to database
                        if ($player_allyCode && $player_name) {
                            $db_player = Player::where('code', $player_allyCode)->first();
                            if (!$db_player) {
                                $this->logger->log('line', 'missing player found. add to database: ' . $player_allyCode);
                                Player::create(
                                    [
                                        'code' => $player_allyCode,
                                        'name' => $player_name,
                                        'refId' => $player_refId,
                                        'guildRefId' => $guild_id,
                                        'level' => $player_level,
                                        'gp' => $player_gp,
                                        'origin' => 'crawler2',
                                        'lastActivity' => $player_lastActivity,
                                        'updated' => $player_updated,
                                        ]
                                );
                            } else {
                                $db_player->name = $db_player->name ?? $player_name;
                                $db_player->refId = $db_player->refId ?? $player_refId;
                                $db_player->guildRefId = $db_player->guildRefId ?? $guild_id;
                                $db_player->gp = $db_player->gp ?? $player_gp;
                                $db_player->level = $db_player->level ?? $player_level;
                                $db_player->lastActivity = $db_player->lastActivity ?? $player_lastActivity;
                                if ($db_player->isDirty()) {
                                    $db_player->updated = $db_player->updated ?? $player_updated;
                                    // $db_player->origin = 'crawler';
                                    $this->logger->log('line', 'saving ' . \count($db_player->getDirty()) . " changes for player: $player_allyCode " . json_encode($db_player->getDirty()));
                                }
                                $db_player->save();
                            }
                        }
                    }

                    if ($guild_id && $guild_name) {
                        $existing_guild = Guild::where('refId', $guild_id)->first();

                        if (!$existing_guild) {
                            $this->logger->log('line', 'missing guild found. Adding it to DB: ' . $guild_id);
                            $new_guild = Guild::create([
                                // 'user_id' => null,
                                'code' => $guild_leader,
                                'name' => $guild_name,
                                'refId' => $guild_id,
                                'origin' => 'crawler2',
                            ]);
                        } else {
                            $existing_guild->name = $existing_guild->name ?? $guild_name;
                            $existing_guild->refId = $existing_guild->refId ?? $guild_id;
                            $existing_guild->code = $existing_guild->codes ?? $guild_leader;
                            $existing_guild->gp = $existing_guild->gp ?? $guild_gp;
                            if ($existing_guild->isDirty()) {
                                $this->logger->log('line', 'saving ' . \count($existing_guild->getDirty()) . " changes for guild: $guild_id " . json_encode($existing_guild->getDirty()));
                                // $existing_guild->origin = 'crawler';
                            }
                            $existing_guild->save();
                        }
                    } else {
                        $this->logger->log('line', 'invalid guild file: ' . $file);
                    }
                }
            }
        }
        // $this->logger->log('line', json_encode($stats));
    }

    public function crawlCodes($codes): void
    {
        $codes = SyncHelper::validateAllyCodes($codes);
        if (!$codes) {
            return;
        }

        $this->logger->log('line', 'crawl codes ' . implode(', ', $codes));

        // sync the guild
        $syncClient = new SyncClient();
        $syncClient->setPlayerCode($codes);
        $error = '';
        $is_stale = false;
        try {
            $result = $syncClient->sync('crawler');
            $result = [
                $result['crawler-pre'] ?? '',
                $result['crawler'] ?? '',
        ];
            $is_stale = str_contains(json_encode($result), 'Result is stale');
        } catch (\Exception $e) {
            $result = null;
            $error = $e->getMessage();
        } catch (\Throwable $th) {
            $result = null;
            $error = $th->getMessage();
        }
        $this->logger->log('line', 'RESULT: ' . json_encode($result));

        foreach ($codes as $rand_key) {
            // now the player should be in the database
            // player files on storage are currently not created when crawling
            // the only way to get the guild id is the player from the databse
            $player = Player::where('code', $rand_key)->first();
            if ($player) {
                $guild = Guild::where('refId', $player->guildRefId)->first();

                $message = '>> SUCCESS: Added player '
                . ($player->name ?? '-')
                . ' ('
                . ($player->code ?? '-')
                . '). Guild: '
                . ($guild->name ?? $player->guildRefId ?? 'oops')
                . '| GP: '
                . ($player->gp ?? '-')
                . '| LastSeen: '
                . ($player->lastActivity ?? '-');
                $this->logger->log('info', $message);
                $this->flags[$rand_key] = 'CRAWLED';
            // later we might set the CRAWLED flag for all guild members
            // for now this is handled by the existence check above
            } else {
                if ($is_stale) {
                    $this->flags[$rand_key] = 'STALE';
                } else {
                    $this->flags[$rand_key] = 'FAILED';
                }
                $this->logger->log('comment', '>> NOT FOUND: ' . $rand_key . ' ' . $this->flags[$rand_key]);
            }
        }

        if ($error) {
            $this->logger->log('error', 'ERROR: ' . $error);
        }
    }

    public function generateCodeFiles()
    {
        $vault = [];
        for ($i = 1; $i < 10; ++$i) {
            for ($j = 1; $j < 10; ++$j) {
                for ($k = 1; $k < 10; ++$k) {
                    // part 1
                    for ($l = 1; $l < 10; ++$l) {
                        // $this->logger->log('line', 'using code ' . $i.$j.$k.$l);
                        for ($m = 1; $m < 10; ++$m) {
                            for ($n = 1; $n < 10; ++$n) {
                                //part 2
                                for ($o = 1; $o < 10; ++$o) {
                                    for ($p = 1; $p < 10; ++$p) {
                                        for ($q = 1; $q < 10; ++$q) {
                                            //part 3
                                            $vault[$i . $j . $k . $l . $m . $n . $o . $p . $q] = '';
                                        }
                                    }
                                }
                            }
                        }
                    }
                    $file = $this->data_dir . $this->folder_auto . '%s.json';
                    $file = sprintf($file, $i . $j . $k);
                    if (Storage::disk($this->data_disk)->exists($file)) {
                        //skip
                        $this->logger->log('line', 'skip ' . $file);
                        $vault = [];
                    } else {
                        $this->logger->log('line', 'save ' . $file);
                        // $data = Storage::disk('sync')->get($source);
                        // $roster = json_decode($data, true);

                        Storage::disk($this->data_disk)->put($file, json_encode($vault));
                        $vault = [];
                    }
                }
            }
        }

        return true;
    }

    public function getRandomCodes($repeat, $manual_code = '')
    {
        $file = null;
        $manual_file = null;
        if ($manual_code) {
            $this->logger->log('info', 'use manual code.' . $manual_code);
            $manual_file = $this->data_dir . $this->folder_auto . substr($manual_code . 'make-this-a-string', 0, 3) . '.json';
            if (Storage::disk($this->data_disk)->exists($manual_file)) {
                $file = $manual_file;
            } else {
                $this->logger->log('error', 'manual code found but no auto files matched! ' . $manual_file);
            }
        }
        if (!$file) {
            $this->logger->log('comment', 'find random code file.');
            $files = Storage::disk($this->data_disk)->files($this->data_dir . $this->folder_auto);
            if ($files) {
                $rand_key = array_rand($files);
                $file = $files[$rand_key];
                /*
                 * Place to overwrite main file
                 * must match keys
                 */
                // $file = $dir.'/123.json';
            }
        }

        if ($file && Storage::disk($this->data_disk)->exists($file)) {
            $this->logger->log('comment', 'selected input file ' . $file);
            $data = Storage::disk($this->data_disk)->get($file);
            $data = json_decode($data, true);
            $pool = array_filter($data, function ($v) {
                return '' == $v;
            });
            $rand_keys = array_rand($pool, min($repeat, \count($pool)));

            if (!\is_array($rand_keys)) {
                $rand_keys = [$rand_keys];
            }
            if ($manual_file == $file) {
                $this->logger->log('comment', 'added manual code to key list.');
                $rand_keys = array_merge([$manual_code], $rand_keys);
            }
            /*
             * Place to overwrite keys
             * must match main file
             */
            // $rand_keys = [123123123];

            foreach ($rand_keys as $ref => $rand_key) {
                // // try new code if this one is already done
                // // should never happen because already filtered out from random pool
                // if ($this->flags[$rand_key]) {
                //     $this->logger->log('line', 'SKIP: Code already processed: ' . $rand_key . ' - ' . $this->flags[$rand_key]);
                //     if (1 === $repeat) {
                //         return $this->handle();
                //     } else {
                //         unset($rand_keys[$ref]);
                //     }
                // }

                // check if code already known e.g. from non-crawling matters
                // update crawl file and try new code
                $player = Player::where('code', $rand_key)->first();
                if ($player) {
                    $this->logger->log('line', 'SKIP: Player already exists: ' . $rand_key . ' - ' . $player->name);
                    $this->flags[$rand_key] = 'EXISTS';
                    if (1 === $repeat) {
                        return $this->getRandomCodes($repeat);
                    } else {
                        unset($rand_keys[$ref]);
                    }
                }

                return $rand_keys;
            }
        }
    }

    public function checkManualPending()
    {
        $folder = $this->data_dir . $this->folder_pending;
        if (!Storage::disk($this->data_disk)->exists($folder)) {
            return null;
        }

        $files = Storage::disk($this->data_disk)->files($folder);
        if (!$files) {
            return null;
        }

        foreach ($files as $file) {
            $code = $this->validateManualCode($file);
            /*
             * if a valid code was found, return it
             * otherwise continue to loop through the input files until a code is found
             */
            if (!$code) {
                // Input file is invalid. Log, delete, continue
                Storage::disk($this->data_disk)->append($this->data_dir . $this->folder_done . 'error.log', time() . ' ' . $file . ' - Pending file was invalid. What!?');
                Storage::disk($this->data_disk)->delete($file);
                continue;
            }
            $player = Player::where('code', $code)->first();
            if (!$player) {
                // Player not in database. Log, delete, continue
                Storage::disk($this->data_disk)->append($this->data_dir . $this->folder_done . 'failed.log', time() . ' ' . $file . ' - Failed. No Player created.');
                Storage::disk($this->data_disk)->delete($file);
                continue;
            }

            // Player found. Great.
            Storage::disk($this->data_disk)->append($this->data_dir . $this->folder_done . 'success.log', time() . ' ' . $file);
            Storage::disk($this->data_disk)->delete($file);
            continue;
        }

        /*
         * All files checked
         */
        return null;
    }

    public function getManualCode()
    {
        $folder = $this->data_dir . $this->folder_input;
        if (!Storage::disk($this->data_disk)->exists($folder)) {
            return null;
        }

        $files = Storage::disk($this->data_disk)->files($folder);
        if (!$files) {
            return null;
        }

        foreach ($files as $file) {
            $code = $this->validateManualCode($file);
            /*
             * if a valid code was found, return it
             * otherwise continue to loop through the input files until a code is found
             */
            if (!$code) {
                // Input file is invalid. Log, delete, continue
                Storage::disk($this->data_disk)->append($this->data_dir . $this->folder_done . 'error.log', time() . ' ' . $file);
                Storage::disk($this->data_disk)->delete($file);
                continue;
            }
            $player = Player::where('code', $code)->first();
            if ($player) {
                // Player already in database. Log, delete, continue
                Storage::disk($this->data_disk)->append($this->data_dir . $this->folder_done . 'skip.log', time() . ' ' . $file);
                Storage::disk($this->data_disk)->delete($file);
                continue;
            }

            Storage::disk($this->data_disk)->move($file, $this->data_dir . $this->folder_pending . $code);

            return $code;
        }

        /*
         * All input files invalid
         */
        return null;
    }

    private function validateManualCode(string $file)
    {
        $parts = explode('/', str_replace('\\', '/', $file));
        if (!\is_array($parts)) {
            $code = $parts;
        } else {
            $code = array_pop($parts);
        }
        if (preg_match('/^[1-9]{9}$/', $code)) {
            return $code;
        }

        return null;
    }
}
