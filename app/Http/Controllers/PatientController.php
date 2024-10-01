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
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use PHPUnit\Exception;

class PatientController extends Controller
{
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
        $today = Carbon::today();
        $sickleave = Sickleave::create([
            'patient_id'=>$patient->id,
            'form'=>$today->format('Y-m-d'),
            'to'=>$today->format('Y-m-d'),
        ]);
        return ['status'=> $sickleave , 'data'=>$patient->fresh()];
    }
    public function editSickLeave(Request $request , Sickleave $sickleave)
    {

        $data = $request->all();
        return ['status'=>  $sickleave->update([$data['colName']=> $data['val']]) , 'data'=>$sickleave->patient];


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
     elseif ($request->has('withTests') && $request->withTests == '1'){
         return Patient::whereHas('labrequests')->where('name','like',"%$name%")->orderByDesc('id')->limit(30)->get();

     }else{
            return Patient::with('labrequests')->where('name','like',"%$name%")->orderByDesc('id')->get();

        }

    }
  public function printLock(Request $request , Patient $patient){
        $lock = $patient->result_is_locked == 0 ? 1 : 0;
        $patient->update(['result_is_locked'=> $lock]);
        return ['status'=>true,'patient'=>$patient,'lock'=>$lock];
    }
    public function collectSample(Request $request , Patient $patient)
    {
        return ['status'=>$patient->update(['sample_collected'=>1,'sample_collect_time'=>now()]),'patient'=>$patient->fresh(),'shift'=>$patient->shift];
    }

    public function saveByHistoryLab(Patient $patient , Doctor|null $doctor){
        if ($doctor == null){
            $patient->doctor_id = $doctor->id;

        }else{
            $this->store(null,false,$patient);

        }
//        return ['status'=>$patient];
    }


    public  function book(PatientAddRequest $request ,Doctor $doctor , $patient_id = null,$copy = false){
        $data = $request->all();
        $current_shift =   $doctor->shiftsByOrder[0];

        if ($copy){
            $doctor_visit = new Doctorvisit();
            $doctor_visit->patient_id = $patient_id;
            $doctor_visit->doctor_shift_id = $current_shift->id;
            $current_shift->visits()->save($doctor_visit);
            return ['status'=>true];
        }
        /** @var DoctorShift $current_shift */
        $old_patient = Patient::find($patient_id);
        $patient_data =  $this->store($request,false,$old_patient,$doctor->id);
        $doctor_visit = new Doctorvisit();
        $doctor_visit->patient_id = $patient_data['patient']->id;
        $doctor_visit->doctor_shift_id = $current_shift->id;
        $current_shift->visits()->save($doctor_visit);
        return ['status'=>true,'patient'=>$patient_data['patient']->id];
    }
    public function search(Request $request){
       $data =  $request->all();
       if ($data['name'] =='') return  [];
       return Patient::where('name','like',"%".$data['name']."%")->limit(10)->get();
    }
    public function searchByphone(Request $request){
        $data =  $request->all();
        if ($data['phone'] =='') return  [];
        return Patient::where('phone','like',"%".$data['phone']."%")->limit(10)->get();
    }
    public function get(Request $request , Patient $patient){
        return $patient;
    }
    public function doctorVisit(Request $request , Doctorvisit  $doctorvisit)
    {
        return $doctorvisit;
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
            return ['status'=>true,'patient'=>$doctorvisit->refresh()];
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
            return ['status'=>true,'patient'=>$patient->refresh()];
        }

    }
    public function store(PatientAddRequest|null $request,$isLab=false,Patient $patient_from_history = null,$doctor_id = null){

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
