<?php

namespace App\Http\Controllers;

use App\Models\Item;
use DB;
use Illuminate\Http\Request;
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

    public function paginate(Request $request)
    {
        $data  = $request->all();
        if (isset($data['word'])){
            $name  = $data['word'];
            $items = \App\Models\Item::where('name','like',"%$name%")->paginate(7);

        }else{
            $items = \App\Models\Item::orderByDesc('id')->paginate(7);

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

    public function create(Request $request)
    {
        $data = $request->all();
//        return $data;
        $result = Item::create(['name' => $data['name'], 'section_id' => $data['section'], 'require_amount' => $data['require_amount'], 'initial_balance' => $data['initial_balance']
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
