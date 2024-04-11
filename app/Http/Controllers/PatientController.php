<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PHPUnit\Exception;

class PatientController extends Controller
{

    public function edit(Request  $request,Patient $patient){
        $data = $request->all();

        $patient->name = $data['name'];
        $patient->phone = $data['phone'];
        $patient->doctor_id = $data['doctor'];
        $result = $patient->save();
        if ($result){
            return ['status'=>true];
        }

    }
    public function store(Request $request){
        $val = $request->all();
        $patient = new Patient();

        $patient->name = $request->name;
        $patient->doctor_id = $request->doc_id;
        $patient->phone = $request->phone;
        $patient->user_id = 1;
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
