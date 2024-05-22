<?php

namespace App\Http\Controllers;

use App\Models\Deposit;
use App\Models\DepositItems;
use App\Models\Item;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use PDF;
class ItemController extends Controller
{
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
            $items = \App\Models\Item::where('name','like',"%$name%")->paginate($page);

        }else{
            $items = \App\Models\Item::orderByDesc('id')->paginate($page);

        }
        foreach ($items as $item) {
            $total_deposit = DB::table('deposit_items')->select(Db::raw('sum(quantity) as total'))->where('item_id', $item->id)->value('total');
            $total_deduct = DB::table('deducted_items')->select(Db::raw('sum(quantity) as total'))->where('item_id', $item->id)->value('total');
            $item->totaldeposit = $total_deposit;
            $item->totaldeduct = $total_deduct;
            $item->remaining = $total_deposit - $total_deduct;
        }
        return $items;
    }
    public function pie(Request $request,$section)
    {

        $items = \App\Models\Item::orderByDesc('id')->where('section_id',$section)->get();

        /** @var Item $item */
        foreach ($items as $item) {
            $total_deposit = DB::table('deposit_items')->select(Db::raw('sum(quantity) as total'))->where('item_id', $item->id)->value('total');
            $total_deduct = DB::table('deducted_items')->select(Db::raw('sum(quantity) as total'))->where('item_id', $item->id)->value('total');
            $item->totaldeposit = $total_deposit;
            $item->totaldeduct = $total_deduct;
            $item->remaining = $total_deposit - $total_deduct + $item->initial_balance;
        }
        return $items;
    }

    public function create(Request $request)
    {
        $data = $request->all();
//        return $data;
        $result = Item::create(['name' => $data['name'], 'section_id' => $data['section'], 'require_amount' => $data['require_amount'], 'initial_balance' => $data['initial_balance'], 'tests' => $data['tests']
            , 'initial_price' => $data['initial_price']]);
        return ['status' => $result];
    }

    public function all(Request $request)
    {
        return Item::with('section')->get();
    }
    public function pagination(Request $request)
    {
        $item =  $request->item;

        if ( $request->has('word')){
            $word = $request->query('word');

            return collect( Item::orderByDesc('id')->with('section')->where('name','like',"%$word%")->paginate($item));
        }
        return collect( Item::orderByDesc('id')->with('section')->paginate($item));
    }

    public function destroy(Request $request, Item $item)
    {
        return ['status' => $item->delete()];
    }

    public function update(Request $request, Item $item)
    {
        $data = $request->all();
//        return $data;

        return ['status' => $item->update([$data['colName'] => $data['val']])];

    }

    public function report()
    {


    }
}
