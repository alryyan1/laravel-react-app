<?php

namespace App\Http\Controllers;

use App\Models\Deposit;
use App\Models\DepositItem;
use App\Models\Drug;
use App\Models\Item;
use Illuminate\Http\Request;

class DrugController extends Controller
{

    public function update(Request $request , Drug $drug)
    {
        $data = $request->all();
        return ['status'=> $drug->update([$data['colName'] => $data['val']]) ];

    }
    public function index()
    {
        return Drug::all();
    }
    public function store(Request $request)
    {
        $data = $request->all();

           $item =  Item::create($request->all());
           if ($item){
               $item->fresh();



               if ($request->has('deposit') && $request->get('deposit' ) != null ) {
                   $deposit = Deposit::find($data['deposit']);
                   if ($deposit){

                       $deposit_item = new DepositItem([
                           'item_id' =>$item->id,
                           'cost'=>$data['cost_price'],
                           'quantity'=>$data['quantity'],
                           'notes'=>'',
                           'expire'=>'20240815',
                           'barcode'=>'',
                           'batch'=>$data['batch'],
                           'free_quantity'=>0,
                           'vat_cost'=>0,
                           'vat_sell'=>0,
                           'sell_price'=> $data['sell_price'],
                           'user_id'=>\Auth::user()->id,
                           'created_at'=>now()
                       ]);
                       $deposit->items()->save($deposit_item);               }

               }

               return ['status'=>true,'data'=>$item];
           }else{
               return ['status'=>false];

           }


    }
}
