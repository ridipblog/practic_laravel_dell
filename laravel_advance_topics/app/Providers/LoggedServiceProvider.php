<?php

namespace App\Providers;

use App\Services\LoggService;
use Illuminate\Support\ServiceProvider;

class LoggedServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(LoggService::class,function($app){
            return new LoggService();
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
