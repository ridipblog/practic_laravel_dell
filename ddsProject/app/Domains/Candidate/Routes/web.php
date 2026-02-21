<?php

use App\Domains\Candidate\Http\Controllers\RegistrationController;
use Illuminate\Support\Facades\Route;

Route::prefix('candidate')
    ->name('candidate.')
    ->group(function () {
        Route::get('/', [RegistrationController::class, 'home'])->name('home');
        Route::get('/registration', [RegistrationController::class, 'registration'])->name('registration');
    });
