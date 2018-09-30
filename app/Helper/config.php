<?php
if (! defined('SWGOH')) {
    die('NOT ALLOWED');
}

define('MSG_STATUS_ALREADY_SYNCING', 'already syncing');
define('DIR_AUTH', 'auth/');
define('SYNC_LIMIT_RESYNC_LIVE', 60 * 60 * 24);
define('SYNC_LIMIT_RESYNC_DECENT', 60 * 60 * 24 * 3);
define('SYNC_LIMIT_RESYNC_STATIC', 60 * 60 * 24 * 7);
define('SYNC_LIMIT_RETRY', 60 * 10);
define('DATA_FILE_EXT', 'json');
define('API_SWGOH_HELP_USER', 'vksg');
define('API_SWGOH_HELP_PASSWORD', 'godown13SW');
define('API_SWGOH_HELP_SERVER', 'https://api.swgoh.help/');
define('API_SWGOH_HELP_CLIENT_ID', 'abc');
define('API_SWGOH_HELP_CLIENT_SECRET', '123');
define('SYNC_REQUEST_TIMEOUT', 30);
define('SYNC_FILE_STREAM_MAX_LENGTH', 40000);
define('API_SWGOH_GG_USER', '');
define('API_SWGOH_GG_PASSWORD', '');
define('API_SWGOH_GG_SERVER', 'https://swgoh.gg/api/');
define('API_SWGOH_GG_CLIENT_ID', '');
define('API_SWGOH_GG_CLIENT_SECRET', '');
define('MSG_STATUS_COOLDOWN', '-');
define('MSG_STATUS_UNCHANGED', 'EQ');
define('MSG_STATUS_NEW', 'NEW');
define('MSG_STATUS_CURRENT', 'CUR');

class Config
{

    protected $swgoh_guild_id = 17401;
    protected $player_allycode = 758735237;
}
