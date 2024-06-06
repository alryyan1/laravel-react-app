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
             //owner phone

         //    Whatsapp::sendMsgWb('968'.$shipping->phone,'*شكرا لثقتك بنا  \\n اختيار مجان للشحن هو اختيارك الأفضل*');
           //  Whatsapp::sendMsgWb('968'.$shipping->phone,"*".$shipping->id."*".'للاستعلام عن حاله شحنتك يرجي ارسال هذا الكود');
             $doc = <<<TXT
*شكرا لثقتك بنا*

               💛💛

مجان للشحن هو اختيارك الأفضل

TXT;

             $doc2 = <<<TXT
 للاستعلام عن حاله شحنتك

      ارسل  الكود 👇

          $shipping->id

TXT;
             //customer phone
             Whatsapp::sendMsgWb('968'.$shipping->phone, $doc);
             Whatsapp::sendMsgWb('968'.$shipping->phone,$doc2);


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
            //owner phone
            Whatsapp::sendMsgWb('96878622990',  $msg);
            //client phone
            Whatsapp::sendMsgWb('968'.$shipping->phone,  $msg);
        }

        return ['status' => $shipping->update([$data['colName'] => $data['val']])];
    }
    public function all(Request $request)
    {
        return Shipping::with('item')->get();
    }
}
