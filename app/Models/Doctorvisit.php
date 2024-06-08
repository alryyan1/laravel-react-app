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
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Service> $services
 * @property-read int|null $services_count
 * @method static \Illuminate\Database\Eloquent\Builder|Doctorvisit newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Doctorvisit newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Doctorvisit query()
 * @method static \Illuminate\Database\Eloquent\Builder|Doctorvisit whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Doctorvisit whereDoctorShiftId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Doctorvisit whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Doctorvisit wherePatientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Doctorvisit whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Doctorvisit extends Model
{
    use HasFactory;
    protected $with = ['services','services.pivot.user','patient'];
    protected $table = 'doctor_visit';
    public function getTotalServiceBankAttribute()
    {
        return $this->bankak_service();
    }
    protected $appends = ['totalservicebank'];
    public function services(){
        return $this->belongsToMany(Service::class,'requested_service','doctor_visit_id','service_id')->withPivot(['price','bank','amount_paid','doctor_id','user_id','discount','is_paid','count'])->using(UserPivot::class);
    }

    public function patient(){
        return $this->belongsTo(Patient::class);
    }

    public function doctorShift(){
        return $this->belongsTo(DoctorShift::class);
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
    public function services_concatinated(){
        return join(' - ',$this::services()->pluck('name')->all());
    }
    public function services_concatinated_specfic(Doctor $doctor){
        return  join('-', $this->services->filter(function ($service) use ($doctor){
            return $service->pivot->doctor_id == $doctor->id;
        })->pluck('name')->all());
    }
}
