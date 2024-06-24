<?php

namespace App\Http\Controllers;

use App\Models\ChildTest;
use App\Models\Company;
use App\Models\LabRequest;
use App\Models\MainTest;
use App\Models\Patient;
use App\Models\RequestedResult;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class LabRequestController extends Controller
{

    public function bankak(Request $request,LabRequest $labRequest){
        $data = $request->all();
        $test_id =  $data['id'];

        return ['status'=>$labRequest->update(['is_bankak'=>$data['val']])];
    }
    public function hide(Request $request,LabRequest $labRequest){
        $data = $request->all();
        return ['status'=>$labRequest->update(['hidden'=>$data['val']]),'data'=>$labRequest->patient->refresh()];
    }
    public function edit(Request $request,LabRequest $labRequest){
        $data = $request->all();

        return ['status'=>$labRequest->update(['discount_per'=>$data['discount']]),'data'=>$labRequest->patient->refresh()];
    }
    public function payment(Request $request,Patient $patient){

        try {
            DB::transaction(function () use ($request,$patient) {
                $user = auth()->user();
                $data = $request->all();
                $patient_company = null;
                if ($patient->company_id != null) {
                    /** @var Company $patient_company */
                    $patient_company = $patient->company;
                    $patient_company->load('tests');

                }
                /** @var LabRequest $requested */
                foreach ($patient->labrequests as $requested) {
                    $price = null;
                    if ($patient->company_id != null) {
                        $id = $requested->mainTest->id;
                        $test = $patient_company->tests->filter(function ($item) use ($id) {
                            return $item->pivot->main_test_id == $id;
                        })->first();
                        $price = $test->pivot->price;


                        $amount_paid = $test->pivot->price * $patient_company->lab_endurance / 100;

                    } else {
                        $price = $requested->mainTest->price;
                        $discount = $requested->discount_per;
                        $discount_amount = ($requested->mainTest->price * $discount) / 100;
                        $amount_paid = $requested->mainTest->price - $discount_amount;
                    }
                    $requested->update(['price' => $price, 'amount_paid' => $amount_paid, 'user_deposited' => $user->id]);
                }
                $patient->is_lab_paid = true;
                $patient->lab_paid = $data['paid'];
                $result = $patient->save();

            });
        } catch (\Throwable $e) {
            return ['status' => true, 'data' => $patient->refresh(),'message' => $e->getMessage()];
        }
        return ['status' => true, 'data' => $patient->refresh()];
    }
    public function cancel(Request $request,Patient $patient){
        try {
            DB::transaction(function () use ($request, $patient) {
                $patient->is_lab_paid = false;
                $patient->lab_paid = 0;
                foreach ($patient->labrequests as $labrequest) {
                    $labrequest->update(['amount_paid' => 0]);
                }
            });
        } catch (\Throwable $e) {
            return ['status' => true, 'message' => $e->getMessage()];
        }


        return  ['status'=> $patient->save()];


    }
    public function store(Request $request, Patient $patient)
    {
        try {
            DB::transaction(function () use ($request, $patient) {
                $user = auth()->user();
                $data = $request->all();
                if (is_array($data['main_test_id'])) {
                    foreach ($data['main_test_id'] as $d) {
                        //add test to requested tests
                        $main = MainTest::with('childtests')->find($d);

                        $lr = LabRequest::create(['pid' => $patient->id, 'main_test_id' => $d, 'price' => $main->price, 'user_requested' => $user->id]);
                        //                $patient->labrequests()->attach($d);
                        //add test with their children to requested results
                        /** @var ChildTest $childTest */
                        foreach ($main->childTests as $childTest) {
                            $id = $childTest->id;
                            $normal_range = $childTest->normalRange;
                            $requested_result = new RequestedResult(['child_test_id' => $id, 'normal_range' => $normal_range, 'patient_id' => $patient->id, 'main_test_id' => $d]);
                            $lr->requested_results()->save($requested_result);
                            //                    $patient->requestedResults()->attach($d,['child_test_id'=>$id,'normal_range'=>$normal_range]);
                        }

                    }
                } else {
                    $patient->labrequests()->attach($data['main_test_id']);
                    //add test with their children to requested results
                    $main = MainTest::with('childtests')->find($data['main_test_id']);
                    /** @var ChildTest $childTest */
                    foreach ($main->childTests as $childTest) {
                        $id = $childTest->child_test_id;
                        $normal_range = $childTest->normalRange;
                        $patient->requestedResults()->attach($data['main_test_id'], ['child_test_id' => $id, 'normal_range' => $normal_range]);
                    }

                }
            });
        } catch (\Throwable $e) {
            return ['status' => false, 'message' => $e->getMessage()];

        }

        return ['status' => true,'patient'=>$patient->fresh()];

    }

    public function destroy(Request $request,LabRequest $labRequest)
    {
        try {
            DB::transaction(function () use ($request, $labRequest) {
                $result = $labRequest->delete();
                if ($result) {
                    $labRequest->requested_results()->delete();
                }
                $labRequest->load('patient');


            });
        } catch (\Throwable $e) {
            return ['status' => true, 'message' => $e->getMessage()];
        }
        return ['status' => true, 'data' => $labRequest->patient];


    }

    public function all(Request $request, Patient $patient)
    {
        return $patient;
    }
}
