<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceGroup extends Model
{
    protected $fillable = [ 'name'];
    protected $table = 'service_groups';
    public $timestamps = false;
    use HasFactory;
}
