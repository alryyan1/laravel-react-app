<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Doctorvisit;
use App\Models\RequestedService;
use App\Models\Service;
use Illuminate\Http\Request;

class RequestedServiceController extends Controller
{

    public function discount(Request $request , RequestedService $requestedService){
        $user =  auth()->user();
        if (!$user->can('التخفيض')) {
            return  response(['message'=>'صلاحيه    التخفيض   غير مفعله'],400);
        }
        $data = $request->all();
        $requestedService->update(['discount'=>$data['discount']]);
        return ['status'=>true,'patient'=>$requestedService->doctorVisit->fresh()];
    }
    public function bank(Request $request , RequestedService $requestedService)
    {
        $val =  $request->get('val');
        $requestedService->update( ['bank' => $val]);
        return ['status' => true,'patient'=> $requestedService->doctorVisit->fresh()];

    }


    public function cancel(Request $request , RequestedService $requestedService)
    {
        $user =  auth()->user();
        if (!$user->can('الغاء سداد خدمه')) {
            return  response(['message'=>'صلاحيه    الغاء سداد خدمه غير مفعله'],400);
        }

        $id =  $request->get('service_id');
        $requestedService->update( ['is_paid' => 0,'amount_paid' => 0,'discount' => 0,'count'=>1]);
        return ['status' => true,'patient'=> $requestedService->doctorVisit->fresh()];

    }

    public function deleteService(Request $request , RequestedService $requestedService){
        $user =  auth()->user();
        if (!$user->can('حذف خدمه')) {
            return  response(['message'=>'صلاحيه    حذف  خدمه غير مفعله'],400);
        }
        return  ['status' => $requestedService->delete(),'patient'=>$requestedService->doctorVisit->fresh()];
    }
    public function pay(Request $request , RequestedService $requestedService)
    {
        $user =  auth()->user();
        if (!$user->can('سداد خدمه')) {
            return  response(['message'=>'صلاحيه   سداد خدمه غير مفعله'],400);
        }
        $user =  auth()->user();
//        $id =  $request->get('service_id');
        $price =  $requestedService->price * $requestedService->count;
        $amount_paid = 0 ;
        if ($requestedService->doctorVisit->patient->company_id != null){
            /** @var Company $patient_company */
            $patient_company =  $requestedService->doctorVisit->patient->company;
            $patient_company->load('services');
//            return  $patient_company;
            $service =  $patient_company->services->filter(function($item) use($requestedService){
                return $item->id == $requestedService->service->id;
            })->first();
//            return $service;


            $amount_paid =   ($service->pivot->price * $requestedService->count) * $requestedService->doctorVisit->patient->company->service_endurance /100;

        }else{
            $discount =  $requestedService->discount;
            $discount_amount = ($price * $discount )/ 100;
            $amount_paid = $price - $discount_amount;
        }

        $requestedService->update(['is_paid' => 1,'amount_paid' => $amount_paid,'user_deposited'=>$user->id]);
        return ['status' => true,'patient'=> $requestedService->doctorVisit->fresh()];

    }


    public function count(Request $request , RequestedService $requestedService){
        $data = $request->all();

        return ['status'=>    $requestedService->update(['count'=>$data['serviceCount']]),'patient'=>$requestedService->doctorVisit->fresh()];
    }
    public function addService(Request $request , Doctorvisit $doctorvisit){
        $data = $request->all();

//        return  $doctorvisit;

        if (is_array($data['services'])) {
            foreach ($data['services'] as $d) {
                /** @var Service $service */
                $service = Service::find($d);
                $price = $service->price;
                if ($doctorvisit->patient->company_id != null){
                    /** @var Company $patient_company */
                    $patient_company =  $doctorvisit->patient->company;
                    $patient_company->load('services');

//            return  $patient_company;
                    $service =  $patient_company->services->filter(function($item) use($d){
                        return $item->id == $d;
                    })->first();
//            return $service;


                    $price =   $service->pivot->price;

                }
                $requested_service = new RequestedService([
                    'user_id'=>auth()->user()->id,
                    'bank'=>0,
                    'price'=>$price,
                    'doctor_id'=>$data['doctor_id'],
                    'discount'=>0,
                    'is_paid'=>0,
                    'amount_paid'=>0,
                    'count'=>1,
                    'service_id'=>$d,

                ]);
                $doctorvisit->services()->save($requested_service);

            }
        } else {
            $doctorvisit->services()->save(new RequestedService($data['requested_services']));


        }
        return ['status' => true,'patient'=>$doctorvisit->fresh()->load(['services'])];
    }
}
