<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class DepositSupplier extends Pivot
{
    public function supplier(){
        return $this->belongsTo(Supplier::class);
    }
}
