<?php

namespace App\Http\Controllers;

use App\Http\Requests\DoctorFormRequest;
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

    public function create(DoctorFormRequest $request){
        $data =  $request->validated();
//        return ['status'=>true,'data'=>$data];
       $doctor =  Doctor::create($data);
       return ['status'=> true, 'doctor'=>$doctor];
    }
    public function update(Request $request, Doctor $doctor)
    {
        $data = $request->all();
//        return $data;

        return ['status' => $doctor->update([$data['colName'] => $data['val']])];

    }

    public function pagination(Request $request,$page_size)
    {


        if ( $request->has('word')){
            $word = $request->query('word');

            return collect( Doctor::with('specialist')->orderByDesc('id')->where('name','like',"%$word%")->paginate($page_size));
        }
        return collect( Doctor::with('specialist')->orderByDesc('id')->paginate($page_size));
    }



}
