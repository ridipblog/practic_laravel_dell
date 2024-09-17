<?php

use App\Http\Controllers\lazy_loading\LazyLoadingController;
use Illuminate\Support\Facades\Route;
Route::get('/lazy-loading',[LazyLoadingController::class,'index']);
