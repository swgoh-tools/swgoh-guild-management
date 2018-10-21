<?php

declare(strict_types=1);

namespace App\Providers;

use Session;
use App\Channel;
use App\Guild;
use App\Page;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Helper\SyncClient;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //compatibility with mysql < 10.2 / < 5.7
        Schema::defaultStringLength(191);

        \View::composer(['guild.squads', 'guild.roster', 'admin.sync'], function ($view): void {
            $sync_status = \Cache::get('sync_status', []);
            // $sync_status = \Cache::rememberForever('sync_status', function () {
            //     return SyncClient::getStatus();
            // });

            $view->with('sync_status', $sync_status);
        });
        \View::composer('*', function ($view): void {
            $channels = \Cache::rememberForever('channels', function () {
                return Channel::all();
            });

            $channels = Channel::all();
            $view->with('channels', $channels);
        });

        // \View::composer('*', function ($view) {
        //     $pages = Page::all();
        //     $view->with('pages', $pages);
        // });

        \View::composer('*', function ($view): void {
            // $viewdata= $view->getData(); // contains all data already added to view with \View::creator or \View::composer and everything from Controllers etc.
            $page_locale = app()->getLocale();
            $page_title = config('app.name');
            $page_guild = '';
            $pages = [];

            if (Session::has('guild')) {
                $guild = Session::get('guild');
            } elseif (Session::has('guild_slug')) {
                $guild = Guild::where('slug', '=', Session::get('guild_slug'))->first();
            } else {
                $guild = Guild::find(config('swgoh.GUILD_DEFAULT_ID'));
            }

            if ($guild) {
                $page_guild = $guild->name;
                $page_title .= ' - '.$guild->name;
                $pages = $guild->pages()->orderBy('position', 'asc')->get();
            } else {
                $guild = new Guild();
                $guild->name = 'Dummy';
                $guild->slug = 'dummy';
            }

            $view->with(compact(['page_guild', 'page_locale', 'page_title', 'guild', 'pages']));
        });

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
