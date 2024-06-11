<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function store(Request $request){
        Role::create($request->all());
        return ['status' => true];
    }
    public function all()
    {
        return Role::with('permissions')->get();
    }
    public function edit(Request $request , Role $role)
    {
        if ($request->get('add') && $request->get('add')) {
            $role->givePermissionTo(Permission::findById($request->get('permission_id')));
            return ['status' => true, 'msg' => 'Permission added successfully'];
        }else{
            $role->revokePermissionTo(Permission::findById($request->get('permission_id')));
            return ['status' => true, 'msg' => 'Permission removed successfully'];

        }
    }
    public function destroy(Request $request , Role $role)
    {

        $role->delete();
        return ['status' => true,'rules'=>Role::all()];
    }


}
