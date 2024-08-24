<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Cbc5Binder
 *
 * @property int $id
 * @property string $child_id_array
 * @property string $name_in_sysmex_table
 * @method static \Illuminate\Database\Eloquent\Builder|Cbc5Binder newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Cbc5Binder newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Cbc5Binder query()
 * @method static \Illuminate\Database\Eloquent\Builder|Cbc5Binder whereChildIdArray($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cbc5Binder whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cbc5Binder whereNameInSysmexTable($value)
 * @mixin \Eloquent
 */
class Cbc5Binder extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $guarded = [];
    protected $table = 'cbc5_bindings';
}
