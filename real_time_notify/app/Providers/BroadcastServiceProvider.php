<?php

namespace App\Providers;

use Illuminate\Support\Facades\Broadcast;
use Illuminate\Support\ServiceProvider;

class BroadcastServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Broadcast::routes();
        Broadcast::routes(['middleware' => ['web', 'auth:user_guard']]);
        // Broadcast::routes(['middleware' => ['api', 'auth:user_guard_api']]);

        require base_path('routes/channels.php');
    }
}
