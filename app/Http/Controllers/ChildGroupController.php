<?php

namespace App\Http\Controllers;

use App\Models\childGroup;
use App\Models\ChildTest;
use Illuminate\Http\Request;

class ChildGroupController extends Controller
{
    public function all(Request $request ,ChildTest $childTest){
       return  childGroup::all();
    }
    public function store(Request $request){
        $name =  $request->get('name');
         $data =   childGroup::create(['name'=>$name]);
         return ['status'=>true,'data'=>$data->fresh()];
    }
}
