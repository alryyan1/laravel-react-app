<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function create(Request $request ){
       $data =  $request->all();
//        return $data;
        $result =  Item::create(['name'=>$data['name'] ,'section_id'=> $data['section']  , 'initial_balance'=>$data['balance'],'unit_name'=>$data['unit_name'] ]);
       return ['status'=>$result];
    }

    public function all(Request $request ){
        return Item::with('section')->get();
    }
    public function destroy(Request $request , Item $item){
        return ['status' =>$item->delete()];
    }
    public function update(Request $request , Item $item){
        $data = $request->all();
//        return $data;

        return ['status'=>$item->update([$data['colName']=>$data['val']])];

    }
}
