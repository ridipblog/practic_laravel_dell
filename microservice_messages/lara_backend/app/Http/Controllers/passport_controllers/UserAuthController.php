<?php

namespace App\Http\Controllers\passport_controllers;

use App\Http\Controllers\Controller;
use App\Models\UserCredentialsModel;
use Illuminate\Http\Request;

class UserAuthController extends Controller
{
    public function loginPassportAPI(Request $request){
        $user_data=UserCredentialsModel::where('email','coder1@gmail.com')->first();
        if($user_data){
            $token=$user_data->createToken('RequestAuthToken')->accessToken;
            return $token;
        }else{
            dd("data not found !");
        }
    }
    // ------------ get logged user by passport ------------------
    public function dashboard(Request $request){
        return response()->json(['message'=>$request->user('passport_api_guard')]);
    }
}
