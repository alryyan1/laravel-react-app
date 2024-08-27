<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientFormRequest;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function destroy(Request $request , Client $client){
        $user =  auth()->user();
        if ($user->can('حذف عميل')) {
        return ['status'=>$client->delete()];
        }else{
            return response(['status' => false,'message'=>'صلاحيه حذف العميل غير مفعله'],400);

        }
    }
    public  function index(){
        return Client::orderByDesc('id')->get();
    }
    public function create(ClientFormRequest $request){
//        $request->validate($request->all());
        $user =  auth()->user();
        if ($user->can('اضافه عميل')) {
        $data = $request->all();
//        return $data;
       $result = Client::create($request->all());
       return ['status'=> true, 'data' => $result];
        }else{
            return response(['status' => false,'message'=>'صلاحيه اضافه العميل غير مفعله'],400);

        }
    }
    public function edit(Request $request , Client $client){
        $data = $request->all();
        $name =  $data['name'];
        $phone =  $data['phone'];
        $address =  $data['address'];
        $email =  $data['email'];
        $client->update(['name'=>$name,'phone'=>$phone,'address'=>$address,'email'=>$email]);
    }
}
