<?php

namespace App\Http\Controllers;

use App\Http\Requests\DoctorFormRequest;
use App\Models\Doctor;
use App\Models\DoctorService;
use App\Models\DoctorShift;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function addDoctorService(Request $request , Doctor $doctor)
    {
        $data  =  $request->all();
        foreach ($data['services'] as $service) {
            $doctor_service = new DoctorService();
            $doctor_service->service_id = $service;
            $doctor->services()->save($doctor_service);
        }
        return ['status'=>true,'doctor'=>$doctor->fresh()];

    }  public function updateDoctorService(Request $request , DoctorService $doctorService)
    {
        $data = $request->all();
//        return $data;

    return ['status' => $doctorService->update([$data['colName'] => $data['val']])];

    }


    public function deleteDoctorService(Request $request , DoctorService $doctor_service)
    {
       $result =  $doctor_service->delete();
       return ['status'=>$result,'doctor'=>$doctor_service->doctor];

    }
//    public function all(){
//        $doctors =  Doctor::with(['specialist','shifts'=>function(HasMany  $query){
//            return $query->orderByDesc('id');
//        }])->get();
//        foreach ($doctors as $doctor){
//            if (count($doctor->shifts) > 0){
//                $shift = $doctor->shifts[0];
//                $shift->load('visits');
//                $doctor->last_shift= $shift;
//            }else{
//                $doctor->last_shift = null;
//            }
//
//        }
//        return $doctors;
//    }
    public function all(){
        $doctors =  Doctor::all();
//        foreach ($doctors as $doctor){
//            if (count($doctor->shifts) > 0){
//                $shift = $doctor->shifts[0];
//                $shift->load('visits');
//                $doctor->last_shift= $shift;
//            }else{
//                $doctor->last_shift = null;
//            }
//
//        }
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

    public function find(Request $request,Doctor $doctor)
    {
        return $doctor->getLastShift(true);


    }



}
