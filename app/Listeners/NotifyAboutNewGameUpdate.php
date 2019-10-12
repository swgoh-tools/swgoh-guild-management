<?php

namespace App\Listeners;

use App\Events\OfficialGameUpdateAdded;
use Illuminate\Queue\InteractsWithQueue;
use App\Notifications\OfficialGameUpdate;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Notification;

class NotifyAboutNewGameUpdate
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
     * @param  OfficialGameUpdateAdded  $event
     * @return void
     */
    public function handle(OfficialGameUpdateAdded $event)
    {
        Notification::send(null, new OfficialGameUpdate($event->message));
    }
}
