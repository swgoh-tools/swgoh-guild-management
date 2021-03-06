<?php

namespace App\Jobs;

use App\Helper\SyncClient;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SyncDataKeys implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $language;

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
    public function __construct($language)
    {
        $this->language = $language;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(SyncClient $syncClient)
    {
        $syncClient->setLanguage($this->language);

        $syncClient->sync('help.events');
        $syncClient->sync('help.battles');

        $syncClient->sync('help.data.abilityList');
        $syncClient->sync('help.data.equipmentList');
        $syncClient->sync('help.data.materialList');
        $syncClient->sync('help.data.playerTitleList');
        $syncClient->sync('help.data.recipeList');
        $syncClient->sync('help.data.skillList');
        $syncClient->sync('help.data.unitsList');
    }
}
