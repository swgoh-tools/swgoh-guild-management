<?php

namespace App\Providers;

use App\Channel;
use App\Guild;
use App\Page;
use Illuminate\Routing\Route;
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

        \View::composer(['guild.squads', 'guild.roster', 'admin.sync'], function ($view) {
            $sync_status = \Cache::get('sync_status', []);
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
        
        // \View::composer('*', function ($view) {
        //     $pages = Page::all();
        //     $view->with('pages', $pages);
        // });

        \View::composer('*', function ($view) {
            // $viewdata= $view->getData(); // contains all data already added to view with \View::creator or \View::composer and everything from Controllers etc.
            if (! request()->route()) {
                //e.g. page not found
                // $params = '';
                return; // without a route there won't be a view anyways
            } else {
                $params = request()->route()->parameters();
            }
            // dd($params);
            $page_locale = app()->getLocale();
            $page_title = config('app.name');
            $page_guild = '';

            if (isset($params['guild']) && $params['guild'] instanceof Guild ) {
                $guild = $params['guild'];
            } else {
                $guild = Guild::find(config('swgoh.GUILD_DEFAULT_ID'));
            }

            if ($guild) {
                $page_guild = $guild->name;
                $page_title .= ' - ' . $guild->name;
                $pages = $guild->pages()->orderBy('position', 'asc')->get();
            } else {
                $guild = new Guild;
                $guild->name = 'Dummy';
                $guild->slug = 'dummy';
                $pages = [];
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
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
