<?php

declare(strict_types=1);

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Helper\SyncCrawler;
use Illuminate\Console\Command;

class CrawlPlayers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature =
        'swgoh:crawl' .
        ' {allycode? : Player AllyCode. Leave blank to random unknown code.}' .
        ' {--repeat=1 : How many codes should be crawled.}' .
        ' {--sync-error-files : Read Codes from sync error files and add update their flag in crawler files.}' .
        ' {--check-codes : Calculate crawl status.}' .
        ' {--generate-codes : Fills Player table with possible codes. 1 Million!}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch new allycode from external apis.';

    /**
     * Default Queue for this Command.
     *
     * @var string
     */
    protected $queue = 'crawl';

    /**
     * Default storage disk.
     *
     * @var string
     */
    protected $data_disk = 'local';

    /**
     * Default storage disk.
     *
     * @var string
     */
    protected $data_dir = 'data/crawl/';
    protected $folder_auto = 'auto/';
    protected $folder_input = 'manual/queue/';
    protected $folder_pending = 'manual/pending/';
    protected $folder_done = 'manual/done/';
    // protected $folder_error = 'manual/error/';

    /**
     * Minimum used codes per run.
     *
     * Could be 1 but set to 2.
     * This way api responses are always only temporarily saved to
     * the multicode directory (see SyncClient) instead of creating a
     * permanent sync folder in case of single code syncs.
     *
     * @var int
     */
    protected $repeat_min = 2;

    /**
     * Maximum allowed codes per run.
     *
     * @var int
     */
    protected $repeat_max = 50;

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
        $crawler = new SyncCrawler($this);

        if ($this->option('generate-codes')) {
            $result = $crawler->generateCodeFiles();

            /*
             * make sure we don't do anything else
             *
             * it would work but code generation takes a long time
             * therefore the user really shouldn't run additional tasks with it
             */
            return ($result) ? 0 : 1;
        }
        if ($this->option('check-codes')) {
            $result = $crawler->checkCodeFiles();

            /*
             * make sure we don't do anything else
             *
             * it would work but code generation takes a long time
             * therefore the user really shouldn't run additional tasks with it
             */
            return ($result) ? 0 : 1;
        }
        if ($this->option('sync-error-files')) {
            $result = false;
            $this->info('command deactivated. Use with care.');
            // $result = $crawler->syncErrorFiles();
            // $result = $crawler->rereadPlayerJsons(1571312594);
            // $result = $crawler->rereadGuildJsons();

            return ($result) ? 0 : 1;
        }
        if ($this->argument('allycode')) {
            $this->info('add a specific allycode to the crawler queue.');
            if (is_numeric($this->argument('allycode'))) {
                $this->line('using code ' . $this->argument('allycode'));
                $crawler->addManualCode($this->argument('allycode'));
            } else {
                $this->error('kein numerischer code ' . $this->argument('allycode'));
                /*
                 * wrong input, back to the command line then
                 */
                return 1;
            }
        } else {
            $repeat = (is_numeric($this->option('repeat'))) ? $this->option('repeat') : 1;
            $repeat = min($this->repeat_max, $repeat);
            $repeat = max($this->repeat_min, $repeat);
            $this->info('crawl ' . $repeat . ' new allycodes at ' . Carbon::now()->toDateTimeString());
            $crawler->checkManualPending();
            $manual_code = $crawler->getManualCode();
            $rand_keys = $crawler->getRandomCodes($repeat, $manual_code);

            if ($rand_keys) {
                $crawler->crawlCodes($rand_keys);
            } else {
                $this->error('no input file found');
            }
        }
    }
}
