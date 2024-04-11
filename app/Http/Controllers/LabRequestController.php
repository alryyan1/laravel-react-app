<?php

namespace App\Http\Controllers;

use App\Models\LabRequest;
use App\Models\Patient;
use Illuminate\Http\Request;

class LabRequestController extends Controller
{
    public function storeAll(Request $request,Patient $patient){
        $data =  $request->all();

        if (is_array($data)){
            foreach ($data as $d){
                $patient->labrequests()->attach($d);

            }
        }else{
            $patient->labrequests()->attach($data['main_test_id']);

        }


         return ['status'=>true];

    }
    public function store(Request $request,Patient $patient){
        $data =  $request->all();


        $patient->labrequests()->attach($data['main_test_id']);
        return ['status'=>true];

    }
    public function destroy(Request $request , Patient $patient){
        $data = $request->all();
        $patient->labrequests()->detach($data['id']);
        return ['status'=>true];
    }
    public function all(Request $request , Patient $patient){
        return $patient;
    }
}
