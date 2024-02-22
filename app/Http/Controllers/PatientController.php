<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PatientController extends Controller
{
    public function all(Request $request)
    {
        Patient::create([
            'name' => '          ali ahmed               ',
            'phone' => '0991961111',
            'insurance_no' => '0',
            'user_id' => $request->user()->id,
            'shift_id' => 1,

        ]);

        //    $p = DB::table('patients')->where('id',1)->value('name');
        //    $p = DB::table('patients')->find(1);
        $p =   Patient::find(1)->created_at;
        dd($p);
    }
}
