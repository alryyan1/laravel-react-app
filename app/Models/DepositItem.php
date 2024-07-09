<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DepositItem extends Model
{
    protected $guarded = ['id'];
    use HasFactory;
    protected $with = ['item'];
    public function item()
    {
        return $this->belongsTo(Item::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function deposit()
    {
        return $this->belongsTo(Deposit::class);
    }
}
