<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FilePatient extends Model
{
    protected $table = 'file_patient';
//    protected $with =['file'];
    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function file()
    {
        return $this->belongsTo(File::class);
    }
//    protected $appends =['patients'];
//    public function getPatientsAttribute()
//    {
//        return $this->patients();
//    }
    public function patients(){
        return $this->hasMany(FilePatient::class,'file_id');
    }
    use HasFactory;
}
