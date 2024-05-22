<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

/**
 * App\Models\UserPivot
 *
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|UserPivot newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserPivot newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserPivot query()
 * @mixin \Eloquent
 */
class UserPivot extends Pivot
{
    public function user(){
        return $this->belongsTo(User::class);
    }
}
