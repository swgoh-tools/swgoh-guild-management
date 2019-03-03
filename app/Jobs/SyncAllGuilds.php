<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Guild;

class SyncAllGuilds implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $allyCode;

    /**
     * The number of times the job may be attempted.
     *
     * @var int
     */
    public $tries = 3;

    /**
     * The number of seconds the job can run before timing out.
     *
     * @var int
     */
    // public $timeout = 120;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $guilds = Guild::all();

        foreach ($guilds as $current_guild) {
            if (!$current_guild->user || !$current_guild->user->code) {
                continue;
            }

            SyncDataPlayer::dispatch($current_guild->user->code)
            ->onQueue('default');

            CheckForNewGuild::dispatch($current_guild->user, $current_guild->user->code)
            ->onQueue('default');
        }
    }
}
