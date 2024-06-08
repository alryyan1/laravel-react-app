<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\This;

/**
 * App\Models\Shift
 *
 * @property int $id
 * @property float $total
 * @property float $bank
 * @property float $expenses
 * @property string|null $closed_at
 * @property int $is_closed
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Patient> $patients
 * @property-read int|null $patients_count
 * @method static \Illuminate\Database\Eloquent\Builder|Shift newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Shift newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Shift query()
 * @method static \Illuminate\Database\Eloquent\Builder|Shift whereBank($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shift whereClosedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shift whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shift whereExpenses($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shift whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shift whereIsClosed($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shift whereTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shift whereUpdatedAt($value)
 * @property-read mixed $total_paid
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\DoctorShift> $doctorShifts
 * @property-read int|null $doctor_shifts_count
 * @mixin \Eloquent
 */
class Shift extends Model
{
    use HasFactory;

    protected $fillable = ['total',	'bank'	,'expenses'	,'closed_at','is_closed'];
    public function patients(){
        return $this->hasMany(Patient::class);
    }
    public function doctorShifts(){
        return $this->hasMany(DoctorShift::class);
    }

    protected $with = ['patients'];

    public function total(){
        $this::patients();
    }

    /**
     * return total lab money considering discounts
     * @return int|mixed
     */
    public function totalPaid(): mixed
    {
        $total = 0;

        /** @var DoctorShift $doctorShift */
        foreach ($this->doctorShifts as $doctorShift){

            /** @var Doctorvisit $doctorvisit */
            foreach ($doctorShift->visits as $doctorvisit){

                if ($doctorvisit->patient->is_lab_paid == 1){
                    $total += $doctorvisit->patient->paid();
                }
                $total+= $doctorvisit->total_paid_services();
            }
        }

        return $total;
    }

    public function totalPaidService(): mixed
    {
        $total = 0;
//        return  $this->doctorShifts;
        /** @var DoctorShift $doctorShift */
        foreach ($this->doctorShifts as $doctorShift){


            /** @var Doctorvisit $doctorvisit */
            foreach ($doctorShift->visits as $doctorvisit){
//               return   $doctorvisit;
                $total+= $doctorvisit->total_paid_services();
            }
        }

        return $total;
    }
    public function totalPaidServiceBank(): mixed
    {
        $total = 0;
        /** @var DoctorShift $doctorShift */
        foreach ($this->doctorShifts as $doctorShift){

            /** @var Doctorvisit $doctorvisit */
            foreach ($doctorShift->visits as $doctorvisit){
                foreach ($doctorvisit->services as $service){
                    if ($service->pivot->bank == 1){
                        $total += $service->pivot->amount_paid;

                    }
                }
            }
        }

        return $total;
    }
    protected $appends = ['totalPaid'];
    function getTotalPaidAttribute()
    {
        return $this->totalPaid();
    }

    public function totalBank(){
        $total = 0;
        /** @var Patient $patient */
        foreach ($this->patients as $patient){
            if ($patient->is_lab_paid == 1){
                $total += $patient->paid();
            }
        }
        return $total;
    }
}
