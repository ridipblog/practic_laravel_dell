<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class BuyServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        View::addNamespace('Buy', base_path('App\Modules\Buy\Views'));
        $this->loadMigrationsFrom(app_path('Modules/Buy/databases/migrations'));
    }
}
