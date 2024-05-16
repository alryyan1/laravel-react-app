<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\DoctorShift;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function all(){
        $doctors =  Doctor::with(['specialist','shifts'=>function(HasMany  $query){
            return $query->orderByDesc('id');
        }])->get();
        foreach ($doctors as $doctor){
            if (count($doctor->shifts) > 0){
                $shift = $doctor->shifts[0];
                $shift->load('visits');
                $doctor->last_shift= $shift;
            }else{
                $doctor->last_shift = null;
            }

        }
        return $doctors;
    }

    public function create(Request $request){
//        return $request->all();
       $doctor =  Doctor::create($request->all());
       return ['status'=> true, 'doctor'=>$doctor];
    }





}
