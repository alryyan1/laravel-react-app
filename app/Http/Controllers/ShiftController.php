<?php

namespace App\Http\Controllers;

use App\Models\DoctorShift;
use App\Models\Shift;
use Illuminate\Http\Request;

class ShiftController extends Controller
{
    public function status(Request  $request  , Shift $shift)
    {
       $status =  $request->get('status');
       if ($status){
           $shift = Shift::create();
       }else{
           $shifts =  DoctorShift::all()->where('status',1)->all();
           /** @var DoctorShift $shift */
           foreach ($shifts as $shift){
               $shift->status = 0;
                $shift->save();
           }
           $shift->update(['is_closed' => 1,'closed_at' => now()]);
       }
       return ['status' => true, 'data' => $shift->fresh()];
    }
    public function last()
    {
        $shift = Shift::latest()->with('deducts')->first();
        return ['status' => true, 'data' => $shift];

    }public function shiftById(Request $request , Shift $shift)
    {

        return ['status' => true, 'data' => $shift];

    }
    public function test(Request $request,$age,$name){
        return [$age,$name];
    }

    public function total(){
        $shift = Shift::latest()->first();
        return ['status'=> true, 'total'=>$shift->totalPaid()];
    }
    public function totalService(){
         $user =  auth()->user();
        /** @var Shift $shift */
        $shift = Shift::latest()->first();
        return ['status'=> true, 'total'=>$shift->totalPaidService($user->id)];
    }
    public function totalServiceBank(){
        $user =  auth()->user();
        /** @var Shift $shift */
        $shift = Shift::latest()->first();
        return ['status'=> true, 'total'=>$shift->totalPaidServiceBank($user->id)];
    }

    public function create(){
        Shift::create([]);
    }
}
