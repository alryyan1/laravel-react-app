<?php

namespace App\Http\Controllers;

use App\Models\Doctorvisit;
use App\Models\Patient;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Http\Request;

class InsuranceController extends Controller
{
    public function insuranceReclaim(Request $request)
    {
        $data = $request->all();
        $company_id = $data['companyId'];
        $first = \Illuminate\Support\Carbon::createFromFormat('Y-m-d', $data['fromDate'])->startOfDay();
        $second = Carbon::createFromFormat('Y-m-d', $data['toDate'])->endOfDay();

        $doctorVisits = Doctorvisit::whereHas('patient',function( $query) use($company_id){
            $query->where('company_id','=',$company_id);
        })->whereBetween('created_at',[$first,$second])->get();

        $modifiedDoctorVisits = collect();
        /** @var Doctorvisit $doctorVisit */
        foreach ($doctorVisits as $doctorVisit){
            //نضيف اجمالي الخدمات ك خاصيه غير موجوده في بيشن موديل عشان نشيلها من الدوكتور فزت ونختها ف البشن
            $doctorVisit->patient->servicesConcatinated= $doctorVisit->services_concatinated() ;
            $doctorVisit->patient->added_total_service_price= $doctorVisit->total_services ;
            $doctorVisit->patient->added_endurance_price= $doctorVisit->total_paid_services;
            if ($modifiedDoctorVisits->contains(function (Doctorvisit $val,$key) use($doctorVisit){

                // دي لو لغيتها بتلغي التكرار في الاسماء -- هو الاسماء ما متكرره بس عشان جهاد قال ماداير الاسامي تكون متكرره بالنسبه للفحوصات pid هو البتكرر عشان كده
                return $val->patient->id == $doctorVisit->patient->id;
            })){
                continue;
            }

            //هنا بنجيب كل الدكتور فزت من غير الحالي لانه احنا ما دايرين التكرار بتاع الدكتور فزت البحصل لما نعمل كوبي للبشن
            $docVisits = Doctorvisit::where('patient_id','=',$doctorVisit->patient->id)->where('id','!=',$doctorVisit->id)->get();
            /** @var Doctorvisit $docVisit */
            foreach ($docVisits as $docVisit){
                $doctorVisit->patient->servicesConcatinated .= ' '.$docVisit->services_concatinated() ;

                $doctorVisit->patient->added_total_service_price+= $docVisit->total_services;
                $doctorVisit->patient->added_endurance_price+= $docVisit->total_paid_services;
            }

            $modifiedDoctorVisits->push( $doctorVisit);

        }

        //هنا بنجيب كل البشنس ونفلتر الظهرو من ضمن الدكتور فزت
        $patients = Patient::whereBetween('created_at',[$first,$second])->where('company_id','=',$company_id)->get();
        $newArr = [];
        foreach ($patients as $patient){
            if ($doctorVisits->contains(function (Doctorvisit $val,$key) use($patient){
                return $val->patient->id == $patient->id;
            })){
             continue;
            }
            $newArr[] = $patient;

        }



        return ['data'=>$modifiedDoctorVisits,'patients'=>$newArr,'from'=>$first->format('Ymd')];


    }
}
