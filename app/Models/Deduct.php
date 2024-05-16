<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deduct extends Model
{
    use HasFactory;
    protected $with = ['items'];
    public function items(){
        return $this->belongsToMany(Item::class,'deducted_items','deduct_id','item_id')->withPivot(['client_id','quantity'])->using(ClientDeductPivot::class);
    }
}
