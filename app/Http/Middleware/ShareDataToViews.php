<?php

namespace App\Http\Middleware;

use Closure;
use App\Guild;
use App\Channel;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Session;

class ShareDataToViews
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // $page_title = config('app.name');
        $page_guild_name = '';
        $pages = [];

        if (Session::has('guild')) {
            $guild = Session::get('guild');
        } elseif (Session::has('guild_slug')) {
            $guild = Guild::where('slug', '=', Session::get('guild_slug'))->first();
        } else {
            $guild = Guild::find(config('swgoh.GUILD_DEFAULT_ID'));
        }

        if ($guild) {
            $page_guild_name = $guild->name;
            // $page_title .= ' - '.$guild->name;
            $pages = $guild->pages()->orderBy('position', 'asc')->get();
        } else {
            $guild = new Guild();
            $guild->name = 'Dummy';
            $guild->slug = 'dummy';
        }

        View::share('page_guild_name', $page_guild_name);
        View::share('channels', Channel::all());
        View::share('page_locale', app()->getLocale());
        // View::share('page_title', $page_title);
        View::share('page_guild', $guild);
        View::share('pages', $pages);

        // Anything above this line will perform its task BEFORE the request is handled by the application
        $response = $next($request);
        // Anything below this line will perform its task AFTER the request is handled by the application

        return $response; // don't return anything else
    }
}
