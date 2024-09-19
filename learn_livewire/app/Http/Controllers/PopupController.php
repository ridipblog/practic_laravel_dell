<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PopupController extends Controller
{
    public function index(){
        return view('popup');
    }
    public function emitListner(){
        return view('emit_listner');
    }
}
