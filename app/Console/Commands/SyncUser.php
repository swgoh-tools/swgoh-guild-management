<?php

namespace App\Console\Commands;

use App\User;
use App\Jobs\SyncDataKeys;
use App\Jobs\SyncDataGlobal;
use App\Jobs\SyncDataPlayer;
use App\Jobs\CheckNewAllyCode;
use Illuminate\Console\Command;

class SyncUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'swgoh:syncuser {userid : User ID. Needed to link guild and get allycode}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sync data associated with user allycode.';

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

        if ($this->argument('userid')) {
            $this->info('sync all data for a specific user');
            if (is_numeric($this->argument('userid'))) {
                $target_user = User::find($this->argument('userid'));
                $this->info($target_user->name ?? null);
                $target_code = $target_user->code ?? null;
                if ($target_code) {
                    $this->line('using code ' .  $target_code);
                    CheckNewAllyCode::dispatch($target_user, $target_code);
                } else {
                    $this->error('user or allycode not found');
                }
            } else {
                $this->error('keine numerische id ' .  $this->argument('userid'));
            }
        } else {
            $this->error('parameter missing');
        }
    }
}
