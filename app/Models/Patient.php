<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


/**
 * App\Models\Patient
 *
 * @property int $id
 * @property string $name
 * @property int $doctor_id
 * @property string $phone
 * @property int|null $company_id
 * @property int|null $sub_company_id
 * @property string|null $family_member
 * @property int|null $paper_fees
 * @property string|null $guarantor
 * @property string|null $expire_date
 * @property string|null $insurance_no
 * @property int $user_id
 * @property int $shift_id
 * @property int $is_lab_paid
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Doctor $doctor
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\MainTest> $labrequests
 * @property-read int|null $labrequests_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\RequestedResult> $requestedResults
 * @property-read int|null $requested_results_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\LabRequest> $tests
 * @property-read int|null $tests_count
 * @method static \Database\Factories\PatientFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Patient newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Patient newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Patient query()
 * @method static \Illuminate\Database\Eloquent\Builder|Patient whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Patient whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Patient whereDoctorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Patient whereExpireDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Patient whereFamilyMember($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Patient whereGuarantor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Patient whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Patient whereInsuranceNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Patient whereIsLabPaid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Patient whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Patient wherePaperFees($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Patient wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Patient whereShiftId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Patient whereSubCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Patient whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Patient whereUserId($value)
 * @property int $lab_paid
 * @method static \Illuminate\Database\Eloquent\Builder|Patient whereLabPaid($value)
 * @property string $gender
 * @property int|null $age_day
 * @property int|null $age_month
 * @property int|null $age_year
 * @property int $visit_number
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\File> $file
 * @property-read int|null $file_count
 * @property-read mixed $total_service_bank
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Service> $services
 * @property-read int|null $services_count
 * @method static \Illuminate\Database\Eloquent\Builder|Patient whereAgeDay($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Patient whereAgeMonth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Patient whereAgeYear($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Patient whereGender($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Patient whereVisitNumber($value)
 * @property int|null $subcompany_id
 * @property int|null $company_relation_id
 * @method static \Illuminate\Database\Eloquent\Builder|Patient whereCompanyRelationId($value)
 * @property-read \App\Models\Company|null $company
 * @property-read \App\Models\CompanyRelation|null $relation
 * @property-read \App\Models\Subcompany|null $subcompany
 * @property-read mixed $paid
 * @property int $result_is_locked
 * @property int $sample_collected
 * @property string|null $result_print_date
 * @property string|null $sample_print_date
 * @method static \Illuminate\Database\Eloquent\Builder|Patient whereResultIsLocked($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Patient whereResultPrintDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Patient whereSampleCollected($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Patient whereSamplePrintDate($value)
 * @property int $result_auth
 * @property string $auth_date
 * @method static \Illuminate\Database\Eloquent\Builder|Patient whereAuthDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Patient whereResultAuth($value)
 * @property string|null $sample_collect_time
 * @property-read \App\Models\Shift $shift
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|Patient whereSampleCollectTime($value)
 * @property string $present_complains
 * @property string $history_of_present_illness
 * @property string $procedures
 * @property string $provisional_diagnosis
 * @property string $bp
 * @property float $temp
 * @property float $weight
 * @property float $height
 * @property int|null $juandice
 * @property int|null $pallor
 * @property int|null $clubbing
 * @property int|null $cyanosis
 * @property int|null $edema_feet
 * @property int|null $dehydration
 * @property int|null $lymphadenopathy
 * @property int|null $peripheral_pulses
 * @property int|null $feet_ulcer
 * @property int|null $country_id
 * @property string|null $gov_id
 * @property string|null $prescription_notes
 * @property-read \App\Models\FilePatient|null $file_patient
 * @property-read mixed $hascbc
 * @property-read mixed $visit_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\PrescribedDrug> $prescriptions
 * @property-read int|null $prescriptions_count
 * @method static \Illuminate\Database\Eloquent\Builder|Patient whereBp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Patient whereClubbing($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Patient whereCountryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Patient whereCyanosis($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Patient whereDehydration($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Patient whereEdemaFeet($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Patient whereFeetUlcer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Patient whereGovId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Patient whereHeight($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Patient whereHistoryOfPresentIllness($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Patient whereJuandice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Patient whereLymphadenopathy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Patient wherePallor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Patient wherePeripheralPulses($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Patient wherePrescriptionNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Patient wherePresentComplains($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Patient whereProcedures($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Patient whereProvisionalDiagnosis($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Patient whereTemp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Patient whereWeight($value)
 * @property-read mixed $total_lab_value_unpaid
 * @property-read mixed $total_lab_value_will_pay
 * @method static \Illuminate\Database\Eloquent\Builder|Patient whereSubcompanyId($value)
 * @mixin \Eloquent
 */
class Patient extends Model
{
    use HasFactory;
    protected $guarded =['id'];
    public function prescriptions()
    {
        return $this->hasMany(PrescribedDrug::class);
    }
    protected function name() : Attribute {
        return Attribute::make(
            set:fn($value)=> trim($value),
        );
    }
    public function getTotalLabValueWillPayAttribute()
    {
        return $this->total_lab_value_will_pay();
    }
    protected  $with = ['labrequests','doctor','company','subcompany','relation','user','prescriptions','file_patient'];
    public function getTotalLabValueUnpaidAttribute()
    {
        return $this->total_lab_value_unpaid();
    }


    protected $appends = ['paid','hasCbc','visit_count','total_lab_value_unpaid','total_lab_value_will_pay'];
    public  function getVisitCountAttribute()
    {
        return $this->visit_count();
    }
    public function getPaidAttribute(){
        return $this->paid_lab();
    }
    public function shift()
    {
        return $this->belongsTo(Shift::class);
    }
    public function doctor(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Doctor::class);
    }
//    public function labrequests(){
//      return  $this->belongsToMany(MainTest::class,'labrequests','pid','main_test_id')->withPivot(['amount_paid','discount_per','is_bankak']);
//    }
   public function labrequests(){
        return $this->hasMany(LabRequest::class,'pid');
   }
    public function requestedResults(){
        return $this->belongsToMany(MainTest::class,'requested_results','patient_id','main_test_id');
    }
    public function tests(){
        return $this->hasMany(LabRequest::class,'pid');
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function hasCbc(){
               return Sysmex::where('patient_id','=',$this->id)->get()->count() > 0;

     }
     public function hasCbc5(){
        return Sysmex5::where('patient_id','=',$this->id)->get()->count() > 0;

}
    public function getHascbcAttribute(){
                return $this->hasCbc();
        return $this->hasCbc();
    }
    public function getHasCbc5Attribute(){
        return $this->hasCbc();
return $this->hasCbc();
}
    public function paid_lab($user = null){
        $total = 0;
        /** @var LabRequest $labrequest */
        foreach ($this->labrequests as $labrequest){
            if ($user){
                if ($labrequest->user_deposited != $user) continue;

            }
            if ($this->is_lab_paid){
                $total+=$labrequest->amount_paid;
            }
        }
        return $total;
    }
    public function total_lab_value_unpaid(){


      return $this->labrequests()->sum('labrequests.price');

    }
    public function total_lab_value_will_pay(){
        $total =0;
        foreach ($this->labrequests as $requested) {
            $price = null;
            if ($this->company_id != null) {
                $id = $requested->mainTest->id;
                $test = $this->company->tests->filter(function ($item) use ($id) {
                    return $item->pivot->main_test_id == $id;
                })->first();
                $price = $requested->price;
                if ($test->pivot->endurance_static > 0) {
                    // alert('s')
                    $amount_paid =$test->pivot->endurance_static;

                }else{
                    if($test->pivot->endurance_percentage > 0 ){
                        $amount_paid = ($price * $test->pivot->endurance_percentage) / 100;

                    }else{
                        $amount_paid = ($price * $this->company->lab_endurance) / 100;

                    }
                }


                $total+=$amount_paid;



            } else {
                $price = $requested->mainTest->price;
                $discount = $requested->discount_per;
                $discount_amount = ($requested->mainTest->price * $discount) / 100;
                $amount_paid = $requested->mainTest->price - $discount_amount;

                $total+=$amount_paid;
        }
        }
        return $total;
    }



    public function discountAmount($user=null){
        $total = 0;
        foreach ($this->labrequests as $labrequest){
            if ($user){
                if ($labrequest->user_deposited != $user) continue;

            }
            $price = $labrequest->price ;
            $discount = $labrequest->discount_per;
            $discounted_money = ($price * $discount ) / 100;
            $total += $discounted_money;
        }
        return $total;

    }
     public function tests_concatinated(){
        return join('-',$this->labrequests->pluck('name')->all());
     }

    public function lab_bank($user = null){

        $total = 0;
        foreach ($this->labrequests as $labrequest){
            if ($user){
                if ($labrequest->user_deposited != $user) continue;

            }
            if ($this->is_lab_paid){
                if ($labrequest->is_bankak == 1){

                    $total+=$labrequest->amount_paid;
                }

            }

        }
        return $total;

    }


    public function visit_count()
    {
        return FilePatient::where('file_id',$this?->file_patient?->file_id)->count();
    }
    public function file_patient(){
        return $this->hasOne(FilePatient::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function subcompany()
    {
        return $this->belongsTo(Subcompany::class);
    }
    public function relation()
    {
        return $this->belongsTo(CompanyRelation::class,'company_relation_id');
    }


}
