<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Counting
 *
 * @property int $id
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Counting newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Counting newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Counting query()
 * @method static \Illuminate\Database\Eloquent\Builder|Counting whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Counting whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Counting whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Counting whereUserId($value)
 * @mixin \Eloquent
 */
class Counting extends Model
{
    use HasFactory;
}
