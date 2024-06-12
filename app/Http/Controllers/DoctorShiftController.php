<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\DoctorShift;
use App\Models\Shift;
use http\Env\Response;
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
        $shift  = Shift::latest()->first();
        if ($shift->is_closed){
            return  response(['msg'=> 'يجب فتح ورديه ماليه','status'=>false],400);
        }
        $doctor_shift =  DoctorShift::create(['user_id'=>$user,'shift_id'=>$shift->id,'status'=>1,'doctor_id'=>$doctor->id]);
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
    public function  DoctorShifts(Request $request, $shift_id, $last = true ,$open = 1){
       $user_id =  Auth::user()->id;

       if ($last){
           $shift_id =  Shift::latest()->first()->id;
       }
      $shifts =  DoctorShift::with(['doctor','visits'=>function( $query){
            return $query->orderByDesc('doctor_visit.id');
        }])->where('user_id',$user_id)->where('status',$open)->where('shift_id',$shift_id)->get();
      return  $shifts;
    }
    public function  LastShift(Request $request){
        $user_id =  Auth::user()->id;
        $shift_id =  Shift::latest()->first()->id;
        $shifts =  DoctorShift::with(['doctor','visits'=>function( $query){
            return $query->orderByDesc('doctor_visit.id');
        }])->where('user_id',$user_id)->where('shift_id',$shift_id)->get();
        return  $shifts;
    }
}
