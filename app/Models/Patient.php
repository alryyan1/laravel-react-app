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
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Doctor $doctor
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
 * @method static \Illuminate\Database\Eloquent\Builder|Patient whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Patient wherePaperFees($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Patient wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Patient whereShiftId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Patient whereSubCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Patient whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Patient whereUserId($value)
 * @mixin \Eloquent
 */
class Patient extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'phone','insurance_no','user_id','shift_id'];
    protected function name() : Attribute {
        return Attribute::make(
            set:fn($value)=> trim($value),
        );
    }
    protected  $with = ['labrequests'];

    public function doctor(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Doctor::class);
    }
    public function labrequests(){
      return  $this->belongsToMany(MainTest::class,'labrequests','pid','main_test_id');
    }
}
