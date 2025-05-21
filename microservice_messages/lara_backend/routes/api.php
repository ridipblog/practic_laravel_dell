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

Route::post('/login', [UserAuthController::class, 'index']);
// -------------- passport authentication-------------------
Route::group(['prefix' => 'passport'], function () {
    require __DIR__ . '/passport_auth_apis.php';
});
// -------------- jwt token routes-----------------
Route::group(['prefix'=>'jwt'],function(){
    require __DIR__ . '/jwt_apis.php';
});
