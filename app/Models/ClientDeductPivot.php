<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

/**
 * App\Models\ClientDeductPivot
 *
 * @property-read \App\Models\Client|null $client
 * @method static \Illuminate\Database\Eloquent\Builder|ClientDeductPivot newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ClientDeductPivot newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ClientDeductPivot query()
 * @mixin \Eloquent
 */
class ClientDeductPivot extends Pivot
{
    public function client(){
        return $this->belongsTo(Client::class);
    }
}
