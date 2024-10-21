<?php

namespace App\Modules\Blog\Routes;

use App\Modules\Blog\Controllers\BlogController;
use Illuminate\Support\Facades\Route;

Route::get('/', [BlogController::class, 'index']);
Route::group(['prefix' => 'admin'], function () {
    require __DIR__ . '/Admin/admin_routes.php';
});
