<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServiceFormRequest;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function create(ServiceFormRequest $request){
       $service =  Service::create($request->validated());
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

}
