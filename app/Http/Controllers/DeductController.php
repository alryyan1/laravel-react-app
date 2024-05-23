<?php

namespace App\Http\Controllers;

use App\Models\Deduct;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class DeductController extends Controller
{
    public function deleteDeduct(Request $request ,Deduct $deduct)
    {
        $deduct->delete();
        return ['success' => true];
    }
    public function showDeductById(Request $request,Deduct $deduct){

        return ['data'=>$deduct , 'status'=>true];
    }
    public function getDeductsByDate(Request $request){
        $data = $request->all();
        $date = Carbon::parse($data['date']);
        $data =  Deduct::WhereDate('created_at','=',$date)->get();
        return ['data'=>$data , 'status'=>true];
    }
    public function destroy(Request $request){
        $data = $request->all();
//        return $data;
        $item_id =  $data['item_id'];
        $deduct = Deduct::latest()->first();
        $deduct->items()->detach($item_id);
        return ['status'=>true];
    }
    public function deduct(Request $request){
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
    }
    public function last(){
             return  Deduct::with('items.pivot.client')->latest()->first()    ;
    }
    public function complete(){
        return ['status' => Deduct::create()] ;

    }
}
