<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\NewPatientNotification
 *
 * @property int $id
 * @property int $patient_id
 * @property int $sent
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|NewPatientNotification newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|NewPatientNotification newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|NewPatientNotification query()
 * @method static \Illuminate\Database\Eloquent\Builder|NewPatientNotification whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NewPatientNotification whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NewPatientNotification wherePatientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NewPatientNotification whereSent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NewPatientNotification whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class NewPatientNotification extends Model
{
    protected $guarded = ['id'];
    protected $table = 'new_patient_notifications';
    use HasFactory;
}
