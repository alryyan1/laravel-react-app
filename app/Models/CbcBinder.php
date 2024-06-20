<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use mysql_xdevapi\Table;

/**
 * App\Models\CbcBinder
 *
 * @property int $id
 * @property string $name_in_sysmex_table
 * @property string $name_in_cbc_child_table
 * @method static \Illuminate\Database\Eloquent\Builder|CbcBinder newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CbcBinder newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CbcBinder query()
 * @method static \Illuminate\Database\Eloquent\Builder|CbcBinder whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CbcBinder whereNameInCbcChildTable($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CbcBinder whereNameInSysmexTable($value)
 * @property string $child_id_array
 * @method static \Illuminate\Database\Eloquent\Builder|CbcBinder whereChildIdArray($value)
 * @mixin \Eloquent
 */
class CbcBinder extends Model
{
    public $timestamps = false;
    protected $guarded = [];
    protected $table = 'cbc_bindings';
    use HasFactory;
}
