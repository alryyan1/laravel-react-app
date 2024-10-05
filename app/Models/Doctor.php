<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Doctor
 *
 * @property int $id
 * @property string $name
 * @property int $specialist_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Doctor newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Doctor newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Doctor query()
 * @method static \Illuminate\Database\Eloquent\Builder|Doctor whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Doctor whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Doctor whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Doctor whereSpecialistId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Doctor whereUpdatedAt($value)
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Patient> $patients
 * @property-read int|null $patients_count
 * @property-read \App\Models\Specialist $specialist
 * @method static \Database\Factories\DoctorFactory factory($count = null, $state = [])
 * @property string $phone
 * @property float $cash_percentage
 * @property float $company_percentage
 * @property float $static_wage
 * @property float $lab_percentage
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\DoctorShift> $shifts
 * @property-read int|null $shifts_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\DoctorShift> $shiftsByOrder
 * @property-read int|null $shifts_by_order_count
 * @method static \Illuminate\Database\Eloquent\Builder|Doctor whereCashPercentage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Doctor whereCompanyPercentage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Doctor whereLabPercentage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Doctor wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Doctor whereStaticWage($value)
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Service> $services
 * @property-read int|null $services_count
 * @property-read mixed $last_shift
 * @mixin \Eloquent
 */
class Doctor extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'phone','specialist_id','lab_percentage','company_percentage','static_wage','cash_percentage'];
    protected $with = ['services'];
    public function specialist()
    {
       return $this->belongsTo(Specialist::class);
    }
//    protected $appends = ['lastShift'];
    public function getLastShiftAttribute(){
        return $this->shiftsByOrder()->first();
    }
    public  function  patients(){
        return $this->hasMany(Patient::class);
    }

    public function shifts(){
        return $this->hasMany(DoctorShift::class);
    }
    public function shiftsByOrder(){
        return $this->hasMany(DoctorShift::class)->orderByDesc('id');
    }

    public function getLastShift(){
      return  DoctorShift::whereDoctorId($this->id)->orderByDesc('id')->first();
    }

    public function services()
    {
        return $this->hasMany(DoctorService::class);
    }

    public function doctor_credit(Doctorvisit $doctorvisit)
    {
        //filter only paid_services
//        $doctorvisit =  $doctorvisit->load(['services'=>function ($query) {
//            return  $query->where('is_paid',1);
//        }]);
        $array_1 =                $this->services()->pluck('service_id')->toArray();
        $total =  0 ;


        foreach ($doctorvisit->services as $service) {

            if ($service->doctor_id != $this->id) continue;



            if (in_array($service->service->id, $array_1)) {
                if ($doctorvisit->patient->company_id !=null){
//                    dd($service);
                    $patient_company =  $doctorvisit->patient->company;
                    $patient_company->load('services');
                    $company_service =  $patient_company->services->filter(function($item) use($service){
                        return $item->id == $service->service->id;
                    })->first();

                    $doctor_credit =   ($service->price * $service->count) * $this->company_percentage /100;
                    $total += $doctor_credit;
                }else{
                    $doctor_service =  $this->services->firstWhere(function ($item) use($service){
                           return $item->service_id == $service->service->id;
                    });


                     if($doctor_service->percentage > 0){
                        $doctor_credit = $service->amount_paid * $doctor_service->percentage/ 100;

                    }
                    elseif($doctor_service->fixed > 0 && $doctor_service->percentage == 0 ){
                        $doctor_credit = $doctor_service->fixed;

                    }else{
                         $doctor_credit = $service->amount_paid * $this->cash_percentage / 100;

                     }



                    $total += $doctor_credit;
                }

            }



        }
        return $total;
    }

}
