<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoctorShift extends Model
{
    protected $fillable = ['user_id','doctor_id','status','shift_id'];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function doctor(){
        return $this->belongsTo(Doctor::class);
    }
    public function visits(){
        return $this->belongsToMany(Patient::class,'doctor_visit','doctor_shift_id','patient_id');
    }
    use HasFactory;
}
