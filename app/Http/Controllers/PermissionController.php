<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function all(Request $request){
        $guard_name = $request->query('guard_name');
        return Permission::where('guard_name','=',$guard_name)->get();
    }
    public function store(Request $request)
    {


        Permission::create($request->all());
        return ['status' => true];

    }
}
