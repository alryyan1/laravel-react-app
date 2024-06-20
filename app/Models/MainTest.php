<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\MainTest
 *
 * @property int $id
 * @property string $main_test_name
 * @property int|null $pack_id
 * @property int $pageBreak
 * @property int $container_id
 * @property float $lab_perc
 * @property-read \App\Models\Package|null $Package
 * @method static \Illuminate\Database\Eloquent\Builder|MainTest newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MainTest newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MainTest query()
 * @method static \Illuminate\Database\Eloquent\Builder|MainTest whereContainerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MainTest whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MainTest whereLabPerc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MainTest whereMainTestName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MainTest wherePackId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MainTest wherePageBreak($value)
 * @property float|null $price
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ChildTest> $childTests
 * @property-read int|null $child_tests_count
 * @method static \Illuminate\Database\Eloquent\Builder|MainTest wherePrice($value)
 * @property-read mixed $first_child_id
 * @property-read \App\Models\ChildTest|null $oneChild
 * @mixin \Eloquent
 */
class MainTest extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['main_test_name','price'];
    public function Package(){
        return $this->belongsTo(Package::class,'pack_id','package_id');
    }
    public function childTests(){
        return $this->hasMany(ChildTest::class,'main_test_id');
    }
    public function oneChild(){
        return $this->hasOne(ChildTest::class,'main_test_id');
    }
    protected $appends =['firstChildId'];
    public function getFirstChildIdAttribute(){
        return  $this->oneChild->id ?? 0;
    }
}
