<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Package
 *
 * @property int $package_id
 * @property string|null $package_name
 * @property string $container
 * @property int $exp_time
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\MainTest> $tests
 * @property-read int|null $tests_count
 * @method static \Illuminate\Database\Eloquent\Builder|Package newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Package newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Package query()
 * @method static \Illuminate\Database\Eloquent\Builder|Package whereContainer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Package whereExpTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Package wherePackageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Package wherePackageName($value)
 * @mixin \Eloquent
 */
class Package extends Model
{
    use HasFactory;

    public function tests(){
        return $this->hasMany(MainTest::class,'pack_id','package_id');
    }
}
