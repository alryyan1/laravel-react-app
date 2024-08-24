<?php

namespace App\Http\Controllers;

use App\Models\Deduct;
use App\Models\DeductedItem;
use App\Models\Deposit;
use App\Models\DepositItem;
use App\Models\DepositItems;
use App\Models\Item;
use App\Models\Patient;
use App\Models\PrescribedDrug;
use App\Models\Shift;
use DB;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use PDF;
class ItemController extends Controller
{
    public function addSell(Request $request)
    {
            $user = auth()->user();
            $count =  Deduct::all()->count();
            $shift_id = Shift::max('id');
            if ($count == 0){
                Deduct::create(['shift_id'=>$shift_id,'user_id'=>$user->id]);
            }
//            $deduct =  Deduct::latest()->first();
              $deduct =  Deduct::find($request->deduct_id);
            $id =  Shift::max('id');
            if ($request->has('product_id')){

                $product_id = $request->get('product_id');
                    $deductedItem =  DeductedItem::where('item_id',$product_id)->where('shift_id',$id)->where('deduct_id',$deduct->id)->first();
                    $item =  Item::find($product_id);
                    if ($deductedItem){
                        $deductedItem->update(['strips'=>Db::raw("`strips` +     $item->strips"),'box'=>Db::raw("`box` +     1")]);
                    }else{
                        DeductedItem::create(['deduct_id'=>$deduct->id,'item_id'=>$product_id,'strips'=>   $item->strips,'shift_id'=>$id,'user_id'=>$user->id,'price'=>$item->sell_price,'box'=>1]);
                }
            }else{
                foreach ($request->get('selectedDrugs' ) as $drug_id){
                    $deductedItem =  DeductedItem::where('item_id',$drug_id)->where('shift_id',$id)->where('deduct_id',$deduct->id)->first();
                    $item =  Item::find($drug_id);
                    if ($deductedItem){
                        $deductedItem->update(['strips'=>Db::raw("`strips` +     $item->strips"),'box'=>Db::raw("`box` +     1")]);
                    }else{

                        DeductedItem::create(['deduct_id'=>$deduct->id,'item_id'=>$drug_id,'strips'=>   $item->strips,'shift_id'=>$id,'user_id'=>$user->id,'price'=>$item->last_deposit_item->finalSellPrice,'box'=>1]);

                    }
                }
            }

            return ['status'=>true,'data'=> $deduct->fresh(),'shift'=>$deduct->shift];
    }
    public function addPrescribtion(Request $request,Patient $patient)
    {
            $user = auth()->user();
        $doctor_id = $request->get('doctor_id');

            if ($request->has('product_id')){

                $product_id = $request->get('product_id');

                        PrescribedDrug::create(['patient_id'=>$patient->id,'item_id'=>$product_id,'doctor_id'=>   $doctor_id]);
            }else{
                foreach ($request->get('selectedDrugs' ) as $drug_id){
                    PrescribedDrug::create(['patient_id'=>$patient->id,'item_id'=>$drug_id,'doctor_id'=>   $doctor_id]);
                }
            }

            return ['status'=>true,'patient'=>$patient->fresh()];
    }

    public function expireMonthPanel()
    {
        $month = Carbon::now()->month;
        $date_f = Carbon::now()->addDay()->format('Y-m-d');
        $now =  Carbon::now();
        $now2 =  Carbon::now();
        $start_date =  $now->setMonth($month)->setDay(1);
        $end_date = $now2->setMonth($month)->setDay(1)->addMonths(11)->lastOfMonth();
        $dates = [];
        $data = [];
        while ($start_date <= $end_date) {


            $start_of_month = Carbon::parse($start_date)->setDay(1)->format('Y-m-d');
            $end_of_month =  Carbon::parse($start_date)->lastOfMonth()->format('Y-m-d');
            $pdo = DB::getPdo();
            $items =  $pdo->query("select * from items where expire between '$start_of_month'  and '$end_of_month' ")->fetchAll();
            $data[] =[
              'firstofMonth'=>$start_of_month,
              'lastofmonth'=>$end_of_month,
              'items'=>$items,
                'monthname'=>Carbon::parse($start_date)->setDay(1)->monthName,
                'year'=>Carbon::parse($start_date)->setDay(1)->year,
            ];
            $start_date->addMonths(1);

        }
        return ['month'=>$month,'start'=>$start_date,'end'=>$end_date,'data'=>$data];

    }
    public function balance()
    {
        $items = \App\Models\Item::all();
        foreach ($items as $item) {
            $total_deposit = DB::table('deposit_items')->select(Db::raw('sum(quantity) as total'))->where('item_id', $item->id)->value('total');
            $total_deduct = DB::table('deducted_items')->select(Db::raw('sum(quantity) as total'))->where('item_id', $item->id)->value('total');
            $item->totaldeposit = $total_deposit;
            $item->totaldeduct = $total_deduct;
            $item->remaining = $total_deposit - $total_deduct;
        }
        return $items;
    }
    public function state(Request $request,$item_id)
    {
        $month = $request->get('month');
        $date_f = Carbon::now()->addDay()->format('Y-m-d');
        $now =  Carbon::now();
        $now2 =  Carbon::now();
        $start_date =  $now->setMonth($month)->setDay(1);
        $end_date = $now2->setMonth($month)->setDay(1)->addMonth();
        $dates = [];
        while ($start_date <= $end_date) {
            $first_day_last_month =   $start_date->format('Y-m-d');

//         dd($first_day_last_month);

            $deposits =  Deposit:: whereDate('bill_date',$first_day_last_month)->get();
            $total_deposits = 0;
            /** @var Deposit $deposit */
            foreach ($deposits as $deposit) {
//                $deposit->load(['items'=>function ($query) use($item_id) {
//                    $query->where('deposit_items.item_id',$item_id);
//                }]);
                /** @var DepositItem $deposit_item */
                foreach ($deposit->items as $deposit_item){
                    if ($deposit_item->item_id == $item_id){
                        $total_deposits+= $deposit_item->quantity;

                    }
                }
            }
            $deducts =  \App\Models\Deduct:: whereDate('created_at',$first_day_last_month)->get();
            $total_deducts = 0;
            $box_deducted = 0;
            /** @var \App\Models\Deduct $deduct */
            foreach ($deducts as $deduct) {
//                $deduct->load(['items'=>function ($query) use($item_id)  {
//                    $query->where('deducted_items.item_id',$item_id);
//                }]);
                foreach ($deduct->deductedItems as $deductItem) {
                    if ($deductItem->item_id == $item_id) {

                        $box_deducted += $deductItem->box;
                    }
                }
//                $total_deducts+= $deduct->items->sum('pivot.quantity');
            }
            $dates [] = ['date'=>$first_day_last_month,'income'=>$total_deposits,'deducts'=>$box_deducted];
            $start_date->addDay();
        }
//    dd($first_day_last_month);
        return $dates;
    }
    public function stateByMonth(Request $request,$item_id)
    {
        $month = $request->get('month');
        $now =  Carbon::now();
        $now2 =  Carbon::now();
        $start_date =  $now->setMonth($month)->setDay(1);
        $end_date = $now2->setMonth($month)->setDay(1)->addMonth();
        $dates = [];
        $i = 0;
        while ($start_date <= $end_date) {
            $i++;
            $first_day_last_month =   $start_date->format('Y-m-d');

//         dd($first_day_last_month);

            $deposit_items =  Deposit:: whereDate('bill_date',$first_day_last_month)->get();
            $total = 0;
            /** @var Deposit $deposit */
            foreach ($deposit_items as $deposit) {
                $deposit->load(['items'=>function ($query) use($item_id) {
                    $query->where('deposit_items.item_id',$item_id);
                }]);
                $total+= $deposit->items->sum('pivot.quantity');
            }
            $deducts =  \App\Models\Deduct:: whereDate('created_at',$first_day_last_month)->get();
            $total_deducts = 0;
            /** @var \App\Models\Deduct $deduct */
            foreach ($deducts as $deduct) {
                $deduct->load(['items'=>function ($query) use($item_id)  {
                    $query->where('deducted_items.item_id',$item_id);
                }]);
                $total_deducts+= $deduct->items->sum('pivot.quantity');
            }
            $dates [] = ['date'=>$first_day_last_month,'income'=>$total,'deducts'=>$total_deducts];
            $start_date->addDay();

        }
//    dd($first_day_last_month);
        return $dates;
    }

    public function paginate(Request $request,$page)
    {
        $data  = $request->all();
        if (isset($data['word'])){
            $name  = $data['word'];
            $items = \App\Models\Item::where('name','like',"%$name%")->orWhere('sc_name','like',"%$name%")->orWhere('market_name','like',"%$name%")->orWhere('barcode','like',"%$name%")->paginate($page);

        }else{
            $items = \App\Models\Item::orderByDesc('id')->paginate($page);

        }
        /** @var Item $item */
        foreach ($items as $item) {
            $total_deposit = DB::table('deposit_items')->select(Db::raw('sum(quantity) as total'))->where('item_id', $item->id)->where('return','=',0)->value('total');
            $total_deduct = DB::table('deducted_items')->select(Db::raw('sum(box) as total'))->where('item_id', $item->id)->value('total');
            $item->totaldeposit = $total_deposit;

            $item->totaldeduct = $total_deduct;
            $item->remaining = $total_deposit - $total_deduct;
        }
        return $items;
    }
    public function withItemRemaining()
    {
        $items = \App\Models\Item::orderByDesc('id')->get();

        /** @var Item $item */
        foreach ($items as $item) {
            $total_deposit = DB::table('deposit_items')->select(Db::raw('sum(quantity) as total'))->where('item_id', $item->id)->value('total');
            $total_deduct = DB::table('deducted_items')->select(Db::raw('sum(box) as total'))->where('item_id', $item->id)->value('total');

            $item->totaldeposit = $total_deposit;
            $item->totaldeduct = $total_deduct;
            $item->remaining = $total_deposit - $total_deduct + $item->initial_balance;
        }
        return $items;
    }
    public function pie(Request $request,$section)
    {

        $items = \App\Models\Item::orderByDesc('id')->where('section_id',$section)->get();

        /** @var Item $item */
        foreach ($items as $item) {
            $total_deposit = DB::table('deposit_items')->select(Db::raw('sum(quantity) as total'))->where('item_id', $item->id)->value('total');
            $total_deduct = DB::table('deducted_items')->select(Db::raw('sum(box) as total'))->where('item_id', $item->id)->value('total');
            $item->totaldeposit = $total_deposit;
            $item->totaldeduct = $total_deduct;
            $item->remaining = $total_deposit - $total_deduct + $item->initial_balance;
        }
        return $items;
    }

    public function create(Request $request)
    {
        $user =  auth()->user();
        if ($user->can('اضافه صنف')) {
            $data = $request->all();
//        return $data;
            $result = Item::create(['market_name' => $data['market_name'], 'section_id' => $data['section'], 'require_amount' => $data['require_amount'], 'initial_balance' => $data['initial_balance'], 'tests' => $data['tests'], 'unit' => $data['unit']
                , 'initial_price' => $data['initial_price']]);
            return ['status' => $result];
        }else{
            return response(['status' => false,'message'=>'صلاحيه اضافه الاصناف غير مفعله'],400);

        }
    }

    public function all(Request $request)
    {
        $items =  Item::orderByDesc('id')->with('section')->get();
        /** @var Item $item */
        foreach ($items as $item) {
            $total_deposit = DB::table('deposit_items')->select(Db::raw('sum(quantity) as total'))->where('item_id', $item->id)->value('total');
            $total_deduct = DB::table('deducted_items')->select(Db::raw('sum(box) as total'))->where('item_id', $item->id)->value('total');
            $item->totaldeposit = $total_deposit;

            $item->totaldeduct = $total_deduct;
            $item->remaining = $total_deposit - $total_deduct;
        }
        return $items;
    }
    public function pagination(Request $request)
    {
        $user =  auth()->user();


        if ($user->can('عرض الاصناف')) {
        $item =  $request->item;

        if ( $request->query('word') && $request->query('word') != ''){
            $word = $request->query('word');

            return collect( Item::with('section','category','type')->orderByDesc('id')->orWhere('name','like',"%$word%")->orWhere('sc_name','like',"%$word%")->orWhere('market_name','like',"%$word%")->orWhere('barcode','like',"%$word%")->paginate($item));
        }
        return collect( Item::with('section','category','type')->orderByDesc('id')->paginate($item));

        }else{
            return \response(['status' => false,'message'=>'صلاحيه عرض الاصناف غير مفعله'],400);

        }
    }

    public function destroy(Request $request, Item $item)
    {
        $user =  auth()->user();


        if ($user->can('حذف الاصناف')) {
            return ['status' => $item->delete()];
        }else{
            return \response(['status' => false,'message'=>'صلاحيه حذف الاصناف غير مفعله'],400);

        }
    }

    public function update(Request $request, Item $item)
    {
       $user =  auth()->user();
       if ($user->can('تعديل صنف')){
           $data = $request->all();
//        return $data;

           return ['status' => $item->update([$data['colName'] => $data['val']])];
       }else{
           return \response(['status' => false,'message'=>'صلاحيه تعديل الاصناف غير مفعله'],400);
       }


    }

    public function report()
    {


    }
}
