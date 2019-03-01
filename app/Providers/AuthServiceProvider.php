<?php

namespace App\Providers;

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
        'App\Guild' => 'App\Policies\GuildPolicy',
        'App\Memo' => 'App\Policies\MemoPolicy',
        'App\Page' => 'App\Policies\PagePolicy',
        'App\Reply' => 'App\Policies\ReplyPolicy',
        'App\Thread' => 'App\Policies\ThreadPolicy',
        'App\User' => 'App\Policies\UserPolicy',
        'App\Sanction' => 'App\Policies\SanctionPolicy',
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
