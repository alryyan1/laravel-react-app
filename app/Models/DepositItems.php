<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\DepositItems
 *
 * @property int $id
 * @property int $item_id
 * @property int $deposit_id
 * @property int $quantity
 * @property float $price
 * @property string|null $batch
 * @property string|null $expire
 * @property string|null $notes
 * @property string|null $barcode
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|DepositItems newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DepositItems newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DepositItems query()
 * @method static \Illuminate\Database\Eloquent\Builder|DepositItems whereBarcode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DepositItems whereBatch($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DepositItems whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DepositItems whereDepositId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DepositItems whereExpire($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DepositItems whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DepositItems whereItemId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DepositItems whereNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DepositItems wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DepositItems whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DepositItems whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DepositItems whereUserId($value)
 * @mixin \Eloquent
 */
class DepositItems extends Model
{
    use HasFactory;
    protected $table = 'deposit_items';
}
