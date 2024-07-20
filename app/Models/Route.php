<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    protected $fillable = ['name','path'];
    protected $with = ['sub_routes'];
    use HasFactory;
    public function sub_routes(){
        return $this->hasMany(SubRoute::class);
    }
}
