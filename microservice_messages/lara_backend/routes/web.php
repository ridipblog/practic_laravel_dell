<?php

use App\Http\Controllers\SendMessageController;
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


Route::post('/send-message',[SendMessageController::class,'sendMessage']);
Route::get('/review-message',[SendMessageController::class,'index']);


Route::get('registration',[UserAuthController::class,'register']);
