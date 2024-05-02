<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function all(){
        return Doctor::with('specialist')->get();
    }

    public function create(Request $request){
//        return $request->all();
       $doctor =  Doctor::create($request->all());
       return ['status'=> true, 'doctor'=>$doctor];
    }
}
