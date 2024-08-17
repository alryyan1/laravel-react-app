<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

/**
 * App\Models\DepositSupplier
 *
 * @property-read \App\Models\Supplier|null $supplier
 * @method static \Illuminate\Database\Eloquent\Builder|DepositSupplier newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DepositSupplier newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DepositSupplier query()
 * @mixin \Eloquent
 */
class DepositSupplier extends Pivot
{
    public function supplier(){
        return $this->belongsTo(Supplier::class);
    }
}
