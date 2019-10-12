<?php

namespace App\Helper;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Cache;
use App\Events\OfficialGameUpdateAdded;
use App\Events\OfficialUnitUpdateAdded;
use Illuminate\Support\Facades\Storage;
use App\Events\OfficialAnnouncementAdded;
use willvincent\Feeds\Facades\FeedsFacade as Feeds;

class FeedReader
{
    /**
     * Default storage disk.
     *
     * @var string
     */
    protected $data_disk = 'local';

    /**
     * Optional command line reference for messages.
     *
     * @var string
     */
    protected $cmd = null;

    /**
     * Notes for processed codes that will be written back to code files.
     *
     * @var string
     */
    protected $flags = [];


    public function __construct(Command $cmd = null)
    {
        $this->cmd = $cmd;
    }

    private function log(string $type, string $message)
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



    public function checkFeed($type)
    {
        $data = $this->getFeedData($type);

        if ($data) {
            $i = 0;
            $i_max = 5;
            $old_date = $this->getLastKnownDate($type);
            $new_date = 0;
            foreach ($data['items'] as $item) {
                $i++;

                if ($item->get_date('U') <= $old_date) {
                    $this->log('comment', "Hit old entry, look no further");
                    break;
                }

                if ($i>$i_max) {
                    $this->log('info', "more than $i_max new entries. Skipping the rest.");
                    break;
                }
                $new_date = max($new_date, $item->get_date('U'));

                switch ($type) {
                    case 'official-announcements':
                        event(new OfficialAnnouncementAdded($item));
                        break;

                        case 'official-game-updates':
                        event(new OfficialGameUpdateAdded($item));
                        break;

                        case 'official-unit-updates':
                        event(new OfficialUnitUpdateAdded($item));
                        break;

                    default:
                        $this->log('info', "no event defined for feed $type");
                        break;
                }
            }
            if ($new_date > $old_date) {
                $this->log('info', "saved new comparison date (old: $old_date, new: $new_date).");
                $this->setLastKnownDate($type, $new_date);
            }
        } else {
            $this->log('error', "no feed data found for $type.");
        }
    }

    protected function getFeed($type)
    {
        $url = '';
        switch ($type) {
            case 'official-announcements':
                $url = 'https://forums.galaxy-of-heroes.starwars.ea.com/categories/news-and-announcements-/feed.rss';
                break;

            case 'official-game-updates':
                $url = 'https://forums.galaxy-of-heroes.starwars.ea.com/categories/game-updates/feed.rss';
                break;

            case 'official-unit-updates':
                $url = 'https://forums.galaxy-of-heroes.starwars.ea.com/categories/characters-and-strategy/feed.rss';
                break;

            default:
                $url = '';
                break;
        }

        if (!$url) {
            return;
        }

        $feed = Feeds::make($url);

        return $feed;


        // // make id
        // $id = md5($item->get_id());


        // // if item is already in db, skip it
        // if(isset($savedItems[$id]))
        // {
        //         continue;
        // }

        // // found new item, add it to db
        // $i = array();
        // $i['title'] = $item->get_title();
        // $i['link'] = $item->get_link();
        // $i['author'] = '';
        // $author = $item->get_author();
        // if($author)
        // {
        //         $i['author'] = $author->get_name();
        // }
        // $i['date'] = $item->get_date('U');
        // $i['content'] = $item->get_content();
        // $feed = $item->get_feed();
        // $i['feed_link'] = $feed->get_permalink();
        // $i['feed_title'] = $feed->get_title();

        // $savedItems[$id] = $i;
    }

    public function getFeedData(string $type)
    {
        $feed = $this->getFeed($type);

        $data = [
            'title'     => $feed->get_title() ?? 'ERROR',
            'permalink' => $feed->get_permalink() ?? '',
            'items'     => $feed->get_items() ?? [],
        ];

        if ('official-unit-updates' == $type) {
            foreach ($data['items'] as $key => $item) {
                $name = $item->get_author()->get_name() ?? '';
                if (strpos($name, 'CG_') === false) {
                    unset($data['items'][$key]);
                }
            }
        }

        return $data;
    }
    /**
     * Get last feed comparison timestamp.
     *
     * @return  integer
     */
    public function getLastKnownDate(string $type)
    {
        $file = "feed.$type.ts";
        if (Storage::disk('config')->exists($file)) {
            return (int)Storage::disk('config')->get($file);
        }
        return 0;
    }

    /**
     * Set last feed comparison timestamp.
     *
     * @param  integer  $timestamp  last feed comparison timestamp.
     *
     * @return  self
     */
    public function setLastKnownDate(string $type, $timestamp)
    {
        $file = "feed.$type.ts";
        Storage::disk('config')->put($file, $timestamp);

        return $this;
    }
}
