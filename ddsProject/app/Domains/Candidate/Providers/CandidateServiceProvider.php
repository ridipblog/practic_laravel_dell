<?php

namespace App\Domains\Candidate\Providers;

use App\Domains\Candidate\Repositories\RegistrationRepository;
use Illuminate\Support\ServiceProvider;
use App\Domains\Candidate\Repositories\RegistrationRepositoryInterface;

class CandidateServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        // Bind Interface to Implementation
        $this->app->bind(
            RegistrationRepositoryInterface::class,
            RegistrationRepository::class
        );
    }

    public function boot(): void
    {
        // Load routes automatically
        $this->loadRoutesFrom(
            app_path('Domains/Candidate/Routes/web.php')
        );

        // Load views automatically
        $this->loadViewsFrom(
            app_path('Domains/Candidate/Views'),
            'candidate'
        );
    }
}
