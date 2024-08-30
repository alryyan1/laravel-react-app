<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HormoneBinder extends Model
{
    public $timestamps = false;
    protected $guarded = [];
    protected $table = 'hormone_bindings';
    use HasFactory;
}
