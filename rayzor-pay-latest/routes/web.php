<?php

use App\Http\Controllers\RazorpayController;
use Illuminate\Support\Facades\Route;
Route::get('/', [RazorpayController::class, 'index']);
Route::post('/create-order', [RazorpayController::class, 'createOrder']);
Route::post('/verify-payment', [RazorpayController::class, 'verifyPayment']);