<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\DoctorService
 *
 * @property int $id
 * @property int $doctor_id
 * @property int $service_id
 * @property float $percentage
 * @property float $fixed
 * @property-read \App\Models\Doctor $doctor
 * @property-read \App\Models\Service $service
 * @method static \Illuminate\Database\Eloquent\Builder|DoctorService newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DoctorService newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DoctorService query()
 * @method static \Illuminate\Database\Eloquent\Builder|DoctorService whereDoctorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DoctorService whereFixed($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DoctorService whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DoctorService wherePercentage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DoctorService whereServiceId($value)
 * @mixin \Eloquent
 */
class DoctorService extends Model
{
    use HasFactory;
    protected $with = ['service'];
    public $timestamps= false;
    protected $fillable = ['fixed','percentage'];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }
}
