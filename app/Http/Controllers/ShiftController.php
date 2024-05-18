<?php

namespace App\Http\Controllers;

use App\Models\Shift;
use Illuminate\Http\Request;

class ShiftController extends Controller
{
    public function test(Request $request,$age,$name){
        return [$age,$name];
    }

    public function total(){
        $shift = Shift::latest()->first();
        return ['status'=> true, 'total'=>$shift->totalPaid()];
    }
    public function totalService(){
        /** @var Shift $shift */
        $shift = Shift::latest()->first();
        return ['status'=> true, 'total'=>$shift->totalPaidService()];
    }
    public function totalServiceBank(){
        /** @var Shift $shift */
        $shift = Shift::latest()->first();
        return ['status'=> true, 'total'=>$shift->totalPaidServiceBank()];
    }

    public function create(){
        Shift::create([]);
    }
}
