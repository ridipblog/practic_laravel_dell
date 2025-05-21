<?php

use App\Http\Controllers\passport_controllers\UserAuthController;
use Illuminate\Support\Facades\Route;

Route::get('/login-passport', [UserAuthController::class, 'loginPassportAPI']);
Route::group(['middleware' => ['passport_protect_api']], function () {
    Route::get('/dashboard', [UserAuthController::class, 'dashboard']);
});
