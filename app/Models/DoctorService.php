<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
