<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\RequestedService
 *
 * @property int $id
 * @property int $doctor_visit_id
 * @property int $service_id
 * @property int $user_id
 * @property int|null $user_deposited
 * @property int $doctor_id
 * @property float $price
 * @property float $amount_paid
 * @property float $endurance
 * @property int $is_paid
 * @property int $discount
 * @property int $bank
 * @property int $count
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Doctorvisit $doctorVisit
 * @property-read \App\Models\Service $service
 * @method static \Illuminate\Database\Eloquent\Builder|RequestedService newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RequestedService newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RequestedService query()
 * @method static \Illuminate\Database\Eloquent\Builder|RequestedService whereAmountPaid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RequestedService whereBank($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RequestedService whereCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RequestedService whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RequestedService whereDiscount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RequestedService whereDoctorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RequestedService whereDoctorVisitId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RequestedService whereEndurance($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RequestedService whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RequestedService whereIsPaid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RequestedService wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RequestedService whereServiceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RequestedService whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RequestedService whereUserDeposited($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RequestedService whereUserId($value)
 * @mixin \Eloquent
 */
class RequestedService extends Model
{
    protected $guarded =['id'];

    protected $with = ['service'];
    public function doctorVisit()
    {
        return $this->belongsTo(DoctorVisit::class,'doctor_visit_id');
    }
    public function service()
    {
        return $this->belongsTo(Service::class);
    }
    use HasFactory;
}
