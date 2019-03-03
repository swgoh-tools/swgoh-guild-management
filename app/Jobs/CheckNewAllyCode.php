<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Helper\SyncClient;
use App\User;

class CheckNewAllyCode implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $allyCode;
    protected $user;

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
    public function __construct(User $user, $allyCode)
    {
        $this->user = $user;
        $this->allyCode = $allyCode;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(SyncClient $syncClient)
    {
        // $player = Player::firstOrCreate(['code' => $code], ['name' => SyncClient::getPlayer($code)[0]['name'] ?? '']);
        // $playerInfo = SyncClient::getPlayer($this->allyCode, false);

        // if (!$playerInfo) {
        //     $syncClient->setPlayerCode($this->allyCode);
        //     $syncClient->sync('help.guild.units');

        //     $syncClient->sync('g-players');
        //     $syncClient->sync('g-roster');
        //     // $syncClient->sync('g-units');
        // }

        SyncDataPlayer::dispatch($this->allyCode)
        ->onQueue('default');

        CheckForNewGuild::dispatch($this->user, $this->allyCode)
        ->onQueue('default');
    }
}
