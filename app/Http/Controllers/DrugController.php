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

           $item =  Item::create($request->all());
           if ($item){




               return ['status'=>true,'data'=>$item];
           }else{
               return ['status'=>false];

           }


    }
}
