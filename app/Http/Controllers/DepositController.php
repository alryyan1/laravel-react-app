<?php

namespace App\Http\Controllers;

use App\Models\Deposit;
use Illuminate\Http\Request;

class DepositController extends Controller
{
    public function last(Request $request){
        return Deposit::with('items.pivot.supplier')->latest()->first();
    }
    public function complete(){
        return ['status' => Deposit::create()] ;
    }
    public function deposit(Request $request ){
        $data = $request->all();
        $item_id = $data['item_id'];
        $count =  Deposit::all()->count();
        if ($count == 0){
            Deposit::create();

        }
        $date = new \DateTime($data['expire']);
        $deposit =  Deposit::latest()->first();
        $deposit->items()->attach($item_id,[
            'price'=>$data['price'],
            'quantity'=>$data['quantity'],
            'notes'=>$data['notes'],
            'expire'=>$date,
            'barcode'=>$data['barcode'],
            'batch'=>$data['batch'],
            'supplier_id'=>$data['supplier_id'],
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
