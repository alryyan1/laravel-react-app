<?php

namespace App\Http\Controllers;

use App\Models\Deduct;
use App\Models\DeductedItem;
use App\Models\DepositItem;
use App\Models\Item;
use App\Models\Patient;
use App\Models\Shift;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class DeductController extends Controller
{
    public function searchDeductsByDate(Request $request){
        $data = $request->all();
        $first = Carbon::createFromFormat('Y/m/d', $data['first'])->startOfDay();
        $second = Carbon::createFromFormat('Y/m/d', $data['second'])->endOfDay();
        return Deduct::whereBetween('created_at',[$first,$second])->get();
    }
    public function update(Request $request,Deduct $deduct){
        $data = $request->all();


        return ['status'=>$deduct->update([$data['colName']=>$data['val']]),'data'=>$deduct->fresh()];
    }
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
    public function deduct(Request $request,Deduct $deduct){
        $user =  auth()->user();

        $shift_id = Shift::max('id');
        if ($user->can('اذن طلب')) {
        $data = $request->all();
//        return $data;
        $item_id = $data['item_id'];
        $count =  Deduct::all()->count();
        if ($count == 0){
//            return ['status'=>true];
            Deduct::create(['shift_id'=>$shift_id]);

        }


        DeductedItem::create([
            'item_id'=>$item_id,
            'deduct_id'=>$deduct->id,
            'user_id'=>$user->id,
            'shift_id'=>$shift_id,
            'box'=>$data['box'],
            'client_id'=>$data['client_id'],
            'created_At'=>now()
        ]);

        return ['status'=>true,'deduct'=>$deduct->fresh()];
        }else{
            return \response(['status' => false,'message'=>'صلاحيه  اذن طلب  غير مفعله'],400);
        }
    }
    public function last(){
             return  Deduct::with('deductedItems.client')->latest()->first()    ;
    }
    public function complete(Request $request ,Deduct $deduct){
        $id =  Deduct::max('id');
        $deduct->update(['complete'=>1]);

        if ($id == $deduct->id){
            return $this->newDeduct($request);
        }else{

            return ['data' => $deduct->fresh(), 'shift' => $deduct->shift];

        }

    }
    public function payment(Request $request ,Deduct $deduct){
        $deduct->update(['payment_type_id'=>$request->payment]);
        return ['status' =>true,'data'=> $deduct->fresh(),'shift'=>$deduct->shift->fresh()] ;

    }
    public function cancel(Request $request ,Deduct $deduct){
        $deduct->update(['complete'=>0]);
        return ['status' =>true,'data'=> $deduct->fresh(),'shift'=>$deduct->shift->fresh()] ;

    }
    public function newDeduct(Request $request )
    {
        $user = auth()->user();
        $shift_id = Shift::max('id');
        $deduct = Deduct::create(['shift_id' => $shift_id, 'user_id' => $user->id]);
        $shift = Shift::latest()->first();
        $is_sell = $request->query('is_sell') ? 1 : 0;

        if ($shift->touched == 0) {
            $deduct->number = 1;
            $shift->touched = 1;
            $shift->save();
            $deduct->is_sell = $is_sell;
            $deduct->save();
        } else {
            $max_lab_no = Deduct::where('shift_id', $shift->id)->max('number');
            $max_lab_no++;
            $deduct->number = $max_lab_no;
            $deduct->is_sell = $is_sell;

            $deduct->save();
        }
        return ['status' => true, 'data' => $deduct->fresh(), 'shift' => $deduct->shift];

    }

}
