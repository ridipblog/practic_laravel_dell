<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Broadcast;
use Illuminate\Support\Facades\Log;

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});
Broadcast::channel('info.{reciver_id}', function ($user, $reciver_id) {
    // Log::info('User trying to access chat channel:', ['user' => $user, 'receiverId' => $reciver_id]);
    // return true;
    $user = Auth::guard('user_guard')->user();

    // ------------ write to check other requirment start -----------------
    // if($user->status==1){
    //     return false;
    // }
    // ------------ write to check other requirment end -----------------
    return (int) $user->id === (int) $reciver_id;
});
