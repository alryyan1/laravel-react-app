<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function destroy(Request $request , Client $client){
        return ['status'=>$client->delete()];
    }
    public  function index(){
        return Client::all();
    }
    public function create(Request $request){

        $data = $request->all();
//        return $data;
       $result = Client::create([
            'name'=>$data['name'],
            'phone'=>$data['phone'],
            'address'=>$data['address'],
            'email'=>$data['email'],

        ]);
       return ['status'=> $result->id];
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
