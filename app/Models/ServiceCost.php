<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\ServiceCost
 *
 * @property int $id
 * @property string $name
 * @property int $service_id
 * @property float $percentage
 * @property float $fixed
 * @property-read \App\Models\Service $service
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceCost newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceCost newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceCost query()
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceCost whereFixed($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceCost whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceCost whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceCost wherePercentage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceCost whereServiceId($value)
 * @mixin \Eloquent
 */
class ServiceCost extends Model
{
    protected $table = 'service_cost';
    protected $guarded = ['id'];
    public $timestamps = false;
    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }
    use HasFactory;
}
