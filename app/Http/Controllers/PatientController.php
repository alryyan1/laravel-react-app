<?php

namespace App\Http\Controllers;

use App\Http\Requests\PatientAddRequest;
use App\Models\Doctor;
use App\Models\DoctorShift;
use App\Models\Doctorvisit;
use App\Models\File;
use App\Models\LabRequest;
use App\Models\MainTest;
use App\Models\Patient;
use App\Models\Shift;
use App\Zebra;
use Doctrine\DBAL\Query\QueryBuilder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PHPUnit\Exception;

class PatientController extends Controller
{
    public function ByName(Request $request){
        $name = $request->query('name');
        if (is_numeric($name)){
            return  ['status'=>true,'data'=>Patient::find($name)];
        }
     elseif ($request->has('withTests') && $request->withTests == '1'){
         return Patient::whereHas('labrequests')->where('name','like',"%$name%")->orderByDesc('id')->get();

     }else{
            return Patient::with('labrequests')->where('name','like',"%$name%")->orderByDesc('id')->get();

        }

    }
  public function printLock(Request $request , Patient $patient){
        $lock = $patient->result_is_locked == 0 ? 1 : 0;
        $patient->update(['result_is_locked'=> $lock]);
        return ['status'=>true,'patient'=>$patient,'lock'=>$lock];
    }

    public function saveByHistoryLab(Patient $patient , Doctor|null $doctor){
        if ($doctor == null){
            $patient->doctor_id = $doctor->id;

        }else{
            $this->store(null,false,$patient);

        }
//        return ['status'=>$patient];
    }

    public function registerVisit(Request $request ,Patient $patient , Doctor $doctor)
    {
        /** @var DoctorShift $current_shift */
        $current_shift =   $doctor->shiftsByOrder[0];
        $doctor_visit = new Doctorvisit();
        $doctor_visit->patient_id = $patient->id;
        $doctor_visit->doctor_shift_id = $current_shift->id;
        $current_shift->visits()->save($doctor_visit);
        return ['status' => true];
    }
    public  function book(PatientAddRequest $request ,Doctor $doctor){
        $data = $request->all();
        /** @var DoctorShift $current_shift */
        $current_shift =   $doctor->shiftsByOrder[0];
        $patient_data =  $this->store($request,$doctor->id);

        $doctor_visit = new Doctorvisit();
        $doctor_visit->patient_id = $patient_data['patient']->id;
        $doctor_visit->doctor_shift_id = $current_shift->id;

        $current_shift->visits()->save($doctor_visit);



        return ['status',true];
    }
    public function search(Request $request){
       $data =  $request->all();
       if ($data['name'] =='') return  [];
       return Patient::where('name','like',"%".$data['name']."%")->get();
    }
    public function searchByphone(Request $request){
        $data =  $request->all();
        if ($data['phone'] =='') return  [];
        return Patient::where('phone','like',"%".$data['phone']."%")->get();
    }
    public function get(Request $request , Patient $patient){
        return $patient;
    }
    public function edit(PatientAddRequest  $request,Doctorvisit $doctorvisit){
//        return $doctorvisit;
//        return $request->validated();
        //اذا عايز تعدل علي الشركه امسح الفحوصات والخدمات والغي الجهات والعلاقات
         $result =  $doctorvisit->patient->update($request->validated());

        if ($result){
            return ['status'=>true,'patient'=>$doctorvisit->refresh()];
        }

    }
    public function printBarcode(Request $request , Patient $patient)
    {

        $patient->update(['sample_print_date'=>now()]);
        $ip_address = $_SERVER['REMOTE_ADDR'];
        $hostPrinter = "\\$ip_address\zebra";
        $speedPrinter = 3;
        $darknessPrint = 20;
        $labelSize = array(300,10);
        $referencePoint = array(223,30);
        $z = new Zebra($hostPrinter, $speedPrinter, $darknessPrint, $labelSize, $referencePoint);
        $containers = $patient->labrequests->map(function(LabRequest $req){
            return $req->mainTest->container;
        });

        foreach($containers as $container )
        {
           $tests_accoriding_to_container =  $patient->labrequests->filter(function (LabRequest $labrequest) use ($container){
                return $labrequest->mainTest->container->id == $container->id;
            })->map(function (LabRequest $labRequest){
                return $labRequest->mainTest;
           });
            $tests ="";
            /** @var MainTest $maintest */
            foreach($tests_accoriding_to_container as $maintest)
            {
                $main_test_name =  $maintest->main_test_name;
                $tests.=$main_test_name;

            }
                $z->setBarcode(1, 270, 120, $patient->id); #1 -> cod128//barcode
                $z->writeLabel("------------",340,165,4);//patient id
                $z->writeLabel($patient->id,340,155,4);//patient id
                $z->writeLabel("$tests",330,10,1);
                //$z->writeLabel("-",200,20,1);
                $z->setLabelCopies(1);

        }//end of foreach

        $z->print2zebra();
        return ['status'=>true];
    }
    public function update(PatientAddRequest  $request,Patient $patient){
//        return $request->all();
//        return $doctorvisit;
//        return $request->validated();
        //اذا عايز تعدل علي الشركه امسح الفحوصات والخدمات والغي الجهات والعلاقات
        $result =  $patient->update($request->validated());

        if ($result){
            return ['status'=>true,'patient'=>$patient->refresh()];
        }

    }
    public function store(PatientAddRequest|null $request,$isLab=false,$patient_from_history = null){

        $shift = Shift::latest()->first();
        if ($shift->is_closed){
            return  response(['message'=>'لم يتم فتح الورديه الماليه'],400);
        }

//        return $request->validated();
        if ($patient_from_history){
            $patient = new Patient($patient_from_history->toArray()) ;
            $patient->paper_fees = 0 ;
            $patient->is_lab_paid = 0 ;
            $patient->sample_collected = 0 ;
            $patient->result_is_locked = 0 ;
            $patient->result_print_date = null ;
            $patient->result_print_date = null ;


//            return  ['patient' => $patient];
        }else{
            $patient = new Patient($request->validated());
            if ($isLab){
                $patient->doctor_id = $request->doctor_id;
            }
        }

        $patient->user_id = \Auth::user()->id;
        if ($shift->touched == 0){
            $patient->visit_number = 1;
            $shift->touched = 1;
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
