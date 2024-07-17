<?php

namespace App\Http\Controllers;

use App\Models\Deduct;
use App\Models\DeductedItem;
use Illuminate\Http\Request;

class deductedItemController extends Controller
{
    public function update(Request $request,DeductedItem $deductedItem){
        $data = $request->all();


        return ['status'=>$deductedItem->update([$data['colName']=>$data['val']]),'data'=>$deductedItem->deduct,'shift'=>$deductedItem->deduct->shift];
    }
    public function destroy(Request $request , DeductedItem $deductedItem)
    {

        return ['status'=>$deductedItem->delete(),'data'=>$deductedItem->deduct,'shift'=>$deductedItem->deduct->shift];
    }
}
