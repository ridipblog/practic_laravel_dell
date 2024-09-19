<?php

use App\Http\Controllers\CountApplicationController;
use App\Http\Controllers\PopupController;
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

// ------------ count application ------------------
Route::get('/count-app',[CountApplicationController::class,'index']);
// ----------- popup applicartion -------------------
Route::get('/pop-up',[PopupController::class,'index']);
// ----------------- emit listner ---------------
Route::get('/emit-listner',[PopupController::class,'emitListner']);
