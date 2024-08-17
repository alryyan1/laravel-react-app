<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\ChemistryBinder
 *
 * @property int $id
 * @property string $child_id_array
 * @property string $name_in_mindray_table
 * @method static \Illuminate\Database\Eloquent\Builder|ChemistryBinder newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ChemistryBinder newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ChemistryBinder query()
 * @method static \Illuminate\Database\Eloquent\Builder|ChemistryBinder whereChildIdArray($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChemistryBinder whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChemistryBinder whereNameInMindrayTable($value)
 * @mixin \Eloquent
 */
class ChemistryBinder extends Model
{
    public $timestamps = false;
    protected $table = 'chemistry_bindings';
    protected $guarded = [];
    use HasFactory;
}
