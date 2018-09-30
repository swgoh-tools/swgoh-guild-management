<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
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
        \View::composer(['guild.squads', 'guild.rooster'], function ($view) {
            $sync_status = [];
            $sync_status = \Cache::rememberForever('sync_status', function () {
                return SyncClient::getStatus();
            });
            
            $view->with('sync_status', $sync_status);
        });
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
