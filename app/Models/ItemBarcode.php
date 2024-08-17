<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\ItemBarcode
 *
 * @property int $id
 * @property string $barcode
 * @property int $box
 * @property string $expire_date
 * @method static \Illuminate\Database\Eloquent\Builder|ItemBarcode newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ItemBarcode newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ItemBarcode query()
 * @method static \Illuminate\Database\Eloquent\Builder|ItemBarcode whereBarcode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ItemBarcode whereBox($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ItemBarcode whereExpireDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ItemBarcode whereId($value)
 * @mixin \Eloquent
 */
class ItemBarcode extends Model
{
    public $timestamps = false;
    use HasFactory;
}
