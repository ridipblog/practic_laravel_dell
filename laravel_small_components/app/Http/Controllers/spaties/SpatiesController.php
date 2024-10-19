<?php

namespace App\Http\Controllers\spaties;

use App\Http\Controllers\Controller;
use App\Models\spaties\UserSpatiesModel;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class SpatiesController extends Controller
{
    public function setUpRolePermission(Request $request)
    {
        $admin_role = Role::create(['name' => 'admin']); // create a role name
        Permission::create(['name' => 'edit articles']); // create a permission
        Permission::create(['name' => 'add articles']); // create a permission
        $admin_role->givePermissionTo('edit articles'); // assign permission to admin
        $admin_role->givePermissionTo('add articles'); // assign permission to admin
        // ------------ retuvues retrive role and assign permission -----------------
        $admin_role = Role::where('name', 'admin')->first();
        Permission::create(['name' => 'delete articles']); // create a permission
        $admin_role->givePermissionTo('delete articles');
    }
    public function setUpWithGuard(Request $request)
    {
        $post_role = Role::create(['name' => 'post authority', 'guard_name' => 'spaties_guard']); // create a role name
        Permission::create(['name' => 'display photo', 'guard_name' => 'spaties_guard']); // create a permission
        $post_role->givePermissionTo('add post'); // assign permission to admin
    }
    public function registration(Request $request)
    {
        try {
            $save_user = User::create([
                'name' => 'coder 6',
                'email' => 'coder6@gmail.com',
                'password' => Hash::make('password')
            ]);
            $save_user->assignRole('post admin'); // assign spatie groud role
        } catch (Exception $err) {
            dd($err->getMessage());
        }
    }
    public function asssignPermission(Request $request){
        $logged_user=Auth::guard('spaties_guard')->user();
        $user=UserSpatiesModel::where('id',$logged_user->id)->first();
        $user->givePermissionTo('display photo');
    }
    public function login(Request $request)
    {
        $request_data = [
            'email' => 'coder2@gmail.com',
            'password' => 'password'
        ];
        // if(Auth::attempt($request_data)){

        // }
        if (Auth::guard('spaties_guard')->attempt($request_data)) {
            // dd(Auth::guard('spaties_guard')->user());
        }
    }
    public function checkRoleAndPermission(Request $request)
    {
        $logged_user = Auth::guard('spaties_guard')->user();
        $user = UserSpatiesModel::where('id', $logged_user->id)->first();
        if ($user->hasRole('post authority','spaties_guard')) {
            if ($user->can('display photo')) {
                dd("Permission");
            } else {
                dd("Roled");
            }
        }
    }
}
