<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use Closure;
use App\Guild;

class CheckForGuild
{
    /**
     * The availables languages.
     *
     * @array $languages
     */
    protected $languages = ['en', 'de'];

    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // // not needed. if we are here, there definitely is a route!
        // if (! $request->route()) {
        //     //e.g. page not found
        //     return $next($request);
        // }

        // no typehinting happened yet
        // params on route are plain, no instanceof Guild
        $guild = $request->route('guild');

        if ($guild) {
            if ($guild instanceof Guild) {
                $request->session()->put('guild', $guild);
                $request->session()->put('guild_slug', $guild->slug);
            } else {
                $request->session()->put('guild', Guild::where('slug', '=', $guild)->first());
                $request->session()->put('guild_slug', $guild);
            }
        }

        return $next($request);
    }
}
