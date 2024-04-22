<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function destroy(Request $request , Supplier $supplier){
        return ['status'=>$supplier->delete()];
    }
    public  function index(){
        return Supplier::all();
    }
    public function create(Request $request){

        $data = $request->all();
//        return $data;
        $result = Supplier::create([
            'name'=>$data['name'],
            'phone'=>$data['phone'],
            'address'=>$data['address'],
            'email'=>$data['email'],

        ]);
        return ['status'=> $result->id];
    }
    public function edit(Request $request , Supplier $client){
        $data = $request->all();
        $name =  $data['name'];
        $phone =  $data['phone'];
        $address =  $data['address'];
        $email =  $data['email'];
        $client->update(['name'=>$name,'phone'=>$phone,'address'=>$address,'email'=>$email]);
    }
}
