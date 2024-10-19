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
        $token = $user->createToken('MyApp')->accessToken;
        return response()->json(['token' => $token]);
    }
}
