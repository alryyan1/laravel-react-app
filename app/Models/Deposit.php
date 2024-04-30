<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deposit extends Model
{
    use HasFactory;

    protected $fillable =['bill_number','bill_date','complete','supplier_id'];
    public function items(){
        return $this->belongsToMany(Item::class,'deposit_items','deposit_id','item_id')->withPivot(['price','quantity']);
    }
    public function supplier(){
        return $this->belongsTo(Supplier::class);
    }
    protected $with =['items','supplier'];



}
