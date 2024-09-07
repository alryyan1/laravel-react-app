<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\HormoneBinder
 *
 * @property int $id
 * @property string $child_id_array
 * @property string $name_in_hormone_table
 * @method static \Illuminate\Database\Eloquent\Builder|HormoneBinder newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|HormoneBinder newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|HormoneBinder query()
 * @method static \Illuminate\Database\Eloquent\Builder|HormoneBinder whereChildIdArray($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HormoneBinder whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HormoneBinder whereNameInHormoneTable($value)
 * @mixin \Eloquent
 */
class HormoneBinder extends Model
{
    public $timestamps = false;
    protected $guarded = [];
    protected $table = 'hormone_bindings';
    use HasFactory;
}
