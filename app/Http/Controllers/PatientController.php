<?php

namespace App\Http\Controllers;

use App\Http\Requests\PatientAddRequest;
use App\Models\Doctor;
use App\Models\DoctorShift;
use App\Models\File;
use App\Models\Patient;
use App\Models\Shift;
use Doctrine\DBAL\Query\QueryBuilder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PHPUnit\Exception;

class PatientController extends Controller
{

    public function copy(Request $request ,Patient $patient)
    {
        $data = $request->all();
        $doctor = Doctor::find($data['doctor_id']);
        /** @var DoctorShift $current_shift */
        $current_shift =   $doctor->shiftsByOrder[0];
        $current_shift->visits()->attach($patient->id);
        return ['status' => true];
    }
    public  function book(PatientAddRequest $request ,Doctor $doctor){
        $data = $request->all();
        /** @var DoctorShift $current_shift */
        $current_shift =   $doctor->shiftsByOrder[0];
        $patient_data =  $this->store($request,$doctor->id);
        $current_shift->visits()->attach($patient_data['patient']->id);



        return ['status',true];
    }
    public function search(Request $request){
       $data =  $request->all();
       if ($data['name'] =='') return  [];
       return Patient::where('name','like',"%".$data['name']."%")->get();
    }
    public function get(Request $request , Patient $patient){
        return $patient;
    }
    public function edit(PatientAddRequest  $request,Patient $patient){
         $result =  $patient->update($request->validated());

        if ($result){
            return ['status'=>true];
        }

    }
    public function store(PatientAddRequest $request,$doc_id=null){

//        return $request->validated();
        $patient = new Patient($request->validated());
        if ($doc_id){
            $patient->doctor_id = $doc_id;
        }
        $patient->user_id = \Auth::user()->id;
        $shift = Shift::latest()->first();
        if ($shift->is_closed == 0){
            $patient->visit_number = 1;
            $shift->is_closed = 1;
            $shift->save();
        }else{
            $max_lab_no =  Patient::where('shift_id',$shift->id)->max('visit_number');
            $max_lab_no++;
            $patient->visit_number = $max_lab_no;


        }

        $patient->shift_id = $shift->id;

        //retrieve file id from files table if there is a match by telephone number
        //1- get patient id from patients table by phone


        //2 - use patient id to search for file from files table


        //3 - if exist get the file id in register it and you know the patient have a previous visits



        //create file if not exist



        //the created file id is inserted to as row to patients table





        try {
            $result = $patient->save();
            if($result){
                $patient = $patient->refresh();
                $file =  \App\Models\File::whereHas('patients', function ($query) use($patient){
                    return $query->where('phone', '=', $patient->phone);
                })->first();
                //the patient has a file number
                if ($file)  {
                    $file->patients()->attach($patient->id,['file_id'=>$file->id]);

                }else{
                    //create new file
                    /** @var File $file */
                    $file = File::create();
                    $file->patients()->attach($patient->id,['file_id'=>$file->id]);
                }

                return ['status'=>true,'patient'=>$patient];
            }
        }catch (Exception $e){
            return ['error'=>$e->getMessage()];
        }

    }
}
