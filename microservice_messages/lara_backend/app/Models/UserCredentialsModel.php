<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Tymon\JWTAuth\Contracts\JWTSubject;

// -------------- if you are using passport used this -----------------
// class UserCredentialsModel extends Authenticatable
// {
//     use HasApiTokens, HasFactory, Notifiable;
//     protected $table='user_credentials';
//     protected $fillable=[
//         'email',
//         'password'
//     ];
// }

// ------------------- if you are using jwt auth ------------------

class UserCredentialsModel extends Authenticatable implements JWTSubject
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table='user_credentials';
    protected $fillable=[
        'email',
        'password'
    ];
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }
    public function getJWTCustomClaims()
    {
        return [];
    }
}
