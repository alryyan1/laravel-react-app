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
 * @mixin \Eloquent
 */
class Patient extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'phone','insurance_no','user_id','shift_id','age_day','age_month','age_year','doctor_id','gender','visit_number','company_id','subcompany_id','company_relation_id','insurance_no','guarantor','result_is_locked','result_print_date','sample_print_date'];
    protected function name() : Attribute {
        return Attribute::make(
            set:fn($value)=> trim($value),
        );
    }
    protected  $with = ['labrequests','doctor','company','subcompany','relation'];

    protected $appends = ['paid'];
    public function getPaidAttribute(){
        return $this->paid_lab();
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


    public function paid_lab(){
        $total = 0;
        foreach ($this->labrequests as $labrequest){
            if ($this->is_lab_paid){
                $total+=$labrequest->amount_paid;
            }
        }
        return $total;
    }
    public function total(){


      return $this->labrequests()->sum('labrequests.price');

    }
    public function discountAmount(){
        $total = 0;
        foreach ($this->labrequests as $labrequest){
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

    public function bankak(){

        $total = 0;
        foreach ($this->labrequests as $labrequest){
            if ($this->is_lab_paid){
                if ($labrequest->is_bankak == 1){

                    $total+=$labrequest->amount_paid;
                }

            }

        }
        return $total;

    }


    public function file(){
        return $this->belongsToMany(File::class);
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
