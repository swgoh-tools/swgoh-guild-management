<?php

namespace App\Console\Commands;

use App\Helper\Log;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class Archive extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature =
        'swgoh:archive'.
        ' {--stats=0 : create player history}'.
        ' {--guilds : archive guild sync data}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Move data to archive.';

    /**
     * Default Queue for this Command.
     *
     * @var string
     */
    protected $queue = 'archive';
    protected $logger = null;

    /**
     * Default storage disk.
     *
     * @var string
     */
    protected $data_disk = 'sync2';
    protected $archive_disk = 'sync2-archive';

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
        $this->logger = new Log($this);
        // To send output to the console, use the line, info, comment, question and error methods.

        if ($this->option('guilds')) {
            $result = $this->archiveGuildFiles();

            /**
             * make sure we don't do anything else
             *
             * it would work but code generation takes a long time
             * therefore the user really shouldn't run additional tasks with it
             */
            return ($result) ? 0 : 1;
        }
        if ($this->option('stats')) {
            $guild_id = $this->option('stats');

            $result = $this->createHistory($guild_id);

            /**
             * make sure we don't do anything else
             *
             * it would work but code generation takes a long time
             * therefore the user really shouldn't run additional tasks with it
             */
            return ($result) ? 0 : 1;
        }
    }

    protected function archiveGuildFiles($earliest_time = 0)
    {
        $files = Storage::disk($this->data_disk)->allFiles('swgoh.help/guild');
        if ($files) {
            foreach ($files as $file) {
                if (!preg_match('/(?:players|roster)\.(\d{10})\.json/', $file, $matches)) {
                    // $this->logger->log('info', "skip file: " . $file);
                    continue;
                }
                if ($matches[1] < $earliest_time) {
                    continue;
                }
                if (Storage::disk($this->data_disk)->exists($file)) {
                    $this->logger->log('info', "move file: " . $file);
                    // convert to full pathss
                    $source_file = Storage::disk($this->data_disk)->getDriver()->getAdapter()->applyPathPrefix($file);
                    $archive_file = Storage::disk($this->archive_disk)->getDriver()->getAdapter()->applyPathPrefix($file);

                    if (Storage::disk($this->archive_disk)->exists($file)) {
                        $this->logger->log('error', "file already exists in archive: " . $file);
                        $stats_archive = [
                            'time' => Storage::disk($this->archive_disk)->lastModified($file),
                            'size' => Storage::disk($this->archive_disk)->size($file),
                            'hash' => md5_file(config("filesystems.disks.$this->archive_disk.root") . '/' . $file),
                        ];
                        $stats_source = [
                            'time' => Storage::disk($this->data_disk)->lastModified($file),
                            'size' => Storage::disk($this->data_disk)->size($file),
                            'hash' => md5_file(config("filesystems.disks.$this->data_disk.root") . '/' . $file),
                        ];
                        $this->logger->log(
                            'comment',
                            "old: "
                            . $stats_archive['time']
                            . ' | '
                            . $stats_archive['size']
                            . ' | '
                            . $stats_archive['hash']
                        );
                        $this->logger->log(
                            'comment',
                            "new: "
                            . $stats_source['time']
                            . ' | '
                            . $stats_source['size']
                            . ' | '
                            . $stats_source['hash']
                        );
                        if ($stats_archive['time'] == $stats_source['time'] && $stats_archive['size'] == $stats_source['size'] && $stats_archive['hash'] == $stats_source['hash']) {
                            $this->logger->log('info', "files equal, delete source: " . $source_file);
                            Storage::disk($this->data_disk)->delete($file);
                        }
                    } else {
                        // make destination folder
                        if (!File::exists(dirname($archive_file))) {
                            // makeDirectory(string $path, int $mode = 0755, bool $recursive = false, bool $force = false)
                            File::makeDirectory(dirname($archive_file), 0755, true);
                        }
                        // Storage::disk($this->archive_disk)->makeDirectory($directory);

                        File::move($source_file, $archive_file);
                        // $file_to_move = Storage::disk($this->data_disk)->get($file);
                        // $archive_file = Storage::disk($this->archive_disk)->move($file_to_move, $file);
                        // $archive_file = Storage::disk($this->archive_disk)->move(config("filesystems.disks.$this->data_disk.root") . '/' . $file, $file);
                        // dd('test');
                        // $this->logger->log('info', "moved file to archive: " . $archive_file);
                    }
                }
            }
        }
    }

    protected function createHistory($guild_id, $earliest_time = 0)
    {
        $dir ='swgoh.help/guild/' . $guild_id;
        $file_time = 0;
        $history = [];
        $history_csv = [];
        $history_compact = [];
        $history_types = [];
        $history_names = [];

        if (!$guild_id || !Storage::disk($this->archive_disk)->exists($dir)) {
            $this->logger->log('info', "no guild data: " . $dir);
            return false;
        }

        $files = Storage::disk($this->archive_disk)->files($dir);
        if ($files) {
            ini_set('memory_limit', '512M'); // 256 not enough
            // Storage::disk($this->archive_disk)->put("history/$guild_id.csv", '');

            foreach ($files as $file) {
                if (!preg_match('/players\.(\d{10})\.json/', $file, $matches)) {
                    // $this->logger->log('info', "skip file: " . $file);
                    continue;
                }
                $file_time = $matches[1];
                if ($file_time < $earliest_time) {
                    continue;
                }

                if (Storage::disk($this->archive_disk)->exists($file)) {
                    $this->logger->log('info', "read: " . $file);
                    $data = Storage::disk($this->archive_disk)->get($file);
                    $data = \json_decode($data, true);
                    foreach ($data as $player) {
                        $player_id = $player['allyCode'];
                        $history_names[$player_id] = $player['name'];
                        continue;
                        foreach ($player['roster'] as $unit) {
                            $unit_id = $unit['defId'];
                            $unit_type = 0; // 0 = Char, 1 = Ship
                            // Crewless ships like Vulture Droid have "crew":null !
                            // Chars have "crew":[]
                            if ($unit['crew'] === null) {
                                $unit_type = 1;
                            } elseif (count($unit['crew']) > 0) {
                                $unit_type = 1;
                            }
                            $history_types[$unit_id] = max($unit_type, ($history_types[$unit_id] ?? 0));
                            $history[$player_id][$unit_id]['min'] = min($unit['gp'], ($history[$player_id][$unit_id]['min'] ?? $unit['gp']));
                            $history[$player_id][$unit_id]['min_time'] = min($file_time, ($history[$player_id][$unit_id]['min_time'] ?? $file_time));
                            $history[$player_id][$unit_id]['max'] = max($unit['gp'], ($history[$player_id][$unit_id]['max'] ?? $unit['gp']));
                            $history[$player_id][$unit_id]['max_time'] = max($file_time, ($history[$player_id][$unit_id]['max_time'] ?? $file_time));
                            // $history[$player_id][$unit_id][$file_time] = $unit['gp'];
                            // $history_csv[] = "$player_id;$unit_id;$unit_type;$file_time;" . $unit['gp'];
                        }
                    }
                    // Storage::disk($this->archive_disk)->append("history/$guild_id.csv", \implode("\r\n", $history_csv));
                    // $history_csv = [];
                }
            }
            $history_csv = [];
            foreach ($history as $player_id => $player) {
                foreach ($player as $unit_id => $unit) {
                    $history_csv[] = implode(";", [$player_id, $unit_id, $history_types[$unit_id], $unit['min_time'], $unit['min']]);
                    $history_csv[] = implode(";", [$player_id, $unit_id, $history_types[$unit_id], $unit['max_time'], $unit['max']]);
                }
            }
            // Storage::disk($this->archive_disk)->put("history/$guild_id.compact.csv", \implode("\r\n", $history_csv));

            Storage::disk($this->archive_disk)->put("history/$guild_id.names.json", \json_encode($history_names));
            // Storage::disk($this->archive_disk)->put("history/$guild_id.$file_time.json", \json_encode($history));
        }
    }
}
