<?php

namespace App\Helper;

use App\Guild;
use App\Player;
use App\Helper\SyncClient;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

class Log
{
    /**
     * Optional command line reference for messages.
     *
     * @var string
     */
    protected $cmd = null;

    public function __construct(Command $cmd = null)
    {
        $this->cmd = $cmd;
    }


    public function log(string $type, string $message)
    {
        if ($this->cmd) {
            switch ($type) {
                case 'comment':
                $this->cmd->comment($message);
                    break;
                    case 'info':
                    $this->cmd->info($message);
                        break;

                    case 'error':
                    $this->cmd->error($message);
                        break;
                        case 'success':
                        $this->cmd->success($message);
                            break;

                    default:
                $this->cmd->line($message);
                    break;
            }
        }
    }
}
