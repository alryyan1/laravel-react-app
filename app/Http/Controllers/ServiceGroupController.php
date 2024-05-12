<?php

namespace App\Http\Controllers;

use App\Models\ServiceGroup;
use Illuminate\Http\Request;

class ServiceGroupController extends Controller
{
    public  function all(){
        return ServiceGroup::all();
    }

    public function create(Request $request){
       $service_group =   ServiceGroup::create($request->all());
       return ['status'=>true,'service_group'=>$service_group];
    }
}
