<?php

namespace App\Modules\Buy\Routes;

use App\Modules\Buy\Controllers\BuyController;
use Illuminate\Support\Facades\Route;

Route::get('/',[BuyController::class,'index']);
