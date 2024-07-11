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
