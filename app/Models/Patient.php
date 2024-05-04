<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


/**
 * App\Models\Patient
 *
 * @property int $id
 * @property-write string $name
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
 * @mixin \Eloquent
 */
class Patient extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'phone','insurance_no','user_id','shift_id','age_day','age_month','age_year','doctor_id','gender'];
    protected function name() : Attribute {
        return Attribute::make(
            set:fn($value)=> trim($value),
        );
    }
    protected  $with = ['labrequests','doctor'];

    public function doctor(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Doctor::class);
    }
    public function labrequests(){
      return  $this->belongsToMany(MainTest::class,'labrequests','pid','main_test_id')->withPivot(['discount_per','is_bankak']);
    }
    public function requestedResults(){
        return $this->belongsToMany(RequestedResult::class,'requestedResults');
    }
    public function tests(){
        return $this->hasMany(LabRequest::class,'pid');
    }
}
