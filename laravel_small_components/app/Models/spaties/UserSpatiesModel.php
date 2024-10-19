<?php

namespace App\Models\spaties;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class UserSpatiesModel extends Authenticatable
{
    use HasRoles, HasApiTokens, HasFactory, Notifiable;
    protected $table='user_spaties';
    protected $guard='spaties_guard';
    protected $fillable=[
        'name',
        'email',
        'password'
    ];
}
