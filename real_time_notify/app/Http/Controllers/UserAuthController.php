<?php

namespace App\Http\Controllers;

use App\Events\InfoEvent;
use App\Events\SendNotificationEvent;
use App\Models\UserCredentialsModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserAuthController extends Controller
{
    public function registerAPI(Request $request)
    {
        dd("Ok");
        UserCredentialsModel::create([
            'email' => 'coder4@gmail.com',
            'password' => Hash::make('password')
        ]);
        dd("Ok");
    }
    public function loginAPI(Request $request)
    {
        $data = [
            'email' => 'coder1@gmail.com',
            'password' => 'password'
        ];
        if (Auth::attempt($data)) {
            // print_r(Auth::user());
            // dd(Auth::user());
            return redirect('/user-dash');
        }
        dd("not login");
    }
    public function userDashboard(Request $request)
    {
        return view('user_dashboard', [
            'user' => Auth::user()
        ]);
    }
    public function sendInfo(Request $request){
        broadcast(new InfoEvent(2,1,"Hello 4"))->toOthers();
        // broadcast(new SendNotificationEvent("hi1"));
    }
    public function logout(Request $request){
        Auth::logout();

    }
}
