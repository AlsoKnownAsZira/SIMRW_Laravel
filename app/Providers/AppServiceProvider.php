<?php

namespace App\Providers;

use Carbon\Carbon;
use Illuminate\Support\ServiceProvider;
use App\Http\FilamentLanguageSwitch;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        FilamentLanguageSwitch::configureUsing(function (FilamentLanguageSwitch $switch) {
            $switch
                ->locales(['id']); // also accepts a closure
        });
    }
}
