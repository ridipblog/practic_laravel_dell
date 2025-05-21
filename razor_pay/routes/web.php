<?php

use App\Http\Controllers\RazorpayController;
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


Route::get('razorpay', [RazorpayController::class, 'payWithRazorpay']);
Route::post('payment', [RazorpayController::class, 'payment'])->name('payment');

Route::get('/refund/{paymentId}', [RazorpayController::class, 'refundPayment']);
