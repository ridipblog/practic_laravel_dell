<?php

use App\Http\Controllers\viewDataController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/data', [viewDataController::class, 'index']);
