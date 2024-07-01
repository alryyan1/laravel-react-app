<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    public function all()
    {
        return Unit::all();
    }
    public function store(Request $request)
    {
        return ['status'=>true,'data'=>Unit::create(['name'=>$request->name]) ]  ;
    }
}
