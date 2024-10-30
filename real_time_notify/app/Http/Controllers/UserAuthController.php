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
        // ----------- start session log in --------------
        if (Auth::guard('user_guard')->attempt($data)) {
            // print_r(Auth::user());
            // dd(Auth::user());
            return redirect('/user-dash');
        }
        // ----------- end session log in --------------
        dd("not login");
    }
    public function loginByAPI(Request $request)
    {
        // $user = UserCredentialsModel::where('email', 'coder1@gmail.com')->first();
        $data = [
            'email' => 'coder2@gmail.com',
            'password' => 'password'
        ];
        // if (Auth::attempt($data)) {
        $user = UserCredentialsModel::where('email', $data['email'])->first();
        $token = $user->createToken('EmployeeToken')->accessToken;
        return $token;
        // }
        // dd($token);
    }
    public function userDashboard(Request $request)
    {
        return view('user_dashboard', [
            'user' => Auth::guard('user_guard')->user()
        ]);
    }
    public function socketDash(Request $request)
    {
        return view('socket_dash', [
            'user' => Auth::guard('user_guard')->user()
        ]);
    }
    public function dashByAPI(Request $request)
    {

        return view('api_dash',[
            'user'=>$request->user('user_guard_api')
        ]);
        // return $request->user('user_guard_api');
        // return auth()->user();
    }
    public function sendInfo(Request $request)
    {
        broadcast(new InfoEvent(2, 1, "Hello 4"))->toOthers();
        // broadcast(new SendNotificationEvent("hi1"));
    }
    public function logout(Request $request)
    {
        Auth::guard('user_guard')->logout();
    }
    public function logoutByApi(Request $request)
    {

        $request->user('user_guard_api')->tokens->each(function ($token) {
            $token->revoke();
        });
    }
}
