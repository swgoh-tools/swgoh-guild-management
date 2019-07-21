<?php

declare(strict_types=1);

namespace App\Providers;

use Session;
use App\Page;
use App\Guild;
use App\Channel;
use App\Helper\SyncClient;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //compatibility with mysql < 10.2 / < 5.7
        Schema::defaultStringLength(191);

        require app_path('Helper'.DIRECTORY_SEPARATOR.'global.php');

        \View::composer(['guild.squads', 'guild.roster', 'admin.sync'], function ($view): void {
            $sync_status = \Cache::get('sync_status', []);
            // $sync_status = \Cache::rememberForever('sync_status', function () {
            //     return SyncClient::getStatus();
            // });

            $view->with('sync_status', $sync_status);
        });

        /**
         * Careful with wildcard view composer callbacks. Those are called on EVERY included view.
         * That means: If a partial template is included 1000 times on a page (like for rendering buttons, forms or table fields)
         * the wildcard callback is executed 1000 times!
         *
         * Seems \View::composer('*', function ($view): void {}) should NEVER be used as long as @include() is used in views
         * - which is most likely always the case.
         *
         * Better: create a middleware, controller, service provider and use \View::share();
         *
         * Careful: Mind the timing. view composer callbacks would be triggered while views are rendered (i.e. response creation).
         * The better alternatives are set while processing the request.
         *
         * Warning: Querying models within AppServiceprovider->boot() will cause issues if you are trying to
         * create a fresh application with an empty database. Additionally, session data are not yet available.
         * Use a Middleware and add it to the appropriate groups via Kernel.php
         */
        // \View::composer('*', function ($view): void {
        //     $channels = \Cache::rememberForever('channels', function () {
        //         return Channel::all();
        //     });

        //     $channels = Channel::all();
        //     $view->with('channels', $channels);
        // });
        // \View::composer('*', function ($view) {
        //     $pages = Page::all();
        //     $view->with('pages', $pages);
        // });

        // \View::composer('*', function ($view): void {
        //     // $viewdata= $view->getData(); // contains all data already added to view with \View::creator or \View::composer and everything from Controllers etc.
        //     $page_locale = app()->getLocale();
        //     $page_title = config('app.name');
        //     $page_guild_name = '';
        //     $pages = [];

        //     if (Session::has('guild')) {
        //         $guild = Session::get('guild');
        //     } elseif (Session::has('guild_slug')) {
        //         $guild = Guild::where('slug', '=', Session::get('guild_slug'))->first();
        //     } else {
        //         $guild = Guild::find(config('swgoh.GUILD_DEFAULT_ID'));
        //     }

        //     if ($guild) {
        //         $page_guild_name = $guild->name;
        //         $page_title .= ' - '.$guild->name;
        //         $pages = $guild->pages()->orderBy('position', 'asc')->get();
        //     } else {
        //         $guild = new Guild();
        //         $guild->name = 'Dummy';
        //         $guild->slug = 'dummy';
        //     }

        //     $view->with(compact(['page_guild_name', 'page_locale', 'page_title', 'guild', 'pages']));
        // });


        // \View::composer('*', function ($view) {
        //     $guild = Guild::find(1);
        //     if ($guild == null) {
        //         $guild = new Guild;
        //         $guild->name = 'Dummy';
        //     }
        //     $view->with('guild', $guild);
        // });

        \Validator::extend('spamfree', 'App\Rules\SpamFree@passes');
    }

    /**
     * Register any application services.
     */
    public function register(): void
    {
    }
}
