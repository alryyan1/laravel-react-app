<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Complain
 *
 * @property int $id
 * @property string $name
 * @method static \Illuminate\Database\Eloquent\Builder|Complain newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Complain newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Complain query()
 * @method static \Illuminate\Database\Eloquent\Builder|Complain whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Complain whereName($value)
 * @mixin \Eloquent
 */
class Complain extends Model
{
    protected $table ='chief_complain';
    use HasFactory;
    public $timestamps = false;
    protected $guarded = [];
}
