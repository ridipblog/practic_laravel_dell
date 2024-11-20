<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;

class PassportUsersModel extends Authenticatable
{
    use HasApiTokens, HasFactory,Notifiable;
    protected  $table='passport_users';
    protected $guard='passport_groud';
    protected $fillable=[
        'email',
        'password',
        'status'
    ];

}
