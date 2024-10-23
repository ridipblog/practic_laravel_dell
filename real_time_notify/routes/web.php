<?php

use App\Http\Controllers\SendNotificationController;
use App\Http\Controllers\UserAuthController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// -------------- used this to send notification to all users ------------------
Route::get('/notifications',[SendNotificationController::class,'index']);

Route::get('/register',[UserAuthController::class,'registerAPI']);
Route::get('/login',[UserAuthController::class,'loginAPI']);
Route::get('user-dash',[UserAuthController::class,'userDashboard']);
Route::get('/send-info',[UserAuthController::class,'sendInfo']);
Route::get('/logout',[UserAuthController::class,'logout']);
