<?php

use App\Http\Controllers\UserAuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login-by-api',[UserAuthController::class,'loginByAPI']);
Route::get('/dash-by-api',[UserAuthController::class,'dashByAPI'])->middleware('protect_api');
Route::get('/logout-by-api',[UserAuthController::class,'logoutByApi'])->middleware('protect_api');
// Route::get('/logout-by-api',[UserAuthController::class,'logoutByApi'])->middleware('auth:user_guard_api');
// Route::get('/dash-by-api',[UserAuthController::class,'dashByAPI'])->middleware('auth:api');
