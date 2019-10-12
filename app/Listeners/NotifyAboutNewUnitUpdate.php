<?php

namespace App\Listeners;

use App\Events\OfficialUnitUpdateAdded;
use Illuminate\Queue\InteractsWithQueue;
use App\Notifications\OfficialUnitUpdate;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Notification;

class NotifyAboutNewUnitUpdate
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
     * @param  OfficialUnitUpdateAdded  $event
     * @return void
     */
    public function handle(OfficialUnitUpdateAdded $event)
    {
        Notification::send(null, new OfficialUnitUpdate($event->message));
    }
}
