<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Arr;

class SwitchLanguageLocale
{
    /**
     * Handle an incoming request.
     *
     * @param Closure(Request): (Response|RedirectResponse) $next
     * @return Response|RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $locale = session()->get('locale') ??
            $request->get('locale') ??
            $request->cookie('filament_language_switch_locale') ??
            $this->getBrowserLocale($request) ??
            config('app.locale', 'en');

        if (array_key_exists($locale, config('filament-language-switch.locales'))) {
            app()->setLocale($locale);
        }

        return $next($request);
    }

    /**
     * Determine the locale of the user's browser.
     *
     * @return ?string
     */
    private function getBrowserLocale(Request $request): ?string
    {
        $userLangs = preg_split('/[,;]/', $request->server('HTTP_ACCEPT_LANGUAGE'));
        foreach ($userLangs as $locale) {
            if (Arr::exists(config('filament-language-switch.locales'), $locale)) {
                return $locale;
            }
        }

        return null;
    }
}
