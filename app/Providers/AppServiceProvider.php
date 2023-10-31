<?php

namespace App\Providers;

use App\Helpers\App\Traits\SetSettingsConfig;
use App\Mail\App\Traits\SetMailConfig;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('*', function($view) {});
    }
}
