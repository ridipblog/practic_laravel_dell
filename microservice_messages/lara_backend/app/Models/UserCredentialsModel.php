<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserCredentialsModel extends Model
{
    use HasFactory;
    protected $table='user_credentials';
    protected $fillable=[
        'email',
        'password'
    ];
}
