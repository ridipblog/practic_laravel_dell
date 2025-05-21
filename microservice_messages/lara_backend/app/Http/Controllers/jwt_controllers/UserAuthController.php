<?php

namespace App\Http\Controllers\jwt_controllers;

use App\Http\Controllers\Controller;
use App\Models\UserCredentialsModel;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class UserAuthController extends Controller
{
    public function loginJWTApi(Request $request)
    {
        $user_data = UserCredentialsModel::where('email', 'coder1@gmail.com')->first();
        if ($user_data) {
            // --------------- without set extra payload------------------
            $token = JWTAuth::fromUser($user_data);
            // ------------- with add extra payload -------------
            $extra_token=JWTAuth::claims(['role'=>'admin'])->fromUser($user_data);
            return response()->json(['data'=>[
                'token'=>$token,
                'extra_token'=>$extra_token
            ]]);
        }
    }
    public function jwtDashboard(Request $request){
        $logged_user=JWTAuth::parseToken()->getPayload();
        $logged_user=$logged_user->toArray();
        return response()->json(['data'=>$logged_user]);
    }
}
