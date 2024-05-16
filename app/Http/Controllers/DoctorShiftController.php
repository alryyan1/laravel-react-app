<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\DoctorShift;
use App\Models\Shift;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Comment\Doc;

class DoctorShiftController extends Controller
{
    public function open(Request $request , Doctor $doctor){
        $user = auth()->user()->id;
        //check if shift is open
        $shifts =  $doctor->shifts()->orderByDesc('id')->get();
        if (count($shifts) > 0 ){
            $shift =  $shifts[0];

            if ($shift->status == 1){

                return  ['status'=>false,'msg'=>'يجب قفل الورديه'];
            }
        }
        $shift_id  = Shift::max('id');
        $doctor_shift =  DoctorShift::create(['user_id'=>$user,'shift_id'=>$shift_id,'status'=>1,'doctor_id'=>$doctor->id]);
        return ['status'=>true,'shift'=>$doctor_shift->load('visits','doctor')];
    }
    public function close(Request $request , Doctor $doctor){
//        return $request->all();
        $shifts =  $doctor->shifts()->orderByDesc('id')->get();
         $shift =  $shifts[0];
         if ($shift->status == 1){
             $shift->status = 0;
             $shift->update();
         }
//         return $shift;

        return ['status'=> true, 'shift'=>$shift];
    }
    public function openShifts(Request $request){
       $user_id =  Auth::user()->id;
      $shifts =  DoctorShift::with(['doctor','visits'])->where('user_id',$user_id)->where('status',1)->get();


      return  $shifts;
    }
}
