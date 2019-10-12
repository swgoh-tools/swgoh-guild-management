<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use Closure;
use Session;

class CheckForLanguage
{
    /**
     * The availables languages.
     *
     * @array $languages
     */
    protected $languages = [];

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
        $this->languages = array_keys(config('app.locales', []));

        if ($request->has('lang')) {
            $lang = $request->input('lang');
            if (in_array($lang, $this->languages)) {
                Session::put('locale', $lang);
            }
            unset($request['lang']);
            $request->offsetUnset('lang'); // laravel specific
            /**
             * The unset works. (both versions)
             *
             * Unfortunately, the query string 'lang' will STILL be appended to the RESPONSE.
             *
             * Redirecting back withInput excluding 'lang' doesn't work either:
             * // return redirect()->back()->withInput($request->except('lang'));
             * Since the query parameter is still there, this will create an infinite redirect LOOP!
             *
             *
             */
            // The hard way: Redirect with plain url
            // i.e.: throw away ANY input fields and query params!
            return redirect(url()->current());
        }
        if (!Session::has('locale')) {
            Session::put('locale', $request->getPreferredLanguage($this->languages));
        }

        app()->setLocale(Session::get('locale'));

        return $next($request);
    }
}
