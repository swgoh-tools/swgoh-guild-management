<?php

namespace App\Helper;

use App\Guild;
use App\Player;
use App\Helper\SyncClient;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Cache;
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
    }

    public function __destruct()
    {
        if ($this->flags && is_array($this->flags)) {
            $flags_per_logfile = [];
            foreach ($this->flags as $code => $flag) {
                $key = \substr((string)$code, 0, 3);
                $flags_per_logfile[$key][$code] = $flag;
            }
            foreach ($flags_per_logfile as $logfile_key => $logfile_flags) {
                $file = $this->data_dir . $this->folder_auto . $logfile_key . '.json';
                if (Storage::disk($this->data_disk)->exists($file)) {
                    $data = Storage::disk($this->data_disk)->get($file);
                    $data = \json_decode($data, true);
                    /**
                     * Do NOT use array_merge! It drops numeric keys in favour of index keys.
                     * Either array1 + array2 (the first existing entry is used)
                     * Or array_replace (second entry prevails)
                     */
                    $data = array_replace($data, $logfile_flags);
                    Storage::disk($this->data_disk)->put($file, \json_encode($data));
                    $this->log('comment', 'Written code flags (' . \json_encode($logfile_flags) . ") to file ($file)!");
                } else {
                    $this->log('error', 'Could not write code flags (' . \json_encode($logfile_flags) . ") back to file ($file)!");
                }
            }
            $this->flags = [];
        }
    }

    public function addManualCode($code)
    {
        if (!SyncClient::validateAllyCode($code)) {
            return false;
        }
        $file = $this->data_dir.$this->folder_input.$code;
        return Storage::disk($this->data_disk)->put($file, '');
    }

    public function checkCodeFiles()
    {
        $stats = [];
        $files = Storage::disk($this->data_disk)->files($this->data_dir.$this->folder_auto);
        if ($files) {
            foreach ($files as $file) {
                if (Storage::disk($this->data_disk)->exists($file)) {
                    $data = Storage::disk($this->data_disk)->get($file);
                    $data = json_decode($data, true);
                    $count_all = count($data);
                    $stats['ALL'] = ($stats['ALL'] ?? 0)+ $count_all;
                    $pool = array_filter($data, function ($v) {
                        return $v <> '';
                    });
                    $count_notes = count($pool);
                    $count_empty = $count_all - $count_notes;
                    $stats['EMPTY'] = ($stats['EMPTY'] ?? 0)+ $count_empty;
                    $unique = array_count_values($pool);
                    foreach ($unique as $field => $amount) {
                        $stats[$field] = ($stats[$field] ?? 0)+ $amount;
                    }
                }
            }
        }
        $this->log('line', json_encode($stats));
    }

    public function crawlCodes($codes)
    {
        $codes = SyncClient::validateAllyCodes($codes);
        if (!$codes) {
            return;
        }

        $this->log('line', 'crawl codes ' . implode(', ', $codes));

        // sync the guild
        $syncClient = new SyncClient;
        $syncClient->setPlayerCode($codes);
        $error = '';
        $is_stale = false;
        try {
            $result = $syncClient->sync('crawler');
            $result = [
                $result['crawler-pre'] ?? '',
                $result['crawler'] ?? ''
        ];
            $is_stale = \str_contains(\json_encode($result), 'Result is stale');
        } catch (\Exception $e) {
            $result = null;
            $error = $e->getMessage();
        } catch (\Throwable $th) {
            $result = null;
            $error = $th->getMessage();
        }
        $this->log('line', 'RESULT: ' . \json_encode($result));

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
                $this->log('info', $message);
                $this->flags[$rand_key] = 'CRAWLED';
            // later we might set the CRAWLED flag for all guild members
            // for now this is handled by the existence check above
            } else {
                if ($is_stale) {
                    $this->flags[$rand_key] = 'STALE';
                } else {
                    $this->flags[$rand_key] = 'FAILED';
                }
                $this->log('comment', '>> NOT FOUND: ' . $rand_key . ' ' . $this->flags[$rand_key]);
            }
        }

        if ($error) {
            $this->log('error', 'ERROR: '. $error);
        }
    }

    public function generateCodeFiles()
    {
        $vault = [];
        for ($i=1; $i < 10; $i++) {
            for ($j=1; $j < 10; $j++) {
                for ($k=1; $k < 10; $k++) {
                    // part 1
                    for ($l=1; $l < 10; $l++) {
                        // $this->log('line', 'using code ' . $i.$j.$k.$l);
                        for ($m=1; $m < 10; $m++) {
                            for ($n=1; $n < 10; $n++) {
                                //part 2
                                for ($o=1; $o < 10; $o++) {
                                    for ($p=1; $p < 10; $p++) {
                                        for ($q=1; $q < 10; $q++) {
                                            //part 3
                                            $vault[$i.$j.$k.$l.$m.$n.$o.$p.$q] = '';
                                        }
                                    }
                                }
                            }
                        }
                    }
                    $file = $this->data_dir . $this->folder_auto . '%s.json';
                    $file = sprintf($file, $i.$j.$k);
                    if (Storage::disk($this->data_disk)->exists($file)) {
                        //skip
                        $this->log('line', 'skip ' . $file);
                        $vault = [];
                    } else {
                        $this->log('line', 'save ' . $file);
                        // $data = Storage::disk('sync')->get($source);
                        // $roster = json_decode($data, true);

                        Storage::disk($this->data_disk)->put($file, \json_encode($vault));
                        $vault = [];
                    }
                }
            }
        }
        return true;
    }

    private function log(string $type, string $message)
    {
        if ($this->cmd) {
            switch ($type) {
                case 'comment':
                $this->cmd->comment($message);
                    break;
                    case 'info':
                    $this->cmd->info($message);
                        break;

                    case 'error':
                    $this->cmd->error($message);
                        break;
                        case 'success':
                        $this->cmd->success($message);
                            break;

                    default:
                $this->cmd->line($message);
                    break;
            }
        }
    }

    public function getRandomCodes($repeat, $manual_code = '')
    {
        $file = null;
        $manual_file = null;
        if ($manual_code) {
            $this->log('info', 'use manual code.' . $manual_code);
            $manual_file = $this->data_dir . $this->folder_auto  . substr($manual_code . 'make-this-a-string', 0, 3) . '.json';
            if (Storage::disk($this->data_disk)->exists($manual_file)) {
                $file = $manual_file;
            } else {
                $this->log('error', 'manual code found but no auto files matched! ' . $manual_file);
            }
        }
        if (!$file) {
            $this->log('comment', 'find random code file.');
            $files = Storage::disk($this->data_disk)->files($this->data_dir.$this->folder_auto);
            if ($files) {
                $rand_key = array_rand($files);
                $file = $files[$rand_key];
                /**
                 * Place to overwrite main file
                 * must match keys
                 */
                // $file = $dir.'/123.json';
            }
        }

        if ($file && Storage::disk($this->data_disk)->exists($file)) {
            $this->log('comment', 'selected input file ' . $file);
            $data = Storage::disk($this->data_disk)->get($file);
            $data = json_decode($data, true);
            $pool = array_filter($data, function ($v) {
                return $v == '';
            });
            $rand_keys = array_rand($pool, min($repeat, count($pool)));

            if (!is_array($rand_keys)) {
                $rand_keys = [$rand_keys];
            }
            if ($manual_file == $file) {
                $this->log('comment', 'added manual code to key list.');
                $rand_keys = \array_merge([$manual_code], $rand_keys);
            }
            /**
             * Place to overwrite keys
             * must match main file
             */
            // $rand_keys = [123123123];

            foreach ($rand_keys as $ref => $rand_key) {
                // // try new code if this one is already done
                // // should never happen because already filtered out from random pool
                // if ($this->flags[$rand_key]) {
                //     $this->log('line', 'SKIP: Code already processed: ' . $rand_key . ' - ' . $this->flags[$rand_key]);
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
                    $this->log('line', 'SKIP: Player already exists: ' . $rand_key . ' - ' .  $player->name);
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
        $folder = $this->data_dir.$this->folder_pending;
        if (!Storage::disk($this->data_disk)->exists($folder)) {
            return null;
        }

        $files = Storage::disk($this->data_disk)->files($folder);
        if (!$files) {
            return null;
        }

        foreach ($files as $file) {
            $code = $this->validateManualCode($file);
            /**
             * if a valid code was found, return it
             * otherwise continue to loop through the input files until a code is found
             */
            if (!$code) {
                // Input file is invalid. Log, delete, continue
                Storage::disk($this->data_disk)->append($this->data_dir.$this->folder_done.'error.log', time() . ' ' . $file . ' - Pending file was invalid. What!?');
                Storage::disk($this->data_disk)->delete($file);
                continue;
            }
            $player = Player::where('code', $code)->first();
            if (!$player) {
                // Player not in database. Log, delete, continue
                Storage::disk($this->data_disk)->append($this->data_dir.$this->folder_done.'failed.log', time() . ' ' . $file . ' - Failed. No Player created.');
                Storage::disk($this->data_disk)->delete($file);
                continue;
            }

            // Player found. Great.
            Storage::disk($this->data_disk)->append($this->data_dir.$this->folder_done.'success.log', time() . ' ' . $file);
            Storage::disk($this->data_disk)->delete($file);
            continue;
        }

        /**
         * All files checked
         */
        return null;
    }

    public function getManualCode()
    {
        $folder = $this->data_dir.$this->folder_input;
        if (!Storage::disk($this->data_disk)->exists($folder)) {
            return null;
        }

        $files = Storage::disk($this->data_disk)->files($folder);
        if (!$files) {
            return null;
        }

        foreach ($files as $file) {
            $code = $this->validateManualCode($file);
            /**
             * if a valid code was found, return it
             * otherwise continue to loop through the input files until a code is found
             */
            if (!$code) {
                // Input file is invalid. Log, delete, continue
                Storage::disk($this->data_disk)->append($this->data_dir.$this->folder_done.'error.log', time() . ' ' . $file);
                Storage::disk($this->data_disk)->delete($file);
                continue;
            }
            $player = Player::where('code', $code)->first();
            if ($player) {
                // Player already in database. Log, delete, continue
                Storage::disk($this->data_disk)->append($this->data_dir.$this->folder_done.'skip.log', time() . ' ' . $file);
                Storage::disk($this->data_disk)->delete($file);
                continue;
            }

            Storage::disk($this->data_disk)->move($file, $this->data_dir.$this->folder_pending . $code);
            return $code;
        }

        /**
         * All input files invalid
         */
        return null;
    }

    private function validateManualCode(string $file)
    {
        $parts = \explode('/', \str_replace('\\', '/', $file));
        if (!is_array($parts)) {
            $code = $parts;
        } else {
            $code = \array_pop($parts);
        }
        if (preg_match('/^[1-9]{9}$/', $code)) {
            return $code;
        }

        return null;
    }
}
