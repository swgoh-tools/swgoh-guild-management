<?php

return [

    /*
    |--------------------------------------------------------------------------
    | SWGoH App Settings
    |--------------------------------------------------------------------------
    |
    | This file is for storing additional settings needed for
    | SWGoH features such as synchronisation.
    |
    */

    'CONTACT' => [
        'USER_ID' => env('CONTACT_USER_ID', ''),
        'USER_NAME' => env('CONTACT_USER_NAME', ''),
        'GUILD_NAME' => env('CONTACT_GUILD_NAME', ''),
        'PLAYER_NAME' => env('CONTACT_PLAYER_NAME', ''),
        'SWGOH_GG_URL' => env('CONTACT_SWGOH_GG_URL', ''),
        'SWGOH_GG_NAME' => env('CONTACT_SWGOH_GG_NAME', ''),
        'DISCORD' => env('CONTACT_DISCORD', ''),
        'LINE' => env('CONTACT_LINE', ''),
        'EA_FORUM_URL' => env('CONTACT_EA_FORUM_URL', ''),
        'EA_FORUM_NAME' => env('CONTACT_EA_FORUM_NAME', ''),
        'ISSUES_URL' => env('CONTACT_ISSUES_URL', ''),
    ],
    'GUILD_DEFAULT_ID' => env('GUILD_DEFAULT_ID', ''),
    'GUILD_TEST_ID' => env('GUILD_TEST_ID', ''),
    'DATA_FILE_EXT' => 'json',
    'DIR_AUTH' => env('DIR_AUTH', 'auth/'),
    'MSG_STATUS_ALREADY_SYNCING' => 'already syncing',
    'MSG_STATUS_COOLDOWN' => '-',
    'MSG_STATUS_UNCHANGED' => 'EQ',
    'MSG_STATUS_NEW' => 'NEW',
    'MSG_STATUS_CURRENT' => 'CUR',
    'SYNC_LIMIT_RESYNC_LIVE' => env('SYNC_LIMIT_RESYNC_LIVE', 60 * 60 * 24),
    'SYNC_LIMIT_RESYNC_DECENT' => env('SYNC_LIMIT_RESYNC_DECENT', 60 * 60 * 24 * 3),
    'SYNC_LIMIT_RESYNC_STATIC' => env('SYNC_LIMIT_RESYNC_STATIC', 60 * 60 * 24 * 7),
    'SYNC_LIMIT_RETRY' => env('SYNC_LIMIT_RETRY', 60 * 10),
    'SYNC_REQUEST_TIMEOUT' => env('SYNC_REQUEST_TIMEOUT', 30),
    'SYNC_FILE_STREAM_MAX_LENGTH' => env('SYNC_FILE_STREAM_MAX_LENGTH', 40000),

    'API' => [
        'SWGOH_GG' => [
            'USER' => env('API_SWGOH_GG_USER'),
            'PASSWORD' => env('API_SWGOH_GG_PASSWORD'),
            'SERVER' => env('API_SWGOH_GG_SERVER', 'https://swgoh.gg/api'),
            'AUTH_SERVER' => env('API_SWGOH_GG_AUTH_SERVER'),
            'CLIENT_ID' => env('API_SWGOH_GG_CLIENT_ID'),
            'CLIENT_SECRET' => env('API_SWGOH_GG_CLIENT_SECRET'),
        ],
        'SWGOH_HELP' => [
            'USER' => env('API_SWGOH_HELP_USER'),
            'PASSWORD' => env('API_SWGOH_HELP_PASSWORD'),
            'SERVER' => env('API_SWGOH_HELP_SERVER', 'https://api.swgoh.help'),
            'AUTH_SERVER' => env('API_SWGOH_HELP_AUTH_SERVER', 'https://api.swgoh.help/auth/signin'),
            'CLIENT_ID' => env('API_SWGOH_HELP_CLIENT_ID'),
            'CLIENT_SECRET' => env('API_SWGOH_HELP_CLIENT_SECRET'),
        ],
    ],

    'SWGOH_GUILD_ID' => env('SWGOH_GUILD_ID'),
    'PLAYER_ALLYCODE' => env('PLAYER_ALLYCODE'),

];
