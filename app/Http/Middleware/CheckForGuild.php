<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use Closure;
use App\Guild;
use App\Helper\SyncClient;
use Illuminate\Support\Facades\View;

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
        $player = $request->route('player');
        $logo = '';
        $name = '';

        // if it is not a guild page, we might get the guild from a player page instead
        if (!$guild && $player) {
            $info = SyncClient::getPlayer($player);
            $guild_ref = $info[0]['guildRefId'] ?? null;
            $logo = $info[0]['guildBannerLogo'] ?? null;
            $name = $info[0]['name'] ?? null;
            if ($guild_ref) {
                $guild = Guild::where('refId', '=', $guild_ref)->first();
            }
        }

        if ($guild) {
            if ($guild instanceof Guild) {
                $request->session()->put('guild', $guild);
                $request->session()->put('guild_slug', $guild->slug);
            } else {
                $request->session()->put('guild', Guild::where('slug', '=', $guild)->first());
                $request->session()->put('guild_slug', $guild);
            }

            $guild = $request->session()->get('guild');
            if ($name) {
                View::share('page_title', __('pages.player.title', ['name' => $name]));
                View::share('page_description', implode(' ', [
                    __('pages.player.intro', ['name' => $name]),
                    __('pages.player.description', ['name' => $name])
                ]));
            } else {
                $name = $guild->name ?? '';
                View::share('page_title', __('pages.guild.title', ['name' => $name]));
                View::share('page_description', implode(' ', [
                    __('pages.guild.intro', ['name' => $name]),
                    __('pages.guild.description', ['name' => $name])
                ]));
            }

            if (!$logo) {
                $info = SyncClient::getGuildInfo($guild);
                $logo = $info[0]['bannerLogo'] ?? 'default';
            }

            View::share('page_image', "//swgoh.gg/static/img/assets/tex.$logo.png");
        }

        return $next($request);
    }
}
