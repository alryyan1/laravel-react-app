<?php

namespace App\Http\Controllers;

use App\Http\Requests\PatientAddRequest;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PHPUnit\Exception;

class PatientController extends Controller
{

    public function edit(PatientAddRequest  $request,Patient $patient){
//        $data = $request->all();
          $result =  $patient->update($request->validated());
//        $patient->name = $data['name'];
//        $patient->phone = $data['phone'];
//        $patient->doctor_id = $data['doctor'];
//        $result = $patient->save();
        if ($result){
            return ['status'=>true];
        }

    }
    public function store(PatientAddRequest $request){

//        return $request->validated();
        $patient = new Patient($request->validated());
        $patient->user_id = \Auth::user()->id;
        $patient->shift_id = 1;
        try {
            $result = $patient->save();
            if($result){
                return ['status'=>true,'id'=> $patient->id];
            }
        }catch (Exception $e){
            return ['error'=>$e->getMessage()];
        }

    }
}
