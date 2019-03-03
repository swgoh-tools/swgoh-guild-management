<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Jobs\SyncAllGuilds;

class SyncGuilds extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'swgoh:syncguilds';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sync all guilds with external apis.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        // To send output to the console, use the line, info, comment, question and error methods.

            $this->info('sync all data for all guilds');
            SyncAllGuilds::dispatch();
    }
}
