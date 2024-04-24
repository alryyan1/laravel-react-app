<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deposit extends Model
{
    use HasFactory;

    public function items(){
        return $this->belongsToMany(Item::class,'deposit_items','deposit_id','item_id')->withPivot(['price','quantity','supplier_id'])->using(DepositSupplier::class);
    }
//    public function suppliers(){
//        return $this->belongsToMany(Supplier::class,'deposit_items','deposit_id','supplier_id');
//    }
    protected $with =['items'];



}
