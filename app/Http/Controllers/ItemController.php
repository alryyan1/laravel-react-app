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

    public function create(Request $request)
    {
        $data = $request->all();
//        return $data;
        $result = Item::create(['name' => $data['name'], 'section_id' => $data['section'], 'initial_balance' => $data['balance'], 'unit_name' => $data['unit_name']]);
        return ['status' => $result];
    }

    public function all(Request $request)
    {
        return Item::with('section')->get();
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
