<?php

declare(strict_types=1);

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Helper\SyncClient;
use App\User;
use App\Guild;

class CheckForNewGuild implements ShouldQueue
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
     */
    public function __construct(User $user, $allyCode)
    {
        $this->user = $user;
        $this->allyCode = $allyCode;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $playerInfo = SyncClient::getPlayer($this->allyCode, false);

        if (($playerInfo['guildName'] ?? null) && ($playerInfo['guildRefId'] ?? null)) {
            $existing_guild = Guild::where('refId', $playerInfo['guildRefId'])->first();

            if (!$existing_guild) {
                $new_guild = Guild::create([
                    'user_id' => $this->user->id,
                    'name' => $playerInfo['guildName'],
                    'refId' => $playerInfo['guildRefId'],
                ]);
            }
        }

    }
}
