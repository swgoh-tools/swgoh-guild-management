<?php

namespace App\Helper;

use Illuminate\Support\Facades\Storage;

class SyncClient
{
    protected $lockfile = 'sync.lock';
    // protected $datadir = '/app/public/data/';
    protected $authdir = 'auth/';

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
        ];
    }

    public static function getRoster()
    {
        $filename = 'swgoh.help/guild/758735237/units.roster.json';
        if (Storage::disk('sync')->exists($filename)) {
            return json_decode(Storage::disk('sync')->get($filename), true);
        }
    }

    public function isRunning() {
        if (Storage::disk('sync')->exists($this->lockfile)) {
            return Storage::disk('sync')->lastModified($this->lockfile);
        }
    }

    public function clearLock() {
        return Storage::disk('sync')->delete($this->lockfile);
    }

    public function sync($target)
    {
        if ($this->isRunning()) {
            return 'already syncing';
        }

        try {
            // throw new MyException();
            Storage::disk('sync')->put($this->lockfile, '');

            ini_set('max_execution_time', 500);
            ini_set('default_socket_timeout', 300);
            ini_set('upload_max_filesize', '25M');
            ini_set('post_max_size', '25M');
            ini_set('memory_limit', '256M');
            ini_set('max_input_time', 300);

            $sync_status = \Cache::get('sync_status');
            $sync_status['error'] = '';

            switch ($target) {
                case 'toons':
                $sync_status['toons'] = $this->syncToons();
                break;
                
                case 'squads':
                $sync_status['squads'] = $this->syncSquads();
                break;
            
                case 'ships':
                $sync_status['ships'] = $this->syncShips();
                break;
            
                case 'abilities':
                $sync_status['abilities'] = $this->syncAbilities();
                break;
            
                case 'guild':
                $sync_status['guild'] = $this->syncGuildUnits(17401);
                break;
            
                case 'h-units':
                $sync_status['h-units'] = $this->syncHelpGuild(758735237);
                $filename = 'swgoh.help/guild/758735237/units.roster.json';
                if (isset($sync_status['h-units']['status']) && $sync_status['h-units']['status'] == 'NEW') {
                    $this->prepareHelpGuild(758735237);
                } elseif (! Storage::disk('sync')->exists($filename)) {
                    $this->prepareHelpGuild(758735237);
                }
                break;
            
                case 'h-abilities':
                $sync_status['h-abilities'] = $this->syncHelpAbilities();
                break;
            
                case 's':
                $sync_status['s'] = substr($this->getAccessToken(), 0, 7);
                break;
                
                default:
                    # code...
                    break;
            }

            // $sync_status['ability'] = $this->syncAbility('specialskill_GRIEVOUS02');
        } catch (Exception $e) {
            $sync_status['error'] = $e; //get_class($e);
            $sync_status['test'] = time(); //get_class($e);
        } finally {
            \Cache::forever('sync_status', $sync_status);
            $this->clearLock();
            return $sync_status;
        }
    }

    private function prepareHelpGuild($player_allycode)
    {
        if (Storage::disk('sync')->exists("swgoh.help/guild/$player_allycode/units.json")) {
            $data = Storage::disk('sync')->get("swgoh.help/guild/$player_allycode/units.json");
            $units = json_decode($data, true);
            $roster = null;
            if (isset($units['roster']) && is_array($units['roster'])) {
                $roster = $units['roster'];
            } elseif (isset($units[0]) && isset($units[0]['roster']) && is_array($units[0]['roster'])) {
                $roster = $units[0]['roster'];
            }
            if ($roster) {
                ksort($roster); // slow!
                $roster = json_encode($roster, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
                Storage::disk('sync')->put("swgoh.help/guild/$player_allycode/units.roster.json", $roster);
            }
        }
    }

    public function syncHelpGuild($player_allycode)
    {
        $source = "https://api.swgoh.help/swgoh/guild";
        $dir = "swgoh.help/guild/$player_allycode/";
        $file = 'units';
        $ext = 'json';
        $threshold = 60 * 60 * 24;

        if (! is_integer($player_allycode)) {
            return false;
        }

        $token = $this->getAccessToken();
        
        if ($token) {
            $body = [
                "allycode" => $player_allycode,
                "language" => "eng_us",
                "roster" => true,
                "units" => true,
                "mods" => false,
                // "project" => [
                //     "name" => 1,
                //     "gp" => 1,
                //     "roster" => 1
                //     ]
                ];
            $opts = array(
                'http'=>array(
                    'method'=>"POST",
                    'header'=>[
                        "Accept: application/json",
                        "Content-Type: application/json",
                        "Authorization: Bearer $token"
                    ],
                    'content' => json_encode($body)
                )
            );
        
            $context = stream_context_create($opts);
            return $this->syncData($source, $dir, $file, $ext, $threshold, $context);
        }
    }

    public function syncHelpAbilities()
    {
        $source = "https://api.swgoh.help/swgoh/data";
        $dir = "swgoh.help/data/";
        $file = 'abilities';
        $ext = 'json';
        $threshold = 60 * 60 * 24;

        $token = $this->getAccessToken();
        
        if ($token) {
            $body = [
                // "collection" => "unitsList",
                "collection" => "abilityList",
                "language" => "eng_us",
                // "match" => [
                    // "id" => "5b9a72b2d1c56b4c45f193ac",
                    // "rarity" => 7
                // ],
                // "project" => [
                    // "nameKey" => 1,
                    // "descKey" => 1,
                //     "forceAlignment" => 1,
                //     "categoryIdList" => 1,
                //     "baseStat" => 1,
                //     "combatType" => 1
                // ],
                ];
            $opts = array(
                'http'=>array(
                    'method'=>"POST",
                    'header'=>[
                        "Accept: application/json",
                        "Content-Type: application/json",
                        "Authorization: Bearer $token"
                    ],
                    'content' => json_encode($body)
                )
            );
        
            $context = stream_context_create($opts);
            return $this->syncData($source, $dir, $file, $ext, $threshold, $context);
        }
    }

    private function getAccessToken()
    {
        $dir = $this->authdir . 'swgoh.help/';
        $filename = $dir . "access.json";

        if ($response = Storage::get($filename)) {
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
        $opts = array(
            'http'=>array(
                'method'=>"POST",
                'header'=>"Accept-language: en\r\n" .
                        "Content-Type: application/x-www-form-urlencoded\r\n" .
                        "Payload: ".base64_encode("username=$https_user&password=$https_password&grant_type=password&client_id=$client_id&client_secret=$client_secret")."\r\n",
                // 'content' => $body,
                'timeout' => 30
            )
        );
        $opts = array(
            'http'=>array(
                'method'=>"POST",
                'header'=>[
                    "Content-Type: application/x-www-form-urlencoded"
                ],
                'content' => $body
            )
        );
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

    public function syncGuildUnits($swgoh_guild_id)
    {
        $source = "https://swgoh.gg/api/guild/$swgoh_guild_id/";
        $dir = "swgoh.gg/guild/$swgoh_guild_id/";
        $file = 'units';
        $ext = 'json';
        $threshold = 60 * 60 * 24;
        return $this->syncData($source, $dir, $file, $ext, $threshold);
    }

    // public function syncGuildUnitsLegacy($swgoh_guild_id)
    // {
    //     $source = "https://swgoh.gg/api/guilds/$swgoh_guild_id/units/";
    //     $dir = "swgoh.gg/guilds/$swgoh_guild_id/units/";
    //     $file = 'units';
    //     $ext = 'json';
    //     $threshold = 60 * 60 * 24;
    //     return $this->syncData($source, $dir, $file, $ext, $threshold);
    // }

    public function syncToons()
    {
        $source = 'https://swgoh.gg/api/characters/';
        $dir = 'swgoh.gg/characters/';
        $file = 'characters';
        $ext = 'json';
        $threshold = 60 * 60 * 24 * 3;
        return $this->syncData($source, $dir, $file, $ext, $threshold);
    }

    public function syncAbilities()
    {
        $source = 'https://swgoh.gg/api/abilities/';
        $dir = 'swgoh.gg/abilities/';
        $file = 'abilities';
        $ext = 'json';
        $threshold = 60 * 60 * 24 * 3;
        return $this->syncData($source, $dir, $file, $ext, $threshold);
    }

    public function syncAbility($id)
    {
        $source = "https://swgoh.gg/api/abilities/$id/";
        $dir = "swgoh.gg/abilities/ability/";
        $file = "$id";
        $ext = 'json';
        $threshold = 60 * 60 * 24 * 3;
        return $this->syncData($source, $dir, $file, $ext, $threshold);
    }

    public function syncShips()
    {
        $source = 'https://swgoh.gg/api/ships/';
        $dir = 'swgoh.gg/ships/';
        $file = 'ships';
        $ext = 'json';
        $threshold = 60 * 60 * 24 * 3;
        return $this->syncData($source, $dir, $file, $ext, $threshold);
    }

    public function syncSquads()
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

        if (! $last_sync || ($time - $last_sync > $threshold)) {
            if (Storage::disk('sync')->exists($filename_retry) && ($time - Storage::disk('sync')->lastModified($filename_retry) < $threshold_retry)) {
                // need some cooldown
                // prevents sync spawn in case there are errors
                // example: source not available / timeout
                return ['time' => $last_sync, 'status' => 'WAIT/RETRY'];
            }
            Storage::disk('sync')->put($filename_retry, ''); // continue but log time of request

            try {
                if ($data = file_get_contents($source, false, $context)) {
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
                        'error' => isset($http_response_header) ? implode('<br />', $http_response_header) : ''
                    ];
                }
            } catch (Exception $e) {
                return [
                    'status' => 'ERROR',
                    'error' => $e->getCode() . ':' . $e->getMessage() . ':' . isset($http_response_header) ? implode('|', $http_response_header) : ''
                ];
            }
        } else {
            // data is current
            return ['time' => $last_sync, 'status' => 'CURRENT', 'url' => Storage::disk('sync')->url($filename), 'size' => Storage::disk('sync')->size($filename)];
        }

        return false;
    }
}
