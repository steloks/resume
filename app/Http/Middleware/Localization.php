<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;

;

class Localization
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @param                          ...$locales
     *
     * @return \Illuminate\Http\RedirectResponse|mixed
     */
    public function handle(Request $request, Closure $next, ...$locales)
    {
        $locale = session('locale');
        //case 1 have $locale
        if ($locale && in_array($locale, $locales)) {
            $locale = $this->checkSessionLocale($locale);
        }

        //case 2 have $locale, but not in $locales
        if ($locale && !in_array($locale, $locales)) {
            $locale = $this->checkSessionLocale();
            $params = $request->route()->parameters();
            $params['lang'] = $locale;

            return \redirect()->route(Route::currentRouteName());
        }

        // case 3 empty $locale
        if (!$locale) {
            $locale = $this->checkSessionLocale();

            return \redirect()->route(Route::currentRouteName());
        }

        App::setLocale($locale);

        return $next($request);
    }

    /**
     * @param null $locale
     * @return \Illuminate\Session\SessionManager|\Illuminate\Session\Store|mixed|null
     */
    public function checkSessionLocale($locale = null)
    {
        if (session('locale')) {
            if ($locale) {
                if (session('locale') != $locale) {
                    session()->put('locale', $locale);
                }
            } else {
                $locale = session('locale');
            }
        } else {
            session()->put('locale', $locale ?? App::getLocale());
        }

        return $locale;
    }
}
