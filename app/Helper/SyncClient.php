<?php

namespace App\Helper;

class SyncClient {

    protected $lockfile = 'sync.lock';
    protected $datadir = 'data/';
    protected $authdir = 'auth/';

    public static function getStatus() {
        return [];
    }

    public function sync() {
        if (file_exists($this->lockfile)) {
            return 'already syncing';
        }

        $sync_status = [];

        try {
            // throw new MyException();
            touch($this->lockfile);

            ini_set('max_execution_time', 500);
            ini_set('default_socket_timeout', 300);
            ini_set('upload_max_filesize', '25M');
            ini_set('post_max_size', '25M');
            ini_set('memory_limit', '256M');
            ini_set('max_input_time', 300);

            $sync_status['toons'] = $this->syncToons();

            $sync_status['squads'] = $this->syncSquads();

            $sync_status['ships'] = $this->syncShips();

            $sync_status['abilities'] = $this->syncAbilities();
            // $sync_status['ability'] = $this->syncAbility('specialskill_GRIEVOUS02');

            $sync_status['guild'] = $this->syncGuildUnits(17401);

            $sync_status['h-units'] = $this->syncHelpGuild(758735237);
            $sync_status['h-abilities'] = $this->syncHelpAbilities();

            $sync_status['s'] = substr($this->getAccessToken(), 0, 7);
        } catch (Exception $e) {
            $sync_status['error'] = get_class($e);
        } finally {
            unlink($this->lockfile);
        }

        return $sync_status;
    }

    public function syncHelpGuild($player_allycode) {
        $source = "https://api.swgoh.help/swgoh/guild";
        $dir = $this->datadir . "swgoh.help/guild/$player_allycode/";
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

    public function syncHelpAbilities() {
        $source = "https://api.swgoh.help/swgoh/data";
        $dir = $this->datadir . "swgoh.help/data/";
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

    private function getAccessToken() {
        $dir = $this->authdir . 'swgoh.help/';
        $filename = $dir . "access.json";

        if (! file_exists($dir)) {
            mkdir($dir, 0750, true);
        }

        if (file_exists($filename)) {
            $response = file_get_contents($filename);
            $response = json_decode($response, true);
            if (array_key_exists('access_token', $response) && array_key_exists('expires_in', $response)) {
                if ( (time() - filemtime($filename)) < ($response['expires_in'] - 60) ) {
                    // return saved session
                    return $response['access_token'];
                }
            }
        }

        // if we are still here, get new Access Token
        $https_user = 'vksg';
        $https_password = 'godown13SW';
        $https_server = 'api.swgoh.help/auth/signin';
        $body = "username=$https_user&password=$https_password&grant_type=password&client_id=abc&client_secret=123";
        $opts = array(
            'http'=>array(
                'method'=>"POST",
                'header'=>"Accept-language: en\r\n" .
                        "Content-Type: application/x-www-form-urlencoded\r\n" . 
                        "Payload: ".base64_encode("username=$https_user&password=$https_password&grant_type=password&client_id=abc&client_secret=123")."\r\n",
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
        $url = 'https://'.$https_server;
        $result = file_get_contents($url, false, $context, 0, 40000);
        $result = json_decode($result, true);
        if (array_key_exists('access_token', $result)) {
            file_put_contents($filename, json_encode($result));
            return $result['access_token'];
        }

        return false;
    }

    public function syncGuildUnits($swgoh_guild_id) {
        $source = "https://swgoh.gg/api/guild/$swgoh_guild_id/";
        $dir = $this->datadir . "swgoh.gg/guild/$swgoh_guild_id/";
        $file = 'units';
        $ext = 'json';
        $threshold = 60 * 60 * 24;
        return $this->syncData($source, $dir, $file, $ext, $threshold);
    }

    public function syncGuildUnitsLegacy($swgoh_guild_id) {
        $source = "https://swgoh.gg/api/guilds/$swgoh_guild_id/units/";
        $dir = $this->datadir . "swgoh.gg/guilds/$swgoh_guild_id/units/";
        $file = 'units';
        $ext = 'json';
        $threshold = 60 * 60 * 24;
        return $this->syncData($source, $dir, $file, $ext, $threshold);
    }

    public function syncToons() {
        $source = 'https://swgoh.gg/api/characters/';
        $dir = $this->datadir . 'swgoh.gg/characters/';
        $file = 'characters';
        $ext = 'json';
        $threshold = 60 * 60 * 24 * 3;
        return $this->syncData($source, $dir, $file, $ext, $threshold);
    }

    public function syncAbilities() {
        $source = 'https://swgoh.gg/api/abilities/';
        $dir = $this->datadir . 'swgoh.gg/abilities/';
        $file = 'abilities';
        $ext = 'json';
        $threshold = 60 * 60 * 24 * 3;
        return $this->syncData($source, $dir, $file, $ext, $threshold);
    }

    public function syncAbility($id) {
        $source = "https://swgoh.gg/api/abilities/$id/";
        $dir = $this->datadir . "swgoh.gg/abilities/ability/";
        $file = "$id";
        $ext = 'json';
        $threshold = 60 * 60 * 24 * 3;
        return $this->syncData($source, $dir, $file, $ext, $threshold);
    }

    public function syncShips() {
        $source = 'https://swgoh.gg/api/ships/';
        $dir = $this->datadir . 'swgoh.gg/ships/';
        $file = 'ships';
        $ext = 'json';
        $threshold = 60 * 60 * 24 * 3;
        return $this->syncData($source, $dir, $file, $ext, $threshold);
    }

    public function syncSquads() {
        $source = 'https://swgoh.help/data/squads.json';
        $dir = $this->datadir . 'swgoh.help/squads/';
        $file = 'squads';
        $ext = 'json';
        $threshold = 60 * 60 * 24 * 7;
        return $this->syncData($source, $dir, $file, $ext, $threshold);
    }

    private function syncData($source, $dir, $file, $ext, $threshold, $context = null) {
        $time = time();
        $filename = "$dir$file.$ext";
        $filename_ts = "$dir$file.$time.$ext";
        $filename_hash = "$dir$file.md5";
        $filename_retry = "$dir$file.retry";

        $threshold_retry = 60 * 1; // 10 min cooldown

        $last_sync = 0;
        $last_hash = '';
        $last_hash_ts = 0;

        if (! file_exists($dir)) {
            mkdir($dir, 0750, true);
        }

        if (file_exists($filename)) {
            $last_sync = filemtime($filename);
        }

        if (! $last_sync || ($time - $last_sync > $threshold) ) {
            if (file_exists($filename_retry) && ($time - filemtime($filename_retry) < $threshold_retry) ) {
                // need some cooldown
                // prevents sync spawn in case there are errors
                // example: source not available / timeout
                return [$last_sync, '-'];
            }
            touch($filename_retry); // continue but log time of request

            try {
                if ($data = file_get_contents($source, false, $context)) {
                    if (file_exists($filename_hash)) {
                        $last_hash = file_get_contents($filename_hash);
                        $last_hash_ts = filemtime($filename_hash);
                    }

                    $hash = md5($data);
                    if ($hash == $last_hash) {
                        touch($filename, $time);
                        return [$last_hash_ts, 'EQ'];
                    }

                    $data = json_decode($data);
                    $data = json_encode($data, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
                    if (file_put_contents($filename, $data)) {
                        file_put_contents($filename_hash, $hash);
                        copy($filename, $filename_ts);
                        return [$time, 'NEW'];
                    }
                } else {
                    return [
                        '',
                        'PROBLEM',
                        'url' => 'https://' .  $_SERVER['SERVER_NAME'] . "/dev/web-games-swgoh/roster/" . str_ireplace($_SERVER['DOCUMENT_ROOT'], '', $filename),
                        'error' => isset($http_response_header) ? implode('<br />', $http_response_header) : ''
                    ];
                }
            } catch (Exception $e) {
                return [
                    '',
                    'ERROR',
                    'url' => 'https://' .  $_SERVER['SERVER_NAME'] . "/dev/web-games-swgoh/roster/" . str_ireplace($_SERVER['DOCUMENT_ROOT'], '', $filename),
                    'error' => $e->getCode() . ':' . $e->getMessage() . ':' . isset($http_response_header) ? implode('|', $http_response_header) : ''
                ];
            }
        } else {
            // data is current
            return [$last_sync, 'CUR', 'url' => 'https://' .  $_SERVER['SERVER_NAME'] . "/dev/web-games-swgoh/roster/" . str_ireplace($_SERVER['DOCUMENT_ROOT'], '', $filename)];
        }

        return false;
    }
}
