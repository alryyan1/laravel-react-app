<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\PrescribedDrug
 *
 * @property int $id
 * @property int $patient_id
 * @property int $doctor_id
 * @property int $item_id
 * @property string $course
 * @property string $days
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Item $item
 * @property-read \App\Models\Patient $patient
 * @method static \Illuminate\Database\Eloquent\Builder|PrescribedDrug newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PrescribedDrug newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PrescribedDrug query()
 * @method static \Illuminate\Database\Eloquent\Builder|PrescribedDrug whereCourse($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PrescribedDrug whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PrescribedDrug whereDays($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PrescribedDrug whereDoctorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PrescribedDrug whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PrescribedDrug whereItemId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PrescribedDrug wherePatientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PrescribedDrug whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class PrescribedDrug extends Model
{
    use HasFactory;
    protected $table = 'drugs_prescribed';
    protected $guarded = [];
    protected $with =['item'];
    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function item()
    {
        return $this->belongsTo(Item::class);
    }

}
