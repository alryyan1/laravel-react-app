<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\ShippingState
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ShippingState newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ShippingState newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ShippingState query()
 * @method static \Illuminate\Database\Eloquent\Builder|ShippingState whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShippingState whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShippingState whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShippingState whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ShippingState extends Model
{
    protected $fillable = ['name'];
    use HasFactory;
}
