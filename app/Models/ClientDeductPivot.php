<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class ClientDeductPivot extends Pivot
{
    public function client(){
        return $this->belongsTo(Client::class);
    }
}
