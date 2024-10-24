<?php

namespace App\Http\Controllers;

use App\Models\ChildTest;
use App\Models\Company;
use App\Models\Doctorvisit;
use App\Models\LabRequest;
use App\Models\MainTest;
use App\Models\Patient;
use App\Models\RequestedOrganism;
use App\Models\RequestedResult;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class LabRequestController extends Controller
{

    public function addOrganism(Request $request , LabRequest $labRequest)
    {
//        $labRequest->load('patient');

       $result =     RequestedOrganism::create(['organism'=>'Organism','sensitive'=>'','resistant'=>'','lab_request_id'=>$labRequest->id]);
       return ['status'=>true,'data'=>$result,'patient'=>$labRequest->patient];
    }
    public function deleteOrganism(Request $request , RequestedOrganism $requestedOrganism)
    {
        $requestedOrganism->load('labRequest');
       return ['status'=>true,'data'=>$requestedOrganism->delete(),'patient'=>$requestedOrganism->labRequest->patient];
    }
    public function editOrganism(Request $request , RequestedOrganism $requestedOrganism)
    {
       $col =  $request->get('colName');
       $val =  $request->get('val');
        return ['status'=>$requestedOrganism->update([$col=>$val])];
    }
    public function bankak(Request $request,LabRequest $labRequest,Doctorvisit $doctorVisit){
        $data = $request->all();
        $test_id =  $data['id'];

        return ['status'=>$labRequest->update(['is_bankak'=>$data['val']]),'data'=>$doctorVisit->fresh()];
    }
    public function bankLab(Request $request,LabRequest $labRequest){
        $data = $request->all();
        return ['status'=>$labRequest->update(['is_bankak'=>$data['val']]),'patient'=>$labRequest->patient->refresh()];
    }
    public function hide(Request $request,LabRequest $labRequest){
//        return $labRequest;
        $data = $request->all();
        return ['status'=>$labRequest->update(['hidden'=>$data['val']]),'data'=>$labRequest->patient->doctorVisit()];
    }
    public function edit(Request $request,LabRequest $labRequest,Doctorvisit $doctorVisit){
        $user =  auth()->user();
        if (!$user->can('التخفيض')) {
            return  response(['message'=>'صلاحيه التخفيض غير مفعله'],400);
        }
        $data = $request->all();

        return ['status'=>$labRequest->update(['discount_per'=>$data['discount']]),'data'=>$doctorVisit->fresh()];
    }

    public function payment(Request $request,Doctorvisit $doctorVisit){
        $patient = $doctorVisit->patient;
        $user =  auth()->user();
        if (!$user->can('سداد فحص')) {
            return  response(['message'=>'صلاحيه سداد فحص غير مفعله'],400);
        }
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
                            $price = $requested->price;
                            if ($test->pivot->endurance_static > 0) {
                                // alert('s')
                                $amount_paid =$test->pivot->endurance_static;

                    }else{
                                if($test->pivot->endurance_percentage > 0 ){
                                    $amount_paid = ($price * $test->pivot->endurance_percentage) / 100;

                                }else{
                                    $amount_paid = ($price * $patient->company->lab_endurance) / 100;

                                }
                            }



                        } else {
                            $price = $requested->mainTest->price;
                            $discount = $requested->discount_per;
                            $discount_amount = ($requested->mainTest->price * $discount) / 100;
                            $amount_paid = $requested->mainTest->price - $discount_amount;
                        }
                        $requested->update(['price' => $price, 'amount_paid' => $amount_paid, 'user_deposited' => $user->id]);
                    }
                    $patient->is_lab_paid = true;



            });
        } catch (\Throwable $e) {
            return ['status' => false,'message' => $e->getMessage()];
        }
        return ['status' =>   $patient->save(), 'data' => $doctorVisit->refresh()];
    }
    public function labPayment(Request $request,Patient $patient){

        $user =  auth()->user();
        if (!$user->can('سداد فحص')) {
            return  response(['message'=>'صلاحيه سداد فحص غير مفعله'],400);
        }
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
                            $price = $requested->price;
                            if ($test->pivot->endurance_static > 0) {
                                // alert('s')
                                $amount_paid =$test->pivot->endurance_static;

                    }else{
                                if($test->pivot->endurance_percentage > 0 ){
                                    $amount_paid = ($price * $test->pivot->endurance_percentage) / 100;

                                }else{
                                    $amount_paid = ($price * $patient->company->lab_endurance) / 100;

                                }
                            }



                        } else {
                            $price = $requested->mainTest->price;
                            $discount = $requested->discount_per;
                            $discount_amount = ($requested->mainTest->price * $discount) / 100;
                            $amount_paid = $requested->mainTest->price - $discount_amount;
                        }
                        $requested->update(['price' => $price, 'amount_paid' => $amount_paid, 'user_deposited' => $user->id]);
                    }
                    $patient->is_lab_paid = true;



            });
        } catch (\Throwable $e) {
            return ['status' => false,'message' => $e->getMessage()];
        }
        return ['status' =>   $patient->save(), 'data' => $patient->refresh()];
    }
    public function cancel(Request $request,Doctorvisit $doctorVisit){
        $patient = $doctorVisit->patient;
        $user =  auth()->user();
        if (!$user->can('الغاء سداد فحص')) {
            return  response(['message'=>'صلاحيه الغاء السداد غير مفعله'],400);
        }
//        $user_deposited =  $patient->labrequests[0]->user_deposited ;
//        if ($user->id != $user_deposited){
//            return  response(['message'=>'يجب الغاء السداد من نفس المستخدم'],400);
//
//        }
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



        return  ['status'=> $patient->save(),'data'=>$doctorVisit->fresh()];



    }
    public function cancelLab(Request $request,Patient $patient){
        $user =  auth()->user();
        if (!$user->can('الغاء سداد فحص')) {
            return  response(['message'=>'صلاحيه الغاء السداد غير مفعله'],400);
        }
//        $user_deposited =  $patient->labrequests[0]->user_deposited ;
//        if ($user->id != $user_deposited){
//            return  response(['message'=>'يجب الغاء السداد من نفس المستخدم'],400);
//
//        }
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



        return  ['status'=> $patient->save(),'data'=>$patient->fresh()];



    }
    public function store(Request $request, Doctorvisit  $doctorVisit)
    {
        $patient = $doctorVisit->patient;
        try {
            DB::transaction(function () use ($request, $patient) {
                $user = auth()->user();
                $data = $request->all();
                if (is_array($data['main_test_id'])) {
                    foreach ($data['main_test_id'] as $d) {
                        //add test to requested tests
                        $main = MainTest::with('childtests')->find($d);
                        $price = $main->price;
                        if ($patient->company_id != null){
                            /** @var Company $patient_company */
                            $patient_company =  $patient->company;
                            $patient_company->load('tests');
                            $service =  $patient_company->tests->filter(function($item) use($d){
                                return $item->id == $d;
                            })->first();
                            $price =   $service->pivot->price;

                        }
                        $lr = LabRequest::create(['pid' => $patient->id, 'main_test_id' => $d, 'price' => $price, 'user_requested' => $user->id]);
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

        return ['status' => true,'patient'=>$doctorVisit->fresh()];

    }
//    public function storeLab(Request $request, Patient  $patient)
//    {
//
//        try {
//            DB::transaction(function () use ($request, $patient) {
//                $user = auth()->user();
//                $data = $request->all();
//                if (is_array($data['main_test_id'])) {
//                    foreach ($data['main_test_id'] as $d) {
//                        //add test to requested tests
//                        $main = MainTest::with('childtests')->find($d);
//                        $price = $main->price;
//                        $endurance = 0;
//                        if ($patient->company_id != null){
//                            /** @var Company $patient_company */
//                            $patient_company =  $patient->company;
//                            $patient_company->load('tests');
//                            $test =  $patient_company->tests->filter(function($item) use($d){
//                                return $item->id == $d;
//                            })->first();
//                            $price =   $test->pivot->price;
//                            if ($test->pivot->endurance_static > 0) {
//                                // alert('s')
//                                $endurance = $test->pivot->endurance_static;
//                            } else {
//                                if ($test->pivot->endurance_percentage > 0) {
//                                    $endurance =
//                                        ($price * $test->pivot->endurance_percentage) / 100;
//                                } else {
//                                    $endurance = ($price * $patient_company->lab_endurance) / 100;
//                                }
//                            }
//
//                        }
//                        $lr = LabRequest::create(['pid' => $patient->id, 'main_test_id' => $d, 'price' => $price, 'user_requested' => $user->id,'endurance'=>$endurance]);
//                        //                $patient->labrequests()->attach($d);
//                        //add test with their children to requested results
//                        /** @var ChildTest $childTest */
//                        foreach ($main->childTests as $childTest) {
//                            $id = $childTest->id;
//                            $normal_range = $childTest->normalRange;
//                            $requested_result = new RequestedResult(['child_test_id' => $id, 'normal_range' => $normal_range, 'patient_id' => $patient->id, 'main_test_id' => $d]);
//                            $lr->requested_results()->save($requested_result);
//                            //                    $patient->requestedResults()->attach($d,['child_test_id'=>$id,'normal_range'=>$normal_range]);
//                        }
//
//                    }
//                } else {
//                    $patient->labrequests()->attach($data['main_test_id']);
//                    //add test with their children to requested results
//                    $main = MainTest::with('childtests')->find($data['main_test_id']);
//                    /** @var ChildTest $childTest */
//                    foreach ($main->childTests as $childTest) {
//                        $id = $childTest->child_test_id;
//                        $normal_range = $childTest->normalRange;
//                        $patient->requestedResults()->attach($data['main_test_id'], ['child_test_id' => $id, 'normal_range' => $normal_range]);
//                    }
//
//                }
//            });
//        } catch (\Throwable $e) {
//            return ['status' => false, 'message' => $e->getMessage()];
//
//        }
//
//        return ['status' => true,'patient'=>$patient->fresh()];
//
//    }

    public function destroy(Request $request,LabRequest $labRequest,Doctorvisit $doctorVisit)
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
            return ['status' => false, 'message' => $e->getMessage()];
        }
        return ['status' => true,  'data'=>$doctorVisit->fresh()];


    }
    public function destroyLab(Request $request,LabRequest $labRequest)
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
            return ['status' => false, 'message' => $e->getMessage()];
        }
        return ['status' => true, 'data' => $labRequest->patient ];


    }

    public function all(Request $request, Patient $patient)
    {
        return $patient;
    }
}
