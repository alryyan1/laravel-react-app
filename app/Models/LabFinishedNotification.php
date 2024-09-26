<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LabFinishedNotification extends Model
{
    protected $guarded = ['id'];
    use HasFactory;
    protected $table = 'lab_finished_notifications';
}
