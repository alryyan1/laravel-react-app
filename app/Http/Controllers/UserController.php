<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function all()
    {
        return User::with('roles')->get();
    }
    public function editRole( Request $request ,User $user)
    {
        if ($request->get('add') && $request->get('add')) {
            $user->assignRole(Role::findById($request->get('role_id')));
            return ['status' => true, 'msg' => 'role added successfully'];
        }else{
            $user->removeRole(Role::findById($request->get('role_id')));
            return ['status' => true, 'msg' => 'role removed successfully'];

        }
    }
}
