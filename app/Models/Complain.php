<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complain extends Model
{
    protected $table ='chief_complain';
    use HasFactory;
    public $timestamps = false;
    protected $guarded = [];
}
