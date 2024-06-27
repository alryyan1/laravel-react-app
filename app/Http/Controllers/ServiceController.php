<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServiceFormRequest;
use App\Models\Company;
use App\Models\Doctorvisit;
use App\Models\Patient;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ServiceController extends Controller
{
    public function destroy(Request $request   , Service $service)
    {
        return ['status'=>$service->delete()];
    }
    public function pay(Request $request , Doctorvisit $doctorvisit)
    {
        $id =  $request->get('service_id');
        $requested_service = $doctorvisit->services()->firstWhere('requested_service.service_id', $id);
        $price =  $requested_service->price * $requested_service->pivot->count;
        $amount_paid = 0 ;
        if ($doctorvisit->patient->company_id != null){
            /** @var Company $patient_company */
            $patient_company =  $doctorvisit->patient->company;
            $patient_company->load('services');
            $service =  $patient_company->services->filter(function($item) use($id){
                return $item->id == $id;
            })->first();


            $amount_paid =   ($service->pivot->price * $requested_service->pivot->count) * $doctorvisit->patient->company->service_endurance /100;

        }else{
            $discount =  $requested_service->pivot->discount;
            $discount_amount = ($price * $discount )/ 100;
            $amount_paid = $price - $discount_amount;
        }

        $doctorvisit->services()->updateExistingPivot($id, ['is_paid' => 1,'amount_paid' => $amount_paid]);
        return ['status' => true,'patient'=> $doctorvisit->load(['services','services.pivot.user'])];

    }
    public function bank(Request $request , Doctorvisit $doctorvisit)
    {
        $id =  $request->get('service_id');
        $val =  $request->get('val');

        $doctorvisit->services()->updateExistingPivot($id, ['bank' => $val]);
        return ['status' => true,'patient'=> $doctorvisit->load(['services','services.pivot.user'])];

    }
    public function cancel(Request $request , Doctorvisit $doctorvisit)
    {
        $id =  $request->get('service_id');
        $doctorvisit->services()->updateExistingPivot($id, ['is_paid' => 0,'amount_paid' => 0,'discount' => 0,'count'=>1]);
        return ['status' => true,'patient'=> $doctorvisit->load(['services','services.pivot.user'])];

    }
    public function addService(Request $request , Doctorvisit $doctorvisit){
        $data = $request->all();
//        return  $doctorvisit;

        if (is_array($data['services'])) {
            foreach ($data['services'] as $d) {
                /** @var Service $service */
                $service = Service::find($d);
                $doctorvisit->services()->attach($d,[
                    'user_id'=>auth()->user()->id,
                    'bank'=>0,
                    'price'=>$service->price,
                    'doctor_id'=>$data['doctor_id'],
                    'discount'=>0,
                    'is_paid'=>0,
                    'amount_paid'=>0,
                    'count'=>1
                ]);
            }
        } else {
            $doctorvisit->services()->attach($data['services']);


        }
        return ['status' => true,'patient'=>$doctorvisit->fresh()->load(['services','services.pivot.user'])];
    }
    public function deleteService(Request $request , Doctorvisit $doctorvisit){
        $service_id = $request->get('service_id');
        $doctorvisit->services()->detach($service_id);
         return  ['status' => true,'patient'=>$doctorvisit->load(['services','services.pivot.user'])];
    }



    public function discount(Request $request , Doctorvisit $doctorvisit){
        $data = $request->all();
        $service_id =  $data['service_id'];
        $doctorvisit->services()->updateExistingPivot($service_id,['discount'=>$data['discount']],touch:false);
        return ['status'=>true,'patient'=>$doctorvisit->load(['services','services.pivot.user'])];
    }
    public function count(Request $request , Doctorvisit $doctorvisit){
        $data = $request->all();
        $service_id =  $data['service_id'];
        $doctorvisit->services()->updateExistingPivot($service_id,['count'=>$data['serviceCount']],touch:false);
        return ['status'=>true,'patient'=>$doctorvisit->load(['services','services.pivot.user'])];
    }
    public function create(ServiceFormRequest $request){
       $service =  Service::create($request->validated());
       $companies =   Company::all();
       /** @var Company $company */
        foreach ($companies as $company){
            $company->define_service($service->id);
        }
       return ['status' => true,'service'=>$service];
    }

    public function update(Request $request, Service $service)
    {
        $data = $request->all();
        if ($data['colName'] =='percentage_wage' && $data['val'] > 100){
            return  response(['status'=>false,'msg'=>'نسبه الطبيب لا يمكن ان تكون اكبر من 100'],406) ;
        }
        return ['status' => $service->update([$data['colName'] => $data['val']])];

    }

    public function pagination(Request $request ,$page = 15)
    {

        if ( $request->has('word')){
            $word = $request->query('word');

            return collect( Service::with('service_group')->orderByDesc('id')->where('name','like',"%$word%")->paginate($page));
        }
        return collect( Service::with('service_group')->orderByDesc('id')->paginate($page));
    }
    public function all (){
        return Service::all();
    }

}
