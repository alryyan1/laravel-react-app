<?php

namespace App\Http\Controllers;

use App\Models\Deposit;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class DepositController extends Controller
{
    public function getDepositsByDate(Request $request){
        $data = $request->all();
        $date = Carbon::parse($data['date']);
        $data =  Deposit::WhereDate('bill_date','=',$date)->get();
        return ['data'=>$data , 'status'=>true];
    }
    public function getDepositBySupplier(Request $request){
        $data = $request->all();
        $data =  Deposit::where('supplier_id',$data['supplier_id'])->get();
        return ['data'=>$data , 'status'=>true];
    }
    public function getDepositById(Request $request,Deposit $deposit){
//        return $deposit

//        return  Deposit::with('items.pivot.supplier')->get()->find(1);


        return ['data'=>$deposit , 'status'=>true];
    }
    public function last(Request $request){
        return Deposit::with('items','supplier')->latest()->first();
    }
    public function complete(Request $request){
        $data = $request->all();
//        return $data;
        return ['status' => Deposit::create(['bill_number'=>$data['bill_number'],'bill_date'=>$data['bill_date'],'supplier_id'=>$data['supplier_id'] ,'complete'=>false])] ;
    }
    public function finish(Request $request,Deposit $deposit){
        $deposit->complete = true;
        $deposit->save();
        return ['status'=>true];
    }
    public function getDepoistByInvoice(Request $request){
        $data  = $request->all();
        return Deposit::where('bill_number',$data['bill_number'])->get();
    }
    public function deposit(Request $request ){
        $data = $request->all();
        $item_id = $data['item_id'];
        $expire_date =  Carbon::parse($data['expire']);
        $deposit =  Deposit::latest()->first();
        $deposit->items()->attach($item_id,[
            'price'=>$data['price'],
            'quantity'=>$data['quantity'],
            'notes'=>$data['notes'],
            'expire'=>$expire_date,
            'barcode'=>$data['barcode'],
            'batch'=>$data['batch'],
            'user_id'=>\Auth::user()->id,
            'created_at'=>now()
        ],touch:true);
        return ['status'=>true];
    }
    public function destroy(Request $request){
        $data = $request->all();
        $item_id = $data['item_id'];
        $deposit = Deposit::latest()->first();
        $deposit->items()->detach($item_id);
        return ['status'=>true];
    }
}