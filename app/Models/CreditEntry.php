<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CreditEntry extends Model
{
    protected $guarded = [];
    protected $table = 'credit_entries';
    use HasFactory;
    public function account(){
        return $this->belongsTo(FinanceAccount::class,'finance_account_id');
    }
}
