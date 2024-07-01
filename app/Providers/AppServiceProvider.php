<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Laravel\Sanctum\Sanctum;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        Sanctum::$accessTokenAuthenticationCallback = function ($accessToken, $isValid){
            return !$accessToken->last_used_at || !$accessToken->last_used_at->addMinutes(20)->lte(now());
        };
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
