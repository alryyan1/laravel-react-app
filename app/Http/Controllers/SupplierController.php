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
        $email = '';
        if (isset($data['email'])){
            $email = $data['email'];
        }

        $result = Supplier::create([
            'name'=>$data['name'],
            'phone'=>$data['phone'],
            'address'=>$data['address'],
            'email'=>$email,

        ]);
        return ['status'=> $result->id];
    }
    public function update(Request $request , Supplier $supplier){
        $data = $request->all();
//        return $data;

        return ['status'=>$supplier->update([$data['colName']=>$data['val']])];
    }
}
