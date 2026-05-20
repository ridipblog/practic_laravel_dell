<?php

use App\Http\Controllers\viewDataController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::match(['get', 'post'], '/data', [viewDataController::class, 'index']);
