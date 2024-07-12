<?php

namespace App\Http\Controllers;

use App\Models\DoctorShift;
use App\Models\Shift;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ShiftController extends Controller
{

    public function totalUserLab(Request $request){
        $user = auth()->user();
        $shift = Shift::latest()->first();
        return $shift->paidLab($user->id);
    }
    public function totalUserLabBank(Request $request){
        $user = auth()->user();
        $shift = Shift::latest()->first();
        return $shift->bankakLab($user->id);
    }
    public function totalUserLabTotalAndBank(Request $request){
        $user = auth()->user();
        $shift = Shift::latest()->first();
        return ['bank'=>$shift->bankakLab($user->id),'total'=>$shift->paidLab($user->id)];
    }
    public function getShiftByDate( Request $request){
        $date_selected =  $request->get('date');
//        return Carbon::parse($date_selected)->startOfDay();
        return Shift::with(['doctorShifts','doctorShifts.doctor'])->whereDate('created_at','=',$date_selected)->get();
    }
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
