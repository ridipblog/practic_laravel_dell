<?php

use App\Http\Controllers\DispatchJobController;
use App\Http\Controllers\generate_pdfs\GeneratePdfController;
use App\Http\Controllers\TakePhotoController;
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

// ----------------- lazy loading -------------------
require __DIR__ .'/lazy_loading/lazy_loading.php';

// ---------------- take photo ------------------

require __DIR__ .'/take_photo/take_photo.php';

// -------------- cron job test -----------------
Route::get('/cron-test',[TakePhotoController::class,'cronTest']);
// ----------------- generate pdf --------------
Route::get('/get-pdf',[GeneratePdfController::class,'generatePDF']);

// -------------- dispatc and job ----------------
Route::get('/send-job-emails',[DispatchJobController::class,'index']);
Route::get('/send--interface-job-emails',[DispatchJobController::class,'byInterface']);
