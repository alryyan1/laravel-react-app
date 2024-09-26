<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewPatientNotification extends Model
{
    protected $guarded = ['id'];
    protected $table = 'new_patient_notifications';
    use HasFactory;
}
