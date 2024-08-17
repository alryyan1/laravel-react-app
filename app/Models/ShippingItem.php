<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\ShippingItem
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ShippingItem newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ShippingItem newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ShippingItem query()
 * @method static \Illuminate\Database\Eloquent\Builder|ShippingItem whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShippingItem whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShippingItem whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShippingItem whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ShippingItem extends Model
{
    protected $fillable = ['name'];
    use HasFactory;
}
