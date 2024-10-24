<?php

namespace App\Http\Controllers;

use App\Http\Requests\PatientAddRequest;
use App\Models\Complain;
use App\Models\Diagnosis;
use App\Models\Doctor;
use App\Models\DoctorShift;
use App\Models\Doctorvisit;
use App\Models\File;
use App\Models\LabFinishedNotification;
use App\Models\LabRequest;
use App\Models\MainTest;
use App\Models\NewPatientNotification;
use App\Models\Patient;
use App\Models\PrescribedDrug;
use App\Models\Shift;
use App\Models\Sickleave;
use App\Zebra;
use Doctrine\DBAL\Query\QueryBuilder;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use PHPUnit\Exception;

class PatientController extends Controller
{
    public function updateTable(Request $request){
        $table  = $request->table;
        foreach ($request->val as $val){
           $pdo = DB::getPdo();
          $rows =  $pdo->query("select * from $table where name = '$val '")->rowCount();
          if ($rows == 0){
              $pdo->query("INSERT INTO $table (`id`, `name`) VALUES (NULL, '$val');");
          }
        }
        return DB::table($table)->get();
    }
    public function newPatient(Request $request,Patient $patient)
    {
        NewPatientNotification::create(['patient_id'=>$patient->id]);
    }
    public function NewPatients(Request $request,Patient $patient)
    {
        return  NewPatientNotification::all();
    }
    public function removeNewPatients(Request $request,Patient $patient)
    {
        return  NewPatientNotification::where('patient_id',$patient->id)->delete();
    }
    public function resultFinished(Request $request,Patient $patient)
    {
        LabFinishedNotification::create(['patient_id'=>$patient->id]);
    }
   public function labFinishedNotifications(Request $request,Patient $patient)
    {
       return LabFinishedNotification::all();
    }


    public function removeLabFinishedNotifications(Request $request,Patient $patient)
    {
       return  LabFinishedNotification::where('patient_id',$patient->id)->delete();
    }

    public function sickleave(Request $request , Patient $patient)
    {
        $today = new \DateTime();
        $today = $today->format('Y-m-d');
        $sickleave = Sickleave::create([
            'patient_id'=>$patient->id,
            'from'=>$today,
            'to'=>$today,
        ]);
        return ['status'=> $sickleave , 'data'=>$patient->fresh()];
    }
    public function editSickLeave(Request $request , Sickleave $sickleave)
    {

        $data = $request->all();
        return ['status'=>  $sickleave->update($request->all()) , 'data'=>$sickleave->patient];


    }
    public function todayPatients(Request $request)
    {
        $today = Carbon::now()->format('Y-m-d').'%';
      return[ 'data' => Doctorvisit::where('created_at','like',$today)->get(),'date'=>$today];
    }
    public function file(Request $request , Patient $patient)
    {
        return ['data'=>\App\Models\File::with(['patients'=>function ( $query) {
            return $query->orderByDesc('patients.id');

        }])->find($patient->file_patient->file_id)];
    }
    public function complains()
    {
        return Complain::all();
    }
    public function diagnosis()
    {
        return Diagnosis::all();
    }
    public function prescribedDrugUpdate(Request $request , PrescribedDrug $prescribedDrug)
    {
        $data = $request->all();
        return ['status' => $prescribedDrug->update([$data['colName'] => $data['val']]),'patient'=>$prescribedDrug->patient->fresh()];

    }
    public function prescribedDrugDelete(Request $request , PrescribedDrug $prescribedDrug)
    {
        return ['status' => $prescribedDrug->delete(),'patient'=>$prescribedDrug->patient];

    }
    public function ByName(Request $request){
        $name = $request->query('name');
        if (is_numeric($name)){
            return  ['status'=>true,'data'=>Patient::find($name)];
        }
         return Doctorvisit::whereHas('patient',function(Builder $query)use($name){
             $query->where('name','like',"%$name%");
         })->orderByDesc('id')->limit(30)->get();



    }
  public function printLock(Request $request , Patient $patient){
        $lock = $patient->result_is_locked == 0 ? 1 : 0;
        $patient->update(['result_is_locked'=> $lock]);
        return ['status'=>true,'data'=>$patient->doctorVisit(),'lock'=>$lock];
    }
    public function collectSample(Request $request , Patient $patient)
    {
        return ['status'=>$patient->update(['sample_collected'=>1,'sample_collect_time'=>now()]),'data'=>$patient->doctorVisit(),'shift'=>$patient->shift];
    }




    public function copy(Request $request,Doctor $doctor){
        $patient_id = $request->get('patient_id');
        $current_shift =   $doctor->getLastShift();
        $doctor_visit = new Doctorvisit();
        $doctor_visit->patient_id = $patient_id;
        $count = $current_shift->visits->filter(function ($visit){
            return $visit->only_lab == 0;
        })->count();
        $doctor_visit->number = $count +1;

        $doctor_visit->doctor_shift_id = $current_shift->id;
        $current_shift->visits()->save($doctor_visit);
        return ['status'=>true];
    }

    public  function book(PatientAddRequest $request ,Doctor $doctor , $patient_id = null,$copy = false){
        $data = $request->all();
        $current_shift =   $doctor->getLastShift();
        if ($current_shift == null){
            $doctorShiftController = new DoctorShiftController();
         $current_shift =   $doctorShiftController->open($request,$doctor)['shift'];
        }
        $count = $current_shift->visits->filter(function ($visit){
            return $visit->only_lab == 0;
        })->count();
        /** @var DoctorShift $current_shift */
        $old_patient = Patient::find($patient_id);
        $patient_data =  $this->store($request,false,$old_patient,$doctor->id);
        $doctor_visit = new Doctorvisit();
        $doctor_visit->only_lab = $data['onlyLab'] ?? 0;
        $doctor_visit->number = $count +1;
        $doctor_visit->shift_id = Shift::max('id');
        $doctor_visit->patient_id = $patient_data['patient']->id;
        $doctor_visit->doctor_shift_id = $current_shift->id;
        $current_shift->visits()->save($doctor_visit);
        return ['status'=>true,'patient'=>$doctor_visit->fresh()];
    }
    public function search(Request $request){
       $data =  $request->all();
       if ($data['name'] =='') return  [];
       return Patient::where('name','like',"%".$data['name']."%")->orderByDesc('id')->limit(10)->get();
    }
    public function searchByphone(Request $request){
        $data =  $request->all();
        if ($data['phone'] =='') return  [];
        return Patient::where('phone','like',"%".$data['phone']."%")->orderByDesc('id')->limit(10)->get();
    }
    public function get(Request $request , Patient $patient){
        return $patient;
    }
    public function doctorVisit(Request $request , Doctorvisit  $doctorvisit)
    {
        return $doctorvisit;
    }
    public function updateDoctorVisit(Request $request , Doctorvisit $doctorVisit){
        return ['status'=>$doctorVisit->update($request->all())];
    }
    public function findDoctorVisit(Request $request )
    {
       return   Doctorvisit::where('patient_id','=',$request->get('pid'))->first();
    }
    public function findPatient(Request $request , Patient $patient)
    {
       return   $patient;
    }
    public function edit(PatientAddRequest  $request,Doctorvisit $doctorvisit){
//        return $doctorvisit;
//        return $request->validated();
        //اذا عايز تعدل علي الشركه امسح الفحوصات والخدمات والغي الجهات والعلاقات
         $result =  $doctorvisit->patient->update($request->validated());

        if ($result){
            return ['status'=>true,'data'=>$doctorvisit->refresh()];
        }

    }
    public function printBarcode(Request $request , Patient $patient)
    {

//        $patient->update(['sample_print_date'=>now()]);
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
//                $z->setBarcode(1, 270, 120, $patient->id); #1 -> cod128//barcode
//                $z->writeLabel("------------",340,165,4);//patient id
//                $z->writeLabel($patient->id,340,155,4);//patient id
//                $z->writeLabel("$tests",330,10,1);
//                //$z->writeLabel("-",200,20,1);
//                $z->setLabelCopies(1);
            $z->setBarcode(1, 270, 110, $patient->id); #1 -> cod128//barcode
            $z->writeLabel($patient->visit_number,340,155,4);//patient id
            $z->writeLabel("$tests",330,10,1);
//            $z->writeLabel("$package_name",210,150,1);

            //$z->writeLabel("-",200,20,1);
            $z->setLabelCopies(1);

        }//end of foreach

        $z->print2zebra();
        return ['status'=>true];
    }
    public function update(PatientAddRequest  $request,Patient $patient){
        $user =  auth()->user();
        if (!$user->can('تعديل بيانات المريض')) {
            return  response(['message'=>'صلاحيه تعديل بيانات المريض غير مفعله'],400);
        }
//        return $request->all();
//        return $doctorvisit;
//        return $request->validated();
        //اذا عايز تعدل علي الشركه امسح الفحوصات والخدمات والغي الجهات والعلاقات
        $result =  $patient->update($request->validated());

        if ($result){
            return ['status'=>true,'data'=>$patient->doctorVisit()];
        }

    }
    public function store(Request|null $request,$isLab=false,Patient $patient_from_history = null,$doctor_id = null){

        //اخر ورديه موحده
        $shift = Shift::orderByDesc('id')->first();


        //لو مقفوله ما تسجل
        if ($shift->is_closed){
            return  response(['message'=>'لم يتم فتح الورديه الماليه'],400);
        }

        //اذا المريض مسجل من قبل يتم نسخ البيانات الاساسيه فقط واضافه سجل جديد للمريض
        if ($patient_from_history != null){

//            return $patient_from_history;
            $patient = new Patient() ;
            $patient->name = $patient_from_history->name;
            $patient->age_day = $patient_from_history->age_day;
            $patient->age_month = $patient_from_history->age_month;
            $patient->age_year = $patient_from_history->age_year;
            $patient->gender = $patient_from_history->gender;
            $patient->phone = $patient_from_history->phone;
            $patient->gov_id = $patient_from_history->gov_id;
            $patient->address = $patient_from_history->address;
            if ($doctor_id){
                $patient->doctor_id = $doctor_id;

            }else{
                $patient->doctor_id = $patient_from_history->doctor_id;

            }
            if ($request->get('company_id') != null){
                $patient->company_id = $request->get('company_id');
            }else{
                $patient->company_id = $patient_from_history->company_id;
            }
        }else{
            $patient = new Patient($request->validated());
            if ($isLab){
                $patient->doctor_id = $request->doctor_id;
            }
        }

        // سجل بواسطه المستخدم الحالي
        $patient->user_id = \Auth::user()->id;
        //اذا كان اول مريض بالنسبه للمعمل
        if ($shift->touched == 0){
            $patient->visit_number = 1;
            $shift->touched = 1;
            $shift->save();
        }else{
            //sاما اذا كان غير ذلك ستم الحاق اخر رقم موجود زائد واحد
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
