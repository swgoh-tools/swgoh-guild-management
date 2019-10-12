<?php

namespace App\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use App\Events\OfficialAnnouncementAdded;
use App\Notifications\OfficialAnnouncement;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Notification;

class NotifyAboutNewAnnouncement
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  OfficialAnnouncementAdded  $event
     * @return void
     */
    public function handle(OfficialAnnouncementAdded $event)
    {
        Notification::send(null, new OfficialAnnouncement($event->message));
    }
}
