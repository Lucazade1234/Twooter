<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\ExternalApiService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(ExternalApiService::class, function ($app) {
            return new ExternalApiService();
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Your bootstrapping code here
    }
}
