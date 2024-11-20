<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class UserCredentialsModel extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table='user_credentials';
    protected $fillable=[
        'email',
        'password'
    ];
}
