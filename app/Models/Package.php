<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    public function tests(){
        return $this->hasMany(MainTest::class,'pack_id','package_id');
    }
}
