<?php

namespace App\Http\Middleware;

use Closure, Session;

class CheckForLanguage
{

    /**
     * The availables languages.
     *
     * @array $languages
     */
    protected $languages = ['en','de'];

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(!Session::has('locale'))
        {
            Session::put('locale', $request->getPreferredLanguage($this->languages));
        }

        app()->setLocale(Session::get('locale'));

        return $next($request);
    }
}
