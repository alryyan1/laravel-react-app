<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Whatsapp
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Whatsapp newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Whatsapp newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Whatsapp query()
 * @mixin \Eloquent
 */
class Whatsapp extends Model
{
    use HasFactory;
    static string $token = 'ii13k49c1yptsxil';
    static string $instance = 'instance4204';
    public static function sendMsgWb( $mobile, $msg)
    {

        $token = self::$token;
        $instance = self::$instance;
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.ultramsg.com/$instance/messages/chat",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "", CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 5,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "token=$token&to=" . $mobile . "&body=" . $msg . "&priority=1&referenceId=",
            CURLOPT_HTTPHEADER => array(
                "content-type: application/x-www-form-urlencoded"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            return "cURL Error #:" . $err;
        } else {
            return  $response;
        }
    }

}
