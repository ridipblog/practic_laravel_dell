<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RolePermissionModel extends Model
{
    use HasFactory;
    protected $table='roles_permissions';
    protected $fillable=[
        'role_id',
        'permission_id'
    ];
    public function permissions(){
        return $this->belongsTo(PermissionsModel::class,'permission_id');
    }
}
