<?php

namespace App\Http\Controllers;

use App\Models\Shift;
use Illuminate\Http\Request;

class ShiftController extends Controller
{
    public function total(){
        $shift = Shift::first();
        return ['status'=> true, 'total'=>$shift->totalPaid()];
    }

    public function create(){
        Shift::create([]);
    }
}
