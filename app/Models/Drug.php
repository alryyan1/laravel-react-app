<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Drug
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Drug newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Drug newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Drug query()
 * @property int $id
 * @property string $name
 * @method static \Illuminate\Database\Eloquent\Builder|Drug whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Drug whereName($value)
 * @mixin \Eloquent
 */
class Drug extends Model
{
    protected $guarded = ['id'];

    use HasFactory;
}
