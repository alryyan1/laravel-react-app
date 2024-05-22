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
 * @mixin \Eloquent
 */
class DoctorShift extends Model
{
    protected $fillable = ['user_id','doctor_id','status','shift_id'];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function doctor(){
        return $this->belongsTo(Doctor::class);
    }
    public function visits(){
        return $this->belongsToMany(Patient::class,'doctor_visit','doctor_shift_id','patient_id');
    }
    use HasFactory;
}
