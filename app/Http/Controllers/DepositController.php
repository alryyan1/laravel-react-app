<?php

namespace App\Http\Controllers;

use App\Models\Deposit;
use App\Models\DepositItem;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DepositController extends Controller
{


    public function pay(Request $request,Deposit $deposit)
    {
        $deposit->update(['paid'=>!$deposit->paid]);
        return ['status'=>true,'data'=>$deposit->fresh()];
    }
    public function updateDepositItem(Request $request , DepositItem $depositItem)
    {
        $data = $request->all();


        return ['status'=>$depositItem->update([$data['colName']=>$data['val']]),'data'=>$depositItem->fresh()];
    }
    public function defineAllItemsToDeposit(Request $request , Deposit $deposit)
    {
       $items =  Item::all();
       /** @var Item $item */
        foreach ($items as $item) {

            $pdo =   DB::getPdo();
             $result =   $pdo->prepare("select * from deposit_items where item_id = ? and deposit_id = ? ");
              $result->execute([$item->id,$deposit->id]);
              if ($result->rowCount() > 0){
                  continue ;

              }
            $deposit_item = new DepositItem([
                'item_id' => $item->id,
                'price'=>$item->cost_price,
                'quantity'=>0,
                'notes'=>'',
                'expire'=>$item->expire,
                'barcode'=>$item->barcode,
                'batch'=>$item->batch,
                'user_id'=>\Auth::user()->id,
                'created_at'=>now()
            ]);
            $deposit->items()->save($deposit_item);

        }
        return ['success'=>true,'deposit'=>$deposit->load('items')];
    }
    public function allDeposits(){
        return Deposit::orderByDesc('id')->with('supplier')->get();
    }
    public function getDepositsByDate(Request $request){
        $data = $request->all();
//        $date = Carbon::parse($data['date']);
//        return $date;
        $data =  Deposit::WhereDate('created_at','=',$data['date'])->get();
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
    public function newDeposit(Request $request){
        $data = $request->all();
        $user =  auth()->user();


        if ($user->can('انشاء فاتوره')) {

//        return $data;
        return ['status' => Deposit::create(['bill_number'=>$data['bill_number'],'bill_date'=>$data['bill_date'],'supplier_id'=>$data['supplier_id'] ,'complete'=>false,'user_id'=>$user->id])] ;
        }else{
            return \response(['status' => false,'message'=>'صلاحيه انشاء فاتوره  غير مفعله'],400);
        }
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
    public function deposit(Request $request , Deposit $deposit){
        $data = $request->all();
        $user =  auth()->user();


        if ($user->can('اضافه للمخزون')) {
        $data = $request->all();

//        return $data['expire'];
        $expire_date =  $data['expire'];
        $deposit_item = new DepositItem([
            'item_id' => $data['item_id'],
            'price'=>$data['price'],
            'quantity'=>$data['quantity'],
            'notes'=>$data['notes'],
            'expire'=>$expire_date,
            'barcode'=>$data['barcode'],
            'batch'=>$data['batch'],
            'user_id'=>\Auth::user()->id,
            'created_at'=>now()
        ]);
        $deposit->items()->save($deposit_item);

        return ['status'=>true,'deposit'=>$deposit->fresh()];
        }else{
            return \response(['status' => false,'message'=>'صلاحيه اضافه للمخزون  غير مفعله'],400);
        }
    }
    public function destroy(Request $request,DepositItem $depositItem){
        $data = $request->all();
       ;
        return ['status'=> $depositItem->delete(),'deposit'=>$depositItem->deposit];
    }
    public function destroyDeposit(Request $request,Deposit $deposit){
        $user =  auth()->user();


        if ($user->can('حذف فاتوره')) {
        $deposit->delete();
        return ['status'=>true];
        }else{
            return \response(['status' => false,'message'=>'صلاحيه حذف فاتوره  غير مفعله'],400);
        }

    }
}
