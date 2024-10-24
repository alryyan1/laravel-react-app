<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\DoctorShift
 *
 * @property int $id
 * @property int $user_id
 * @property int $shift_id
 * @property int $doctor_id
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Doctor $doctor
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|DoctorShift newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DoctorShift newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DoctorShift query()
 * @method static \Illuminate\Database\Eloquent\Builder|DoctorShift whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DoctorShift whereDoctorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DoctorShift whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DoctorShift whereShiftId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DoctorShift whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DoctorShift whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DoctorShift whereUserId($value)
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Patient> $visits
 * @property-read int|null $visits_count
 * @property-read \App\Models\Cost|null $cost
 * @property-read mixed $doctor_credit_cash
 * @property-read mixed $doctor_credit_company
 * @property-read mixed $total
 * @mixin \Eloquent
 */
class DoctorShift extends Model
{

    protected $fillable = ['user_id','doctor_id','status','shift_id'];
//    protected $with = ['visits','cost'];
    protected $with = ['visits','cost'];
//    protected $appends  = ['total','doctor_credit_cash','doctor_credit_company'];
    public function getTotalAttribute()
    {
        return $this->total_paid_services();
    }
    public function getDoctorCreditCashAttribute()
    {
        return $this->doctor_credit_cash();
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function getDoctorCreditCompanyAttribute()
    {
        return $this->doctor_credit_company();
    }

    public function doctor(){
        return $this->belongsTo(Doctor::class);
    }
    public function visits(){
        return $this->hasMany(Doctorvisit::class);
    }
    public function total_paid_services(){
        $total_paid = 0;
        /** @var Doctorvisit $doctorvisit */
        foreach ($this->visits as $doctorvisit){
            $total_paid+= $doctorvisit->total_paid_services($this->doctor);
        }
        return $total_paid;
    }
    public function total_services(){
        $total_paid = 0;
        /** @var Doctorvisit $doctorvisit */
        foreach ($this->visits as $doctorvisit){
            $total_paid+= $doctorvisit->total_services($this->doctor);
        }
        return $total_paid;
    }
    public function total_bank(){
        $total_paid = 0;
        /** @var Doctorvisit $doctorvisit */
        foreach ($this->visits as $doctorvisit){
            $total_paid+= $doctorvisit->bankak_service();
        }
        return $total_paid;
    }
    public function doctor_credit_cash(){
        $total_credit = 0;
        /** @var Doctorvisit $doctorvisit */
        foreach ($this->visits as $doctorvisit){
            if ($doctorvisit->patient->company_id == null){
                $total_credit += $this->doctor->doctor_credit($doctorvisit);
            }
        }
        return $total_credit;
    }
    public function doctor_credit_company(){
        $total_credit = 0;
        /** @var Doctorvisit $doctorvisit */
        foreach ($this->visits as $doctorvisit){
            if ($doctorvisit->patient->company_id != null){
                $total_credit += $this->doctor->doctor_credit($doctorvisit);
            }
        }
        return $total_credit;
    }
    public function hospital_credit(){
        return $this->total_paid_services() -( $this->doctor_credit_cash() + $this->doctor_credit_company());
    }

    public function cost()
    {
        return $this->hasOne(Cost::class);
    }
    use HasFactory;
}
