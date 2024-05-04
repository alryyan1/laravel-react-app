<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shift extends Model
{
    use HasFactory;
    protected $fillable = ['total',	'bank'	,'expenses'	,'closed_at'];
    public function patients(){
        return $this->hasMany(Patient::class);
    }

    protected $with = ['patients'];

    public function total(){
        $this::patients();
    }
    public function totalPaid(){

    }
}
