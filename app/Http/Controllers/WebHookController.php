<?php

namespace App\Http\Controllers;

use App\Models\Shipping;
use App\Models\Whatsapp;
use Illuminate\Http\Request;

class WebHookController extends Controller
{
    public function webhook(Request $request)
    {

        $data = file_get_contents("php://input");
        $event = json_decode($data, true);
        Whatsapp::sendMsgWb('96878622990','from web api');
        if(isset($event)){
            //Here, you now have event and can process them how you like e.g Add to the database or generate a response
            $file = 'log.txt';
            $data =json_encode($event)."\n";
            $from = $event["data"]["from"];
            $msg = $event["data"]["body"];
            $from_sms =  str_replace("c.us","",$from);
            $from_sms =  str_replace("@","",$from_sms);
            $pdfController = new PDFController();
            if ($msg === 'report'){
                $pdfController->shipping($request,$from_sms);

            }

            if (is_numeric($msg)){

               $shipping = Shipping::find($msg);
               if ($shipping){
                   $date =  $shipping->created_at->format('Y-m-d');
                   $item_name = $shipping?->item?->name ?? '';
                   $state_name = $shipping?->state?->name ?? '';
                   $doc = <<<TXT
Customer name  $shipping->name
Express        $shipping->express
Item           $item_name
CTN            $shipping->ctn
CBM            $shipping->cbm
KG             $shipping->kg
Date           $date
State          $state_name
TXT;
//               $shipping_details =" {$shipping->name}";

                   Whatsapp::sendMsgWb($from_sms,$doc);
               }


            }


            file_put_contents($file, $data, FILE_APPEND | LOCK_EX);


        }


    }
}
