<?php

namespace App\Http\Controllers;

use App\Models\Deduct;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class DeductController extends Controller
{
    public function deleteDeduct(Request $request ,Deduct $deduct)
    {
        $user =  auth()->user();


        if ($user->can('حذف اذن طلب')) {
        $deduct->delete();
        return ['success' => true];
        }else{
            return \response(['status' => false,'message'=>'صلاحيه  حذف اذن طلب غير مفعله'],400);
        }
    }
    public function showDeductById(Request $request,Deduct $deduct){

        return ['data'=>$deduct , 'status'=>true];
    }
    public function getDeductsByDate(Request $request){
        $data = $request->all();
        $date = $data['date'];
        $data =  Deduct::WhereDate('created_at','=',$date)->get();
        return ['data'=>$data , 'status'=>true];
    }
    public function destroy(Request $request){

        $item_id =  $request->query('item_id');
        $deduct = Deduct::latest()->first();
        $deduct->items()->detach($item_id);
        return ['status'=>true,'deduct'=>$deduct->refresh()];

    }
    public function deduct(Request $request){
        $user =  auth()->user();


        if ($user->can('اذن طلب')) {
        $data = $request->all();
//        return $data;
        $item_id = $data['item_id'];
        $count =  Deduct::all()->count();
        if ($count == 0){
            Deduct::create();

        }
        $deposit =  Deduct::latest()->first();
        $deposit->items()->attach($item_id,[
            'quantity'=>$data['quantity'],
            'client_id'=>$data['client_id'],
            'created_At'=>now()
        ]);
        return ['status'=>true];
        }else{
            return \response(['status' => false,'message'=>'صلاحيه  اذن طلب  غير مفعله'],400);
        }
    }
    public function last(){
             return  Deduct::with('items.pivot.client')->latest()->first()    ;
    }
    public function complete(){
        $user =  auth()->user();


        if ($user->can('اذن صرف')) {
        return ['status' => Deduct::create()] ;
        }else{
            return \response(['status' => false,'message'=>'صلاحيه  اذن صرف  غير مفعله'],400);
        }

    }
}
