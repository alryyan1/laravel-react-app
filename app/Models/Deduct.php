<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Deduct
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Item> $items
 * @property-read int|null $items_count
 * @method static \Illuminate\Database\Eloquent\Builder|Deduct newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Deduct newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Deduct query()
 * @method static \Illuminate\Database\Eloquent\Builder|Deduct whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Deduct whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Deduct whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Deduct extends Model
{
    use HasFactory;
    protected $with = ['items'];
    public function items(){
        return $this->belongsToMany(Item::class,'deducted_items','deduct_id','item_id')->withPivot(['client_id','quantity'])->using(ClientDeductPivot::class);
    }
}
