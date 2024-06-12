<?php

namespace App\Http\Controllers;

use App\Models\Shipping;
use App\Models\ShippingState;
use App\Models\Whatsapp;
use Illuminate\Http\Request;

class ShippingController extends Controller
{
    public function find( Request $request , Shipping $shipping )
    {
        return $shipping;
    }
    public function addShipping(Request $request)
    {
        $id =  Shipping::max('id');
        $array = $request->all();
        $id = $id + 1;
        $array['prefix'] = 'MJN-'.$id;
         $shipping =  Shipping::create($array);
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
            if (is_numeric($word)){
                return collect( Shipping::orderByDesc('id')->with('item')->where('phone','like',"%$word%")->paginate($page));

            }else{
                return collect( Shipping::orderByDesc('id')->with('item')->where('name','like',"%$word%")->paginate($page));

            }
        }
        if ($request->has('state_id') && $request->query('state_id') != 'undefined'){
            $state_id = $request->query('state_id');
            return collect( Shipping::orderByDesc('id')->with('item')->where('shipping_state_id',$state_id)->paginate($page));

        }else{
            return collect( Shipping::orderByDesc('id')->with('item')->paginate($page));

        }
    }
    public function update(Request $request , Shipping $shipping)
    {
        $data = $request->all();

        if ($data['colName'] === 'shipping_state_id'){



           $state  =  ShippingState::find($data['val']);
//            $msg =   "*Shipping State has changed* \n \n".
//                "Customer name *".$shipping->name."*\n\n State *".$state->name."*";
            $doc = <<<TXT
Dear valued client($shipping->name)
Your shipment number ($shipping->express)
is($state->name)
TXT;
            //owner phone
            Whatsapp::sendMsgWb('96878622990',  $doc);
            //client phone
            Whatsapp::sendMsgWb('968'.$shipping->phone,  $doc);
        }

        return ['status' => $shipping->update([$data['colName'] => $data['val']])];
    }
    public function all(Request $request)
    {
        return Shipping::with('item')->get();
    }
}
