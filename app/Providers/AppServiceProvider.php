<?php

namespace App\Providers;

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
     *
     * @return void
     */
    public function boot()
    {
        //compatibility with mysql < 10.2 / < 5.7
        Schema::defaultStringLength(191);

        \View::composer(['guild.squads', 'guild.rooster'], function ($view) {
            $sync_status = \Cache::get('sync_status', []);;
            // $sync_status = \Cache::rememberForever('sync_status', function () {
            //     return SyncClient::getStatus();
            // });
            
            $view->with('sync_status', $sync_status);
        });
        \View::composer('*', function ($view) {
            $channels = \Cache::rememberForever('channels', function () {
                return Channel::all();
            });
            
            $channels = Channel::all();
            $view->with('channels', $channels);
        });

        \View::composer('*', function ($view) {
            $pages = Page::all();
            $view->with('pages', $pages);
        });

        \View::composer('*', function ($view) {
            $guild = Guild::find(1);
            if ($guild == null) {
                $guild = new Guild;
                $guild->name = 'Dummy';
            }
            $view->with('guild', $guild);
        });

        \Validator::extend('spamfree', 'App\Rules\SpamFree@passes');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
