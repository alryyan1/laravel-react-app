<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServiceFormRequest;
use App\Models\Company;
use App\Models\Patient;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function pay(Request $request , Patient $patient)
    {
        $id =  $request->get('service_id');
        $requested_service = $patient->services()->firstWhere('requested_service.service_id', $id);
        $price =  $requested_service->price * $requested_service->pivot->count;
        $discount =  $requested_service->pivot->discount;
        $discount_amount = ($price * $discount )/ 100;
        $amount = $price - $discount_amount;
        $patient->services()->updateExistingPivot($id, ['is_paid' => 1,'amount_paid' => $amount]);
        return ['status' => true,'patient'=> $patient->load(['services','services.pivot.user'])];

    }
    public function bank(Request $request , Patient $patient)
    {
        $id =  $request->get('service_id');
        $val =  $request->get('val');

        $patient->services()->updateExistingPivot($id, ['bank' => $val]);
        return ['status' => true,'patient'=> $patient->load(['services','services.pivot.user'])];

    }
    public function cancel(Request $request , Patient $patient)
    {
        $id =  $request->get('service_id');
        $patient->services()->updateExistingPivot($id, ['is_paid' => 0,'amount_paid' => 0,'discount' => 0,'count'=>1]);
        return ['status' => true,'patient'=> $patient->load(['services','services.pivot.user'])];

    }
    public function addService(Request $request , Patient $patient){
        $data = $request->all();
        if (is_array($data['services'])) {
            foreach ($data['services'] as $d) {
                /** @var Service $service */
                $service = Service::find($d);
                $patient->services()->attach($d,[
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
            $patient->services()->attach($data['services']);


        }
        return ['status' => true,'patient'=>$patient->fresh()->load(['services','services.pivot.user'])];
    }
    public function deleteService(Request $request , Patient $patient){
        $service_id = $request->get('service_id');
         $patient->services()->detach($service_id);
         return  ['status' => true,'patient'=>$patient->load(['services','services.pivot.user'])];
    }



    public function discount(Request $request , Patient $patient){
        $data = $request->all();
        $service_id =  $data['service_id'];
        $patient->services()->updateExistingPivot($service_id,['discount'=>$data['discount']],touch:false);
        return ['status'=>true,'patient'=>$patient->load(['services','services.pivot.user'])];
    }
    public function count(Request $request , Patient $patient){
        $data = $request->all();
        $service_id =  $data['service_id'];
        $patient->services()->updateExistingPivot($service_id,['count'=>$data['serviceCount']],touch:false);
        return ['status'=>true,'patient'=>$patient->load(['services','services.pivot.user'])];
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

    public function pagination(Request $request)
    {
        $item =  $request->item;

        if ( $request->has('word')){
            $word = $request->query('word');

            return collect( Service::orderByDesc('id')->where('name','like',"%$word%")->paginate($item));
        }
        return collect( Service::orderByDesc('id')->paginate($item));
    }
    public function all (){
        return Service::all();
    }

}
