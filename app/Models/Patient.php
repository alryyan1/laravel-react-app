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
 * @method static \Illuminate\Database\Eloquent\Builder|Patient whereSubcompanyId($value)
 * @mixin \Eloquent
 */
class Patient extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'phone','insurance_no','user_id','shift_id','age_day','age_month','age_year','doctor_id','gender','visit_number'];
    protected function name() : Attribute {
        return Attribute::make(
            set:fn($value)=> trim($value),
        );
    }
    protected  $with = ['labrequests','doctor','services','services.pivot.user'];

    public function doctor(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Doctor::class);
    }
    public function labrequests(){
      return  $this->belongsToMany(MainTest::class,'labrequests','pid','main_test_id')->withPivot(['discount_per','is_bankak']);
    }
    public function requestedResults(){
        return $this->belongsToMany(MainTest::class,'requested_results','patient_id','main_test_id');
    }
    public function tests(){
        return $this->hasMany(LabRequest::class,'pid');
    }
    public function services(){
        return $this->belongsToMany(Service::class,'requested_service','patient_id','service_id')->withPivot(['price','bank','amount_paid','doctor_id','user_id','discount','is_paid','count'])->using(UserPivot::class);
    }
    public function getTotalServiceBankAttribute()
    {
        return $this->bankak_service();
    }
    protected $appends = ['totalservicebank'];
    public function paid(){

        $total = 0;
        foreach ($this->labrequests as $labrequest){
            if ($this->is_lab_paid){
                $price = $labrequest->price ;
                $discount = $labrequest->pivot->discount_per;
                $discounted_money = ($price * $discount ) / 100;
                $patient_paid =   $price - $discounted_money ;
                $total+=$patient_paid;
            }

        }
        return $total;

    }
    public function total(){


      return $this->labrequests()->sum('main_tests.price');

    }
    public function discountAmount(){
        $total = 0;
        foreach ($this->labrequests as $labrequest){
            $price = $labrequest->price ;
            $discount = $labrequest->pivot->discount_per;
            $discounted_money = ($price * $discount ) / 100;
            $total += $discounted_money;
        }
        return $total;

    }
     public function tests_concatinated(){
        return join('-',$this::labrequests()->pluck('main_test_name')->all());
     }
    public function services_concatinated(){
        return join(' - ',$this::services()->pluck('name')->all());
    }
    public function services_concatinated_specfic(Doctor $doctor){
       return  join('-', $this->services->filter(function ($service) use ($doctor){
            return $service->pivot->doctor_id == $doctor->id;
        })->pluck('name')->all());
    }
    public function bankak(){

        $total = 0;
        foreach ($this->labrequests as $labrequest){
            if ($this->is_lab_paid){
                if ($labrequest->pivot->is_bankak == 1){
                    $price = $labrequest->price ;
                    $discount = $labrequest->pivot->discount_per;
                    $discounted_money = ($price * $discount ) / 100;
                    $patient_paid =   $price - $discounted_money ;
                    $total+=$patient_paid;
                }

            }

        }
        return $total;

    }
    public function total_paid_services(Doctor|null $doctor  = null){
        $total = 0;
            foreach ($this->services as $service){
                if (!is_null($doctor)){
                    if ($doctor->id != $service->pivot->doctor_id ){
                        continue;
                    }

                }

                $total += $service->pivot->amount_paid;
        }
        return $total;
    }
    public function bankak_service(){

        $total = 0;
        foreach ($this->services as $service){
            if ($service->pivot->is_paid && $service->pivot->bank == 1){

                    $price = $service->price ;
                    $discount = $service->pivot->discount;
                    $discounted_money = ($price * $discount ) / 100;
                    $patient_paid =   $price - $discounted_money ;
                    $total+=$patient_paid;

            }

        }
        return $total;

    }

    public function file(){
        return $this->belongsToMany(File::class);
    }



}
