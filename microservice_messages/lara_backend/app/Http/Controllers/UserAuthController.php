<?php

namespace App\Http\Controllers;

use App\Models\UserCredentialsModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserAuthController extends Controller
{
    public function register(Request $request)
    {

        $user = UserCredentialsModel::create([
            'email' => "coder1@gmail.com",
            'password' => Hash::make('password'),
        ]);
    }
    public function login(Request $request){
        $user_data=UserCredentialsModel::where('email','coder1@gmail.com')->first();
        if($user_data){
            $token=$user_data->createToken('RequestAuthToken')->accessToken;
            return $token;
        }else{
            dd("data not found !");
        }
    }
}
