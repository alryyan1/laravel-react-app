<?php

namespace App\Http\Controllers;

use App\Models\ShippingState;
use Illuminate\Http\Request;

class ShippingStateController extends Controller
{
    public function addShippingState(Request $request)
    {
    $item =  ShippingState::create($request->all());
    return ['status' => true , 'state' => $item];
    }
    public function all(Request $request)
    {
        return ShippingState::all();
    }
}
