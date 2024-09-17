<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class EmployeesModel extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table='employees';
    protected $fillable=[
        'name',
        'password',
        'role_id'
    ];
    public function roles(){
        return $this->belongsTo(RoleModel::class,'role_id');
    }
    public function checkRole(){
        return $this->roles()->where('name','Admin')->exists();

    }
}
