<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;
    protected $fillable = ['patient_id','file_id'];

    public function patients(){
        return $this->belongsToMany(Patient::class);
    }
}
