<?php

namespace App\Http\Controllers;

use App\Models\LabRequest;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class LabRequestController extends Controller
{

    public function bankak(Request $request,Patient $patient){
        $data = $request->all();
        $test_id =  $data['id'];

        $patient->labrequests()->updateExistingPivot($test_id,['is_bankak'=>$data['val']],touch: false);
    }
    public function edit(Request $request,Patient $patient){
        $data = $request->all();
        $test_id =  $data['test_id'];
        $patient->labrequests()->updateExistingPivot($test_id,['discount_per'=>$data['discount']],touch:false);
       return $data;

    }
    public function payment(Request $request,Patient $patient){

        $data = $request->all();
        $patient->is_lab_paid = true;
        $patient->lab_paid = $data['paid'];
        return  ['status'=> $patient->save()];


    }
    public function cancel(Request $request,Patient $patient){

        $data = $request->all();
        $patient->is_lab_paid = false;
        $patient->lab_paid = 0;

        return  ['status'=> $patient->save()];


    }
    public function store(Request $request, Patient $patient)
    {
        $data = $request->all();
        if (is_array($data['main_test_id'])) {
            foreach ($data['main_test_id'] as $d) {
                $patient->labrequests()->attach($d);
            }
        } else {
            $patient->labrequests()->attach($data['main_test_id']);

        }
        return ['status' => true,'patient'=>$patient->fresh()];

    }

    public function destroy(Request $request, Patient $patient)
    {
        $data = $request->all();
        $patient->labrequests()->detach($data['id']);
        return ['status' => true];
    }

    public function all(Request $request, Patient $patient)
    {
        return $patient;
    }
}
