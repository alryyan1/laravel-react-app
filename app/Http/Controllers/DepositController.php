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



    public function defineItemToLastDeposit(Request $request , Item $item){
        $deposit_item = new DepositItem([
            'item_id' => $item->id,
            'cost'=>$item->cost_price,
            'quantity'=>0,
            'free_quantity'=>0,
            'vat_cost'=>0,
            'vat_sell'=>0,
            'sell_price'=>$item->sell_price,

            'notes'=>'',
            'expire'=>$item->expire,
            'barcode'=>$item->barcode,
            'batch'=>$item->batch,
            'user_id'=>\Auth::user()->id,
            'created_at'=>now()
        ]);
       $deposit =  Deposit::latest()->first();
      ;
       return ['satus'=> $deposit->items()->save($deposit_item) , 'deposit'=>$deposit->fresh()];
    }
    public function updateDeposit(Request $request , Deposit $deposit){
        $data = $request->all();

        return ['status'=>$deposit->update([$data['colName'] => $data['val']]),'data'=>$deposit->load('items')];
    }
    public function pay(Request $request,Deposit $deposit)
    {
        $deposit->update(['paid'=>!$deposit->paid]);
        return ['status'=>true,'data'=>$deposit->fresh()];
    }
    public function updateDepositItem(Request $request , DepositItem $depositItem)
    {
        $data = $request->all();


        return ['status'=>$depositItem->update([$data['colName']=>$data['val']]),'data'=>$depositItem->load('item'),'deposit'=>$depositItem->deposit->load(['items','items.item'])];
    }
    public function uploadExcelToDeposit(Request $request,Deposit $deposit){
        $deletedCount  = 0 ;
        $items_added  = 0 ;
        $data =  collect($request->get('jsonData'));
        foreach ($data as $d){
            $barcode =  $d['barcode'] ?? null;
            $market_name =  $d['market_name'];
            $pack_size =  $d['pack_size'] ?? '';
            $cost =  $d['cost'] ?? 0;
            if (isset($d['approved_rp'])){
                $sell =  $d['approved_rp'];

            }else{
                $sell =  $d['sell'] ?? 0;

            }
            $expire =  $d['expire'] ?? '2025-05-01';
            $active_1 =  $d['active_1'] ?? '';
            $active_2 =  $d['active_2'] ?? '';
            $active_3 =  $d['active_3'] ?? '';
            //check if item exists
            $item = false;
            if ($barcode != null && $barcode != ''){
                $item =  Item::where('barcode','=',$barcode)->first();

            }else{
                //اذا كان الدواء مافيه باركود نبحث بالاسم
                $item =  Item::where('market_name','=',$market_name)->first();



            }

            if ($item){
                continue;
               //item is exists
               //add item to  selected deposit
//               $deposit_item = new DepositItem([
//                   'item_id' => $item->id,
//                   'cost'=>$cost ?? 0,
//                   'quantity'=>0,
//                   'free_quantity'=>0,
//                   'vat_cost'=>0,
//                   'vat_sell'=>0,
//                   'sell_price'=>$sell ?? 0,
//                   'notes'=>'',
//                   'expire'=> $expire ,
//                   'barcode'=>$barcode,
//                   'batch'=>'',
//                   'user_id'=>\Auth::user()->id,
//                   'created_at'=>now()
//               ]);
//               $deposit->items()->save($deposit_item);
           }else{


               // نشوف التشابه

               /** @var Item $item */
               $item = Item::create(['market_name' => $market_name , 'section_id' => null, 'require_amount' => 0, 'initial_balance' => 0, 'tests' => 0, 'unit' => 0, 'active1' => $active_1 , 'active2' => $active_2 , 'active3' => $active_3
                   , 'initial_price' =>0 , 'approved_rp'=>$sell,'strips'=>1,'pack_size'=>$pack_size]);
                if ($item){
                    $items_added++;
                }
//               $deposit_item = new DepositItem([
//                   'item_id' => $item->id,
//                   'cost'=>$cost ?? 0,
//                   'quantity'=>0,
//                   'free_quantity'=>0,
//                   'vat_cost'=>0,
//                   'vat_sell'=>0,
//                   'sell_price'=>$sell ?? 0,
//                   'notes'=>'',
//                   'expire'=>$expire ,
//                   'barcode'=>$barcode,
//                   'batch'=>'',
//                   'user_id'=>\Auth::user()->id,
//                   'created_at'=>now()
//               ]);
//               $deposit->items()->save($deposit_item);

           }

        }
         $data =  DepositItem::with('item')-> where('deposit_id','=',$deposit->id)->paginate(7);
        return ['status'=>true,'data'=>$data,'deletedCount'=>$deletedCount,'addedCount'=>$items_added];
    }
    public function defineAllItemsToDeposit(Request $request , Deposit $deposit)
    {


       $items =  Item::all();
       /** @var Item $item */
        foreach ($items as $item) {
            if (!$item->id > 140) continue;
            $pdo =   DB::getPdo();
             $result =   $pdo->prepare("select * from deposit_items where item_id = ? and deposit_id = ? ");
              $result->execute([$item->id,$deposit->id]);
              if ($result->rowCount() > 0){
                  continue ;

              }
            $deposit_item = new DepositItem([
                'item_id' => $item->id,
                'cost'=>$item->cost_price,
                'quantity'=>0,
                'free_quantity'=>0,
                'vat_cost'=>0,
                'vat_sell'=>0,
                'sell_price'=>$item->sell_price ?? 0,

                'notes'=>'',
                'expire'=>$item->expire,
                'barcode'=>$item->barcode,
                'batch'=>$item->batch,
                'user_id'=>\Auth::user()->id,
                'created_at'=>now()
            ]);
            $deposit->items()->save($deposit_item);

        }
        $data =             DepositItem::with('item')->where('deposit_id',$deposit->id)->paginate(7);

        return ['success'=>true,'deposit'=>$data];
    }
    public function allDeposits(){
//        return Deposit::with(['items','items.item'])->orderByDesc('id')->with('supplier')->get();
        return Deposit::orderByDesc('id')->with('supplier')->get();
    }
    public function getDepositsByDate(Request $request){
        $data = $request->all();
//        $date = Carbon::parse($data['date']);
//        return $date;
        $data =  Deposit::with('item')->WhereDate('created_at','=',$data['date'])->get();
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
        return Deposit::with('supplier')->latest()->first();
    }
    public function getDepositWithItems(Request $request,Deposit $deposit){
        return $deposit->load(['items','items.item']);
//        return $deposit;
    }  public function getDepositWithItemsAndSummery(Request $request,Deposit $deposit){
         $deposit->load(['items','items.item']);
//         $deposit->getSummery();
         return $deposit;
    }
    public function newDeposit(Request $request){
        $data = $request->all();
        $user =  auth()->user();


        if ($user->can('انشاء فاتوره')) {
            $data  =  Deposit::create(['bill_number'=>$data['bill_number'],'bill_date'=>$data['bill_date'],'supplier_id'=>$data['supplier_id'] ,'complete'=>false,'user_id'=>$user->id]);
        return ['status' =>$data , 'data'=>  $data->fresh()->load('supplier')] ;
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
    public function depositSummery(Request $request , Deposit $deposit){
        return $deposit->purchaseSummery();
    }
    public function deposit(Request $request , Deposit $deposit){
        $data = $request->all();
        $user =  auth()->user();
        if ($user->can('اضافه للمخزون')) {
        $data = $request->all();
        $item =  Item::find($data['item_id']);
//        return $data['expire'];
        $expire_date =  $data['expire'];
        $deposit_item = new DepositItem();
        $depositItem=   DepositItem::create([
            'item_id' => $data['item_id'],
            'cost'=>$data['cost_price'] ?? 0,
            'quantity'=>$data['quantity'],
            'notes'=>$data['notes'],
            'expire'=>$expire_date,
            'barcode'=>$data['barcode'],
            'batch'=>$data['batch'],
            'free_quantity'=>$data['free_quantity'],
            'vat_cost'=>0,
            'vat_sell'=>0,
            'sell_price'=>$data['sell_price'] ?? 0,
            'user_id'=>\Auth::user()->id,
            'created_at'=>now(),
            'deposit_id'=>$deposit->id
        ]);
//        $deposit->items()->save($deposit_item);

        return ['status'=>true,'data'=>$depositItem->load('item')];
        }else{
            return \response(['status' => false,'message'=>'صلاحيه اضافه للمخزون  غير مفعله'],400);
        }
    }
    public function destroy(Request $request,DepositItem $depositItem){
        $data = $request->all();
       ;
        return ['status'=> $depositItem->delete(),'deposit'=>$depositItem->deposit->load(['items','items.item'])];
    }
    public function destroyDeposit(Request $request,Deposit $deposit){
        $user =  auth()->user();


        if ($user->can('حذف فاتوره')) {

        return ['status'=>$deposit->delete()];
        }else{
            return \response(['status' => false,'message'=>'صلاحيه حذف فاتوره  غير مفعله'],400);
        }

    }
}
