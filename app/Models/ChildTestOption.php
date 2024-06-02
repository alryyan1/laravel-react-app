<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\ChildTestOption
 *
 * @property int $id
 * @property string $name
 * @property int $child_test_id
 * @method static \Illuminate\Database\Eloquent\Builder|ChildTestOption newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ChildTestOption newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ChildTestOption query()
 * @method static \Illuminate\Database\Eloquent\Builder|ChildTestOption whereChildTestId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildTestOption whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildTestOption whereName($value)
 * @mixin \Eloquent
 */
class ChildTestOption extends Model
{
    use HasFactory;
    protected $table = 'child_test_options';
    protected $fillable = ['name'];
    public $timestamps = false;
}
