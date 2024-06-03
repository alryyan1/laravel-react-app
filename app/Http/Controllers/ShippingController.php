<?php

namespace App\Http\Controllers;

use App\Models\Shipping;
use App\Models\ShippingState;
use App\Models\Whatsapp;
use Illuminate\Http\Request;

class ShippingController extends Controller
{
    public function addShipping(Request $request)
    {
         $shipping =  Shipping::create($request->all());
         if ($shipping){
             Whatsapp::sendMsgWb('96878622990','thank you for your order');
         }
         return ['status' => 'success', 'data' => $shipping];
    }
    public function pagination(Request $request , $page = 10)
    {

        if ( $request->has('word')){
            $word = $request->query('word');

            return collect( Shipping::orderByDesc('id')->with('item')->where('name','like',"%$word%")->paginate($page));
        }
        return collect( Shipping::orderByDesc('id')->with('item')->paginate($page));
    }
    public function update(Request $request , Shipping $shipping)
    {
        $data = $request->all();

        if ($data['colName'] === 'shipping_state_id'){
           $state  =  ShippingState::find($data['val']);
            $msg =   "*Shipping State has changed* \n \n".
                "Customer name *".$shipping->name."*\n\n State *".$state->name."*";
            Whatsapp::sendMsgWb('96878622990',  $msg);
        }

        return ['status' => $shipping->update([$data['colName'] => $data['val']])];
    }
    public function all(Request $request)
    {
        return Shipping::with('item')->get();
    }
}
