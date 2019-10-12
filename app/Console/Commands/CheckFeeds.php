<?php

namespace App\Console\Commands;

use App\Helper\FeedReader;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpKernel\Exception\HttpException;

class CheckFeeds extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature =
        'swgoh:feeds'.
        ' {feedname? : feed name.}'.
        ' {--dummy=1 : asdf.}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check news feeds for new entries.';

    /**
     * Default Queue for this Command.
     *
     * @var string
     */
    protected $queue = 'notify';

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
        $fr = new FeedReader($this);

        if ($this->argument('feedname')) {
            $this->line('check feed ' .  $this->argument('feedname'));
            $result = $fr->checkFeed($this->argument('feedname'));
            return $result ? 0 : 1;
        } else {
            $feed_keys = [
                "official-announcements",
                "official-game-updates",
                "official-unit-updates",
            ];
            $this->info('checking ' . implode(', ', $feed_keys));
            // $this->info('checking all feeds at once not allowed for now.');
            foreach ($feed_keys as $feedname) {
                $this->line('check feed ' .  $feedname);
                $result = $fr->checkFeed($feedname);
            }
        }
    }
}
