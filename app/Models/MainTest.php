<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MainTest extends Model
{
    use HasFactory;
    public function Package(){
        return $this->belongsTo(Package::class,'pack_id','package_id');
    }
}
