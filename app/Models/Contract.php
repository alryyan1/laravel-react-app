<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    protected $guarded = [];
    use HasFactory;
    protected $with = ['states'];

    public function states(){
        return $this->hasMany(ContractState::class);
    }
}
