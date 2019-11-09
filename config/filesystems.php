<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default filesystem disk that should be used
    | by the framework. The "local" disk, as well as a variety of cloud
    | based disks are available to your application. Just store away!
    |
    */

    'default' => env('FILESYSTEM_DRIVER', 'local'),

    /*
    |--------------------------------------------------------------------------
    | Default Cloud Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | Many applications store files both locally and in the cloud. For this
    | reason, you may specify a default "cloud" driver here. This driver
    | will be bound as the Cloud disk implementation in the container.
    |
    */

    'cloud' => env('FILESYSTEM_CLOUD', 's3'),

    /*
    |--------------------------------------------------------------------------
    | Filesystem Disks
    |--------------------------------------------------------------------------
    |
    | Here you may configure as many filesystem "disks" as you wish, and you
    | may even configure multiple disks of the same driver. Defaults have
    | been setup for each driver as an example of the required options.
    |
    | Supported Drivers: "local", "ftp", "sftp", "s3", "rackspace"
    |
    */

    'disks' => [

        'local' => [
            'driver' => 'local',
            'root' => storage_path('app'),
        ],

        'config' => [
            'driver' => 'local',
            'root' => storage_path('app/config'),
        ],

        'public' => [
            'driver' => 'local',
            'root' => storage_path('app/public'),
            'url' => env('APP_URL').'/storage',
            'visibility' => 'public',
        ],

        'avatars' => [
            'driver' => 'local',
            'root' => storage_path('app/avatars'),
            'url' => env('APP_URL').'/f/a',
            'visibility' => 'public',
        ],

        'sync2' => [
            'driver' => 'local',
            'root' => 'S:\\sync',
        ],

        'sync2-archive' => [
            'driver' => 'local',
            'root' => 'S:\\sync-archive',
        ],

        'sync' => [
            'driver' => 'local',
            'root' => storage_path('app/sync'),
            'url' => env('APP_URL').'/f/d',
            'visibility' => 'public',
        ],

        'sync-archive' => [
            'driver' => 'local',
            'root' => storage_path('app/sync-archive'),
        ],

        'pages' => [
            'driver' => 'local',
            'root' => storage_path('app/public/p'),
            'url' => env('APP_URL').'/storage/p',
            'visibility' => 'public',
        ],

        'threads' => [
            'driver' => 'local',
            'root' => storage_path('app/public/t'),
            'url' => env('APP_URL').'/storage/t',
            'visibility' => 'public',
        ],

        's3' => [
            'driver' => 's3',
            'key' => env('AWS_ACCESS_KEY_ID'),
            'secret' => env('AWS_SECRET_ACCESS_KEY'),
            'region' => env('AWS_DEFAULT_REGION'),
            'bucket' => env('AWS_BUCKET'),
            'url' => env('AWS_URL'),
        ],

    ],

];
