<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CountApplicationController extends Controller
{
    public function index(){
        return view('count_application');
    }
}
