<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use App\Events\OfficialGameUpdateAdded;
use App\Events\OfficialUnitUpdateAdded;
use App\Events\OfficialAnnouncementAdded;
use App\Listeners\NotifyAboutNewGameUpdate;
use App\Listeners\NotifyAboutNewUnitUpdate;
use App\Listeners\NotifyAboutNewAnnouncement;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        OfficialAnnouncementAdded::class => [
            NotifyAboutNewAnnouncement::class,
        ],
        OfficialGameUpdateAdded::class => [
            NotifyAboutNewGameUpdate::class,
        ],
        OfficialUnitUpdateAdded::class => [
            NotifyAboutNewUnitUpdate::class,
        ],
        'App\Events\ThreadReceivedNewReply' => [
            'App\Listeners\NotifyMentionedUsers',
            'App\Listeners\NotifySubscribers'
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
