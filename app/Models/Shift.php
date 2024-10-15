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
 * @property int $touched
 * @property-read mixed $bankak
 * @property-read mixed $paid_web
 * @method static \Illuminate\Database\Eloquent\Builder|Shift whereTouched($value)
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Cost> $cost
 * @property-read int|null $cost_count
 * @property-read mixed $max_shift_id
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Deduct> $deducts
 * @property-read int|null $deducts_count
 * @property-read mixed $total_deducts_price
 * @property-read mixed $total_deducts_price_bank
 * @property-read mixed $total_deducts_price_cash
 * @property-read mixed $total_deducts_price_transfer
 * @property-read mixed $paid_lab
 * @property-read mixed $specialists
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Specialist> $sepcialists
 * @property-read int|null $sepcialists_count
 * @property-read mixed $total_deducts_post_paid
 * @property-read mixed $total_deducts_paid
 * @mixin \Eloquent
 */
class Shift extends Model
{
    use HasFactory;

    protected $fillable = ['total',	'bank'	,'expenses'	,'closed_at','is_closed','touched'];
    public function patients(){
        return $this->hasMany(Patient::class);
    }
    public function doctorShifts(){
        return $this->hasMany(DoctorShift::class);
    }

//    protected $with = ['patients','cost','deducts'];

    /**
     * cash + insurance test prices values only paid
     * @return int
     */
    public function totalLab( $user = null){
        $total = 0;
        /** @var Patient $patient */
        foreach ($this->patients as $patient){
            if ($user){
                if ($patient->user_id != $user){
                    continue;
                }
            }
            if ($patient->is_lab_paid){
                $total += $patient->total_lab_value_unpaid();

            }
        }
        return $total;
    }
    public function getSpecialistsAttribute()
    {
        return $this->specialists();
    }
   public function specialists()
   {
        return \DB::table("doctor_shifts")
            ->join("doctors", function($join){
                $join->on("doctors.id", "=", "doctor_shifts.doctor_id");
            })
            ->join("specialists", function($join){
                $join->on("specialists.id", "=", "doctors.specialist_id");
            })
            ->select(['specialists.id','specialists.name'])
            ->where('doctor_shifts.shift_id', $this->id)
            ->groupBy("specialists.id")
            ->get();
   }
    public function totalLabDiscount($user=null){
        $total = 0;
        /** @var Patient $patient */
        foreach ($this->patients as $patient){
            if ($patient->is_lab_paid){
                $total += $patient->discountAmount($user);

            }
        }
        return $total;
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

//                if ($doctorvisit->patient->is_lab_paid == 1){
//                    $total += $doctorvisit->patient->paid();
//                }
                $total+= $doctorvisit->total_paid_services();
            }
        }

        return $total;
    }

    public function sepcialists()
    {
      return  $this->hasManyThrough(Specialist::class,Doctor::class);
    }
    public function totalPaidService($user = null): mixed
    {
        $total = 0;
//        return  $this->doctorShifts;
        /** @var DoctorShift $doctorShift */
        foreach ($this->doctorShifts as $doctorShift){


            /** @var Doctorvisit $doctorvisit */
            foreach ($doctorShift->visits as $doctorvisit){
//               return   $doctorvisit;
                $total+= $doctorvisit->total_paid_services(null, $user);
            }
        }

        return $total;
    }    public function companies($user = null)
    {

        /** @var DoctorShift $doctorShift */
        foreach ($this->doctorShifts as $doctorShift){

            $companies = collect();
            /** @var Doctorvisit $doctorvisit */
            foreach ($doctorShift->visits as $doctorvisit){

              if ($doctorvisit->patient->company){
                  $obj = [];
                 if ($companies->contains('id', $doctorvisit->patient->company->id)){
                     $obj['id'] = $doctorvisit->patient->company->id;
                     $obj['name'] = $doctorvisit->patient->company->name;
                     $obj['count'] = 1;
                     $companies->push($obj);


                 }else{
                    $companies->map(function($item) use($doctorvisit){
                        if ($item->id == $doctorvisit->patient->company->id){
                        }
                    });
                 }
              }

            }
        }
        return $companies;

    }

    public function totalPaidServiceInsurance($user = null): mixed
    {
        $total = 0;
        /** @var DoctorShift $doctorShift */
        foreach ($this->doctorShifts as $doctorShift){

            /** @var Doctorvisit $doctorvisit */
            foreach ($doctorShift->visits as $doctorvisit){
                if (!$doctorvisit->patient->company) continue;
                $total+= $doctorvisit->total_paid_services(null, $user);
            }
        }

        return $total;
    }
    public function totalServicesValue($user = null): mixed
    {
        $total = 0;
        /** @var DoctorShift $doctorShift */
        foreach ($this->doctorShifts as $doctorShift){

            /** @var Doctorvisit $doctorvisit */
            foreach ($doctorShift->visits as $doctorvisit){
                if (!$doctorvisit->patient->company) continue;
                $total+= $doctorvisit->total_services(null, $user);
            }
        }

        return $total;
    }
    public function totalPaidServiceBank($user= null): mixed
    {
        $total = 0;
        /** @var DoctorShift $doctorShift */
        foreach ($this->doctorShifts as $doctorShift){

            /** @var Doctorvisit $doctorvisit */
            foreach ($doctorShift->visits as $doctorvisit){
                foreach ($doctorvisit->services as $service){
                    if ($user !=null){

                        if ($service->user_deposited != $user) continue;
                    }
                    if ($service->bank == 1){
                        $total += $service->amount_paid;

                    }
                }
            }
        }

        return $total;
    }
    protected $appends = ['maxShiftId','specialists'];
//    protected $appends = ['maxShiftId','specialists'];

    public function getTotalDeductsPriceAttribute()
    {
        return $this->totalDeductsPrice();
    }
    public function getTotalDeductsPaidAttribute()
    {
        return $this->totalDeductsPaid();
    }

    function getMaxShiftIdAttribute()
    {
        return self::max('id');
    }



    public function paidLab($user = null){
        $total = 0;
        /** @var Patient $patient */
        foreach ($this->patients as $patient){
                $total += $patient->paid_lab($user);
        }
        return $total;
    }
    public function paidLabInsurance($user = null){
        $total = 0;
        /** @var Patient $patient */
        foreach ($this->patients as $patient){
            if (!$patient->company) continue;
                $total += $patient->paid_lab($user);
        }
        return $total;
    }
    public function labInsuranceValue($user = null){
        $total = 0;
        /** @var Patient $patient */
        foreach ($this->patients as $patient){
            if (!$patient->company) continue;
                $total += $patient->total_lab_value_unpaid();
        }
        return $total;
    }
    public function paidLabBank($user = null){
        $total = 0;
        /** @var Patient $patient */
        foreach ($this->patients as $patient){
            $total += $patient->lab_bank($user);
        }
        return $total;
    }
    public function bankakLab($user = null){
        $total = 0;
        /** @var Patient $patient */
        foreach ($this->patients as $patient){
                $total += $patient->lab_bank($user);
        }
        return $total;
    }
    public  function cost()
    {
        return $this->hasMany(Cost::class);
    }
    public function totalCost(){
        $total = 0;
        foreach ($this->cost as $cost){
            $total+= $cost->amount;
        }
        return $total;
    }
    public function deducts()
    {
        return $this->hasMany(Deduct::class)->orderByDesc('id');
    }


    public function deductSummary()
    {
        $totalDeductsPrice = 0;
        $totalDeductsPaid = 0;
        $totalDeductsPriceBank = 0;
        $totalDeductsPriceCash = 0;
        foreach ($this->deducts as $deduct){
            if (!$deduct->complete || $deduct->is_sell ==0) continue;
            $totalDeductsPrice += $deduct->total_price();
            $totalDeductsPaid += $deduct->total_paid();

            if ($deduct->payment_type_id == 1 && !$deduct->is_postpaid ){
                $totalDeductsPriceCash += $deduct->total_paid();

            }
            if ($deduct->payment_type_id == 3 ){
                $totalDeductsPriceBank += $deduct->total_paid();
            }
        }
        return ['totalDeductsPrice' => $totalDeductsPrice,'totalDeductsPaid'=>$totalDeductsPaid,'totalDeductsPriceBank'=>$totalDeductsPriceBank,'totalDeductsPriceCash'=>$totalDeductsPriceCash];
    }

    public function totalItemsProfit(){
        $total = 0;
        foreach ($this->deducts as $deduct){
            if (!$deduct->complete || $deduct->is_sell ==0) continue;

                $total += $deduct->profit();
        }
        return $total;
    }
    public function totalDeductsPriceTransfer()
    {
        $total = 0;

        foreach ($this->deducts as $deduct){
            if (!$deduct->complete || $deduct->is_sell ==0) continue;

            if ($deduct->payment_type_id == 2 ){
                $total += $deduct->total_paid();

            }
        }

        return $total;
    }



}
