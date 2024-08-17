<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function destroy(Request $request , Supplier $supplier){
        $user =  auth()->user();


        if ($user->can('حذف مورد')) {


        return ['status'=>$supplier->delete()];
        }else{
            return \response(['status' => false,'msg'=>'صلاحيه حذف مورد غير مفعله'],400);

        }
    }
    public  function index(){
        return Supplier::all();
    }
    public function create(Request $request){
        $user =  auth()->user();


        if ($user->can('اضافه مورد')) {
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
        }else{
            return \response(['status' => false,'msg'=>'صلاحيه اضافه مورد غير مفعله'],400);

        }
    }
    public function update(Request $request , Supplier $supplier){
        $user =  auth()->user();


        if ($user->can('تعديل مورد')) {

            $data = $request->all();
//        return $data;

        return ['status'=>$supplier->update([$data['colName']=>$data['val']])];
        }else{
            return \response(['status' => false,'msg'=>'صلاحيه تعديل مورد غير مفعله'],400);

        }
    }
}
