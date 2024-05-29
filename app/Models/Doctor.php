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
    public  function  patients(){
        return $this->hasMany(Patient::class);
    }

    public function shifts(){
        return $this->hasMany(DoctorShift::class);
    }
    public function shiftsByOrder(){
        return $this->hasMany(DoctorShift::class)->orderByDesc('id');
    }

    public function services()
    {
        return $this->belongsToMany(Service::class,'doctor_services','doctor_id','service_id');
    }

    public function doctor_credit(Patient $patient)
    {
        //filter only paid_services
        $patient =  $patient->load(['services'=>function ($query) {
            return  $query->where('is_paid',1);
        }]);
        $array_1 =                $this->services()->pluck('services.id')->toArray();
        $total =  0 ;
        foreach ($patient->services as $service) {
            if ($service->pivot->doctor_id != $this->id) continue;
            if (in_array($service->id, $array_1)) {
                $doctor_credit = $service->pivot->amount_paid * $this->cash_percentage / 100;
                $total += $doctor_credit;
            }



        }
        return $total;
    }

}
