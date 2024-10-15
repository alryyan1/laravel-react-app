<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Sickleave
 *
 * @property int $id
 * @property int $patient_id
 * @property string $from
 * @property string $to
 * @property string|null $job_and_place_of_work
 * @property string|null $hospital_no
 * @property string|null $o_p_department
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Patient $patient
 * @method static \Illuminate\Database\Eloquent\Builder|Sickleave newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Sickleave newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Sickleave query()
 * @method static \Illuminate\Database\Eloquent\Builder|Sickleave whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sickleave whereFrom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sickleave whereHospitalNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sickleave whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sickleave whereJobAndPlaceOfWork($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sickleave whereOPDepartment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sickleave wherePatientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sickleave whereTo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sickleave whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Sickleave extends Model
{
    protected $guarded = ['id'];
    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
    use HasFactory;
}
