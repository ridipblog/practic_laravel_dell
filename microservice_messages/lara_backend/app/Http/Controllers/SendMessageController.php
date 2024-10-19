<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SendMessageController extends Controller
{
    public function index(Request $request){

        return view('send_message');
    }
    public function sendMessage(Request $request){
        $response = Http::post('http://localhost:3000/sendMessage', [
            'message' => $request->message,
        ]);
        return response()->json(['status' => 'Message sent!', 'data' => $response->json()]);

    }
}
