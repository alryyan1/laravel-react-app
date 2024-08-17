<?php

namespace App\Http\Controllers;

use App\Models\Deduct;
use App\Models\DeductedItem;
use Illuminate\Http\Request;

class deductedItemController extends Controller
{
    public function update(Request $request,DeductedItem $deductedItem){
        $data = $request->all();
        if ($data['colName'] == 'discount'){
            return ['status'=>$deductedItem->update([$data['colName']=>$data['val'],'price'=>$deductedItem->item->sell_price -  ($deductedItem->item->sell_price * $data['val'])/100]),'data'=>$deductedItem->deduct,'shift'=>$deductedItem->deduct->shift];

        }

        if ($data['colName']==='box'){
            $deductedItem->update(['strips'=> $deductedItem->item->strips * $data['val']]) ;
        }else{
//            return ['box'=> $deductedItem->strips / $deductedItem->item->strips];
            $deductedItem->update(['box'=> $data['val'] / $deductedItem->item->strips]) ;

        }

        return ['status'=>$deductedItem->update([$data['colName']=>$data['val']]),'data'=>$deductedItem->deduct,'shift'=>$deductedItem->deduct->shift];
    }
    public function discount(Request $request,DeductedItem $deductedItem){
        $data = $request->all();

        return ['status'=>$deductedItem->update([$data['colName']=>$data['val']]),'data'=>$deductedItem->deduct,'shift'=>$deductedItem->deduct->shift];
    }
    public function destroy(Request $request , DeductedItem $deductedItem)
    {

        return ['status'=>$deductedItem->delete(),'data'=>$deductedItem->deduct,'shift'=>$deductedItem->deduct->shift];
    }
}
