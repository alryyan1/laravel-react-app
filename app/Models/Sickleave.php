<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sickleave extends Model
{
    protected $guarded = ['id'];
    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
    use HasFactory;
}
