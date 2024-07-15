<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $guarded = [];
    //disable timestamps
    public $timestamps = false;
    
    
    use HasFactory;
}
