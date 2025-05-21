<?php

use App\Http\Controllers\jwt_controllers\UserAuthController;
use Illuminate\Support\Facades\Route;

Route::post('/login-jwt', [UserAuthController::class, 'loginJWTApi']);

Route::group(['middleware' => ['jwt_protect_api']], function () {
    Route::get('/dashboard', [UserAuthController::class, 'jwtDashboard']);
});
