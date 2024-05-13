<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\DoctorShift;
use App\Models\Shift;
use Illuminate\Http\Request;

class DoctorShiftController extends Controller
{
    public function open(Request $request , Doctor $doctor){
        $user = auth()->user()->id;
        $shift_id  = Shift::max('id');
        $doctor_shift =  DoctorShift::create(['user_id'=>$user,'shift_id'=>$shift_id,'status'=>1,'doctor_id'=>$doctor->id]);
        return ['status'=>true,'doctor'=>$doctor_shift];
    }
}
