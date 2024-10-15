<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\LabFinishedNotification
 *
 * @property int $id
 * @property int $patient_id
 * @property int $sent
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|LabFinishedNotification newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LabFinishedNotification newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LabFinishedNotification query()
 * @method static \Illuminate\Database\Eloquent\Builder|LabFinishedNotification whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LabFinishedNotification whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LabFinishedNotification wherePatientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LabFinishedNotification whereSent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LabFinishedNotification whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class LabFinishedNotification extends Model
{
    protected $guarded = ['id'];
    use HasFactory;
    protected $table = 'lab_finished_notifications';
}
