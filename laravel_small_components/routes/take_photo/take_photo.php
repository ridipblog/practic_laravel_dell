<?php

use App\Http\Controllers\TakePhotoController;
use Illuminate\Support\Facades\Route;
Route::get('/take-photo',[TakePhotoController::class,'index']);
Route::post('/take-photo',[TakePhotoController::class,'takePhotoSubmit']);
