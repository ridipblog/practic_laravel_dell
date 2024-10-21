<?php

namespace App\Modules\Buy\Controllers;

use App\Http\Controllers\Controller;

class BuyController extends Controller
{
    public function index() {
        return view('Buy::index');
    }
}
