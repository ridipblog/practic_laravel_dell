<?php

namespace App\Http\Controllers;

use App\Models\EmployeesModel;
use App\Models\RoleModel;
use App\Models\RolePermissionModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PermissionController extends Controller
{
    public function index(Request $request){
        $login_id=1;
        $emplo=new EmployeesModel();
        $user=Auth::attempt(['name'=>'coder 1','password'=>'12']);
        $check_role=EmployeesModel::query()->with(['roles'])
        ->where('role_id',Auth::user()->role_id)
        ->whereHas('roles',function($query){
            $query->where('name','Office');
        })->first();
        $check_permission=RolePermissionModel::query()
        ->with(['permissions'])
        ->where('role_id',Auth::user()->role_id)
        ->whereHas('permissions',function($query){
            // $query->whereIn('name',['Edit_Profile','Add_profile']);
        })->get();

        dd($check_role);
    }
}
