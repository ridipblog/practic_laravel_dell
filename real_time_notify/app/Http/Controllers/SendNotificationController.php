<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SendNotificationController extends Controller
{
    public function index(Request $request){
        return view('notifications');
    }
}
