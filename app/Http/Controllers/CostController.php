<?php

namespace App\Http\Controllers;

use App\Models\Cost;
use App\Models\Shift;
use Illuminate\Http\Request;

class CostController extends Controller
{
    public function store(Request $request)
    {
        $id =  Shift::max('id');
        $result =   Cost::create(['shift_id'=>$id,'description'=>$request->name,'doctor_shift_id'=>$request->id,'amount'=>$request->amount]);
        return ['status' => $result];
    }
}
