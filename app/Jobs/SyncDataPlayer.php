<?php

namespace App\Jobs;

use App\Helper\SyncClient;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SyncDataPlayer implements ShouldQueue
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
    public function __construct($allyCode)
    {
        $this->allyCode = $allyCode;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(SyncClient $syncClient)
    {
        $syncClient->setPlayerCode($this->allyCode);

        $syncClient->sync('help.guild.units');

        $syncClient->sync('g-players');
        // $syncClient->sync('g-roster');
        // $syncClient->sync('g-units');
    }
}
