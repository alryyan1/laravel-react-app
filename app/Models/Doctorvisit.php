<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Doctorvisit
 *
 * @property int $id
 * @property int $patient_id
 * @property int $doctor_shift_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\DoctorShift $doctorShift
 * @property-read mixed $total_service_bank
 * @property-read \App\Models\Patient $patient
 * @property-read int|null $services_count
 * @method static \Illuminate\Database\Eloquent\Builder|Doctorvisit newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Doctorvisit newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Doctorvisit query()
 * @method static \Illuminate\Database\Eloquent\Builder|Doctorvisit whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Doctorvisit whereDoctorShiftId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Doctorvisit whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Doctorvisit wherePatientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Doctorvisit whereUpdatedAt($value)
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\RequestedService> $requested_services
 * @property-read int|null $requested_services_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\RequestedService> $services
 * @property-read mixed $total_paid_services
 * @property-read mixed $total_discounted
 * @property-read mixed $total_services
 * @mixin \Eloquent
 */
class Doctorvisit extends Model
{
    use HasFactory;
    protected $with = ['patient','services'];
    protected $table = 'doctor_visit';
    public function getTotalServiceBankAttribute()
    {
        return $this->bankak_service();
    }

    protected $appends = ['total_paid_services','total_services','total_discounted'];
//    public function services(){
//        return $this->belongsToMany(Service::class,'requested_service','doctor_visit_id','service_id')->withPivot(['price','bank','amount_paid','doctor_id','user_id','discount','is_paid','count'])->using(UserPivot::class);
//    }

  public function services()
    {
        return $this->hasMany(RequestedService::class,'doctor_visit_id');
    }

    public function patient(){
        return $this->belongsTo(Patient::class);
    }

    public function doctorShift(){
        return $this->belongsTo(DoctorShift::class);
    }
    public function getTotalPaidServicesAttribute()
    {
        return $this->total_paid_services();
    }
    public function total_paid_services(Doctor|null $doctor  = null,$user= null){
        $total = 0;
//        dd($this->services);
        foreach ($this->services as $service){

//            if (!$service->is_paid) continue;
            if (!is_null($doctor)){
                if ($doctor->id != $service->doctor_id ){
                    continue;
                }

            }
            if ($user !=null){
                    if ($service->user_deposited != $user) continue;
                      $total += $service->amount_paid;

            }else{
                $total += $service->amount_paid;

            }

        }
        return $total;
    }
    public function total_paid_services_insurance(Doctor|null $doctor  = null,$user= null){
        $total = 0;
         if (!$this->patient->company) return  0;
//        dd($this->services);
        foreach ($this->services as $service){

//            if (!$service->is_paid) continue;
            if (!is_null($doctor)){
                if ($doctor->id != $service->doctor_id ){
                    continue;
                }

            }
            if ($user !=null){
                    if ($service->user_deposited != $user) continue;
                      $total += $service->amount_paid;

            }else{
                $total += $service->amount_paid;

            }

        }
        return $total;
    }
    public function getTotalServicesAttribute()
    {
        return $this->total_services();
    }
    public function total_services(Doctor|null $doctor  = null,$user= null){
        $total = 0;
//        dd($this->services);
        foreach ($this->services as $service){

//            if (!$service->is_paid) continue;
            if (!is_null($doctor)){
                if ($doctor->id != $service->doctor_id ){
                    continue;
                }

            }
            if ($user !=null){
                    if ($service->user_deposited != $user) continue;
                      $total += $service->price;

            }else{
                $total += $service->price;

            }

        }
        return $total;
    }
    public function bankak_service(){

        $total = 0;
        foreach ($this->services as $service){
            if ($service->is_paid && $service->bank == 1){

                 $total += $service->amount_paid ;
//                $discount = $service->discount;
//                $discounted_money = ($price * $discount ) / 100;
//                $patient_paid =   $price - $discounted_money ;
//                $total+=$patient_paid;

            }

        }
        return $total;

    }
    public function getTotalDiscountedAttribute()
    {
        return $this->total_discounted();
    }
    public function total_discounted(){

        $total = 0;
        foreach ($this->services as $service){
            if ($service->discount > 0){

                 $price= $service->price ;
                $discount = $service->discount;
                $discounted_money = ($price * $discount ) / 100;
                $total += $discounted_money;
//                $patient_paid =   $price - $discounted_money ;
//                $total+=$patient_paid;

            }

        }
        return $total;

    }
    public function services_concatinated(){
        return $this->services->filter(function (RequestedService $item){
            return $item->is_paid == 1;
        })->reduce(function($prev,$current){
            return $prev .' - '. $current->service->name.'x'.$current->count;
        },'');
    }
    public function services_concatinated_specfic(Doctor $doctor){
        return  join('-', $this->services->filter(function ($service) use ($doctor){
            return $service->doctor_id == $doctor->id;
        })->pluck('name')->all());
    }
}
