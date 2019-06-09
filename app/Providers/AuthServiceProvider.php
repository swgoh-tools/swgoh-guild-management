<?php

namespace App\Providers;

use App\Memo;
use App\Page;
use App\User;
use App\Guild;
use App\Reply;
use App\Thread;
use App\Sanction;
use App\Policies\MemoPolicy;
use App\Policies\PagePolicy;
use App\Policies\UserPolicy;
use App\Policies\GuildPolicy;
use App\Policies\ReplyPolicy;
use App\Policies\ThreadPolicy;
use App\Policies\SanctionPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Guild::class => GuildPolicy::class,
        Memo::class => MemoPolicy::class,
        Page::class => PagePolicy::class,
        Reply::class => ReplyPolicy::class,
        Thread::class => ThreadPolicy::class,
        User::class => UserPolicy::class,
        Sanction::class => SanctionPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
