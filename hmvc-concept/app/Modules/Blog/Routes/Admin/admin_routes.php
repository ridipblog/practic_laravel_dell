<?php
namespace App\Modules\Blog\Routes\Admin;

use App\Modules\Blog\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;
Route::get('/',[AdminController::class,'index']);
