<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\DoctorShift;
use App\Models\Shift;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
        $shift  = Shift::orderByDesc('id')->first();
        if ($shift->is_closed){
            return  response(['msg'=> 'يجب فتح ورديه ماليه','status'=>false],400);
        }
        $doctor_shift =  DoctorShift::create(['user_id'=>$user,'shift_id'=>$shift->id,'status'=>1,'doctor_id'=>$doctor->id]);
        return ['status'=>true,'shift'=>$doctor_shift->load('visits','doctor')];
    }
    public function close(Request $request , DoctorShift $shift){
//             return $shift;
//        return $request->all();
        $user_id = auth()->user()->id;
        if ($shift->user->id != $user_id){
            return \response(['status'=>false,'message'=>'عفوا , يتم قفل الورديه بنفس المستخدم الذي فتحها'],400);
        }

//        $shifts =  $doctor->shifts()->orderByDesc('id')->get();
//        /** @var DoctorShift $shift */
//         $shift =  $shifts[0];
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
           $shift_id =  Shift::orderByDesc('id')->first()->id;
       }
      $shifts =  DoctorShift::with(['doctor','visits'=>function( $query){
            return $query->orderByDesc('doctor_visit.id');
        }])->where('status',$open)->where('shift_id',$shift_id)->get();
      return  $shifts;
    }
    public function  openedDoctorsShifts(Request $request, $shift_id, $last = true ,$open = 1){


       if ($last){
           $shift_id =  Shift::orderByDesc('id')->first()->id;
       }
      $shifts =  DoctorShift::with(['doctor','visits'=>function( $query){
            return $query->orderByDesc('doctor_visit.id');
        }])->where('status',$open)->where('shift_id',$shift_id)->get();
      return  $shifts;
    }
    public function find(Request $request){
        return DoctorShift::whereDoctorId($request->get('id'))->where('id','<',$request->get('currentShiftId'))->orderByDesc('id')->first();
    }
    public function  doctorVisitsByDate(Request $request){

        $first = $request->get('first');
        $second = $request->get('second');
//       return [$first,$second];
      $shifts =  DoctorShift::with(['doctor','visits'=>function( $query,){

            return $query->orderByDesc('doctor_visit.id');
        }])->whereBetween(DB::raw('DATE(created_at)'),[$first,$second])->get();
      return  $shifts;
    }
    public function  LastShift(Request $request){
        $user_id =  Auth::user()->id;
        $shift_id =  Shift::orderByDesc('id')->first()->id;
        $shifts =  DoctorShift::with(['doctor','visits'=>function( $query){
            return $query->orderByDesc('doctor_visit.id');
        }])->where('user_id',$user_id)->where('shift_id',$shift_id)->get();
        return  $shifts;
    }
}
