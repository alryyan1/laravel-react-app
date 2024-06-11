<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function all(){
        return Permission::all();
    }
    public function store(Request $request)
    {


        Permission::create($request->all());
        return ['status' => true];

    }
}
