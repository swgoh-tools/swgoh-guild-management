<?php

namespace App\Console\Commands;

use App\Jobs\SyncDataKeys;
use App\Jobs\SyncDataGlobal;
use App\Jobs\SyncDataPlayer;
use Illuminate\Console\Command;

class Sync extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'swgoh:sync {allycode? : Player AllyCode. Leave blank to sync global data}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sync cached guild and player data with external apis.';

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

        if ($this->argument('allycode')) {
            $this->info('sync all data for a specific player and it\'s guild');
            if (is_numeric($this->argument('allycode'))) {
                $this->line('using code ' .  $this->argument('allycode'));
                SyncDataPlayer::dispatch((int) $this->argument('allycode'))->onQueue('default');
            } else {
                $this->error('kein numerischer code ' .  $this->argument('allycode'));
            }
        } else {
            $this->info('sync all data that is global (player/guild independent)');
            SyncDataGlobal::dispatch('en')->onQueue('low');

            $this->info('getting localization info from config');
            // get locales that are actually used by GUI from config
            $locales = config('app.locales', []);
            // make sure English data is always synced
            $locales['en'] = 'en';
            $this->info('found: ' . implode(', ', $locales));

            foreach ($locales as $locale_key => $locale) {
                $this->info('adding job for ' . $locale_key . ' (' . $locale . ')');
                SyncDataKeys::dispatch($locale_key)->onQueue('low');
            }
            // SyncDataKeys::dispatch('en');
            // SyncDataKeys::dispatch('pt-BR');
            // SyncDataKeys::dispatch('de');
            // SyncDataKeys::dispatch('it');
        }
    }
}
