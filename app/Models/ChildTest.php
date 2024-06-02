<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\ChildTest
 *
 * @property string $child_test_name
 * @property float|null $low
 * @property float|null $upper
 * @property int $main_id
 * @property int $child_test_id
 * @property string $defval
 * @property int|null $Unit
 * @property string $normalRange
 * @property int $mulit_range
 * @property string $max
 * @property string $lowest
 * @method static \Illuminate\Database\Eloquent\Builder|ChildTest newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ChildTest newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ChildTest query()
 * @method static \Illuminate\Database\Eloquent\Builder|ChildTest whereChildTestId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildTest whereChildTestName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildTest whereDefval($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildTest whereLow($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildTest whereLowest($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildTest whereMainId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildTest whereMax($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildTest whereMulitRange($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildTest whereNormalRange($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildTest whereUnit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildTest whereUpper($value)
 * @property-read \App\Models\MainTest $mainTest
 * @property int $id
 * @property int $main_test_id
 * @property int|null $unit_id
 * @property int|null $test_order
 * @property int|null $child_group_id
 * @property-read \App\Models\childGroup|null $childGroup
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ChildTestOption> $options
 * @property-read int|null $options_count
 * @property-read \App\Models\Unit|null $unit
 * @method static \Illuminate\Database\Eloquent\Builder|ChildTest whereChildGroupId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildTest whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildTest whereMainTestId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildTest whereTestOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildTest whereUnitId($value)
 * @mixin \Eloquent
 */
class ChildTest extends Model
{

    use HasFactory;
    protected $guarded = ['id'];
//    protected $primaryKey = 'child_test_id';
    public $timestamps =false;
    protected $with = ['unit','childGroup'];
    public function mainTest(){
        return $this->belongsTo(MainTest::class);
    }
    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }
    public function options()
    {
        return $this->hasMany(ChildTestOption::class);
    }

    public function childGroup(){
        return $this->belongsTo(childGroup::class);
    }
}
