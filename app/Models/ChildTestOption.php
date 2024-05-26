<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChildTestOption extends Model
{
    use HasFactory;
    protected $table = 'child_test_options';
    protected $fillable = ['name'];
    public $timestamps = false;
}
