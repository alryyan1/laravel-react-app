<?php

namespace App\Http\Controllers;

use App\Models\ShippingItem;
use Illuminate\Http\Request;

class ShippingItemController extends Controller
{



    public function addShipItem(Request $request)
    {
        $item =  ShippingItem::create($request->all());
        return ['status' => true , 'item' => $item];
    }
    public function all(Request $request)
    {
        return ShippingItem::all();
    }
}
