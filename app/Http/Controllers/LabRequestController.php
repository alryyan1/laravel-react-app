<?php

namespace App\Http\Controllers;

use App\Models\ChildTest;
use App\Models\LabRequest;
use App\Models\MainTest;
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
        foreach ($patient->labrequests as $requested){
            $patient->labrequests()->updateExistingPivot($requested->id,['price'=>$requested->price]);
        }
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
                //add test to requested tests
                $patient->labrequests()->attach($d);
                //add test with their children to requested results
                $main = MainTest::with('childtests')->find($d);
                /** @var ChildTest $childTest */
                foreach ($main->childTests as $childTest)
                {
                    $id =  $childTest->id;
                    $normal_range = $childTest->normalRange;
                    $patient->requestedResults()->attach($d,['child_test_id'=>$id,'normal_range'=>$normal_range]);
                }

            }
        } else {
            $patient->labrequests()->attach($data['main_test_id']);
            //add test with their children to requested results
            $main = MainTest::with('childtests')->find($data['main_test_id']);
            /** @var ChildTest $childTest */
            foreach ($main->childTests as $childTest)
            {
                $id =  $childTest->child_test_id;
                $normal_range = $childTest->normalRange;
                $patient->requestedResults()->attach($data['main_test_id'],['child_test_id'=>$id,'normal_range'=>$normal_range]);
            }

        }
        return ['status' => true,'patient'=>$patient->fresh()];

    }

    public function destroy(Request $request, Patient $patient)
    {
        $id = $request->query('id');

        $patient->labrequests()->detach($id);
        $patient->requestedResults()->detach($id);
        return ['status' => true];
    }

    public function all(Request $request, Patient $patient)
    {
        return $patient;
    }
}
