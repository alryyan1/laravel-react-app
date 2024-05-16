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
 * @mixin \Eloquent
 */
class Doctor extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'phone','specialist_id'];

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


}
