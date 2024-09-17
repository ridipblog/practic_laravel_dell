<?php

use App\Http\Controllers\json_database\JsonDatabaseController;
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

// --------------- json database ------------
Route::group(['prefix'=>'json-database'],function(){
    Route::post('/add-data',[JsonDatabaseController::class,'addData']);
    Route::get('/get-data',[JsonDatabaseController::class,'getData']);
    Route::get('/get-con-data',[JsonDatabaseController::class,'getConData']);
});
