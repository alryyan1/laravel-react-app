<?php

namespace App\Models;

use AjCastro\EagerLoadPivotRelations\EagerLoadPivotTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Service
 *
 * @property int $id
 * @property string $name
 * @property int $service_group_id
 * @property float $price
 * @property float $static_wage
 * @property float $percentage_wage
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\ServiceGroup $service_group
 * @method static \AjCastro\EagerLoadPivotRelations\EagerLoadPivotBuilder|Service newModelQuery()
 * @method static \AjCastro\EagerLoadPivotRelations\EagerLoadPivotBuilder|Service newQuery()
 * @method static \AjCastro\EagerLoadPivotRelations\EagerLoadPivotBuilder|Service query()
 * @method static \AjCastro\EagerLoadPivotRelations\EagerLoadPivotBuilder|Service whereCreatedAt($value)
 * @method static \AjCastro\EagerLoadPivotRelations\EagerLoadPivotBuilder|Service whereId($value)
 * @method static \AjCastro\EagerLoadPivotRelations\EagerLoadPivotBuilder|Service whereName($value)
 * @method static \AjCastro\EagerLoadPivotRelations\EagerLoadPivotBuilder|Service wherePercentageWage($value)
 * @method static \AjCastro\EagerLoadPivotRelations\EagerLoadPivotBuilder|Service wherePrice($value)
 * @method static \AjCastro\EagerLoadPivotRelations\EagerLoadPivotBuilder|Service whereServiceGroupId($value)
 * @method static \AjCastro\EagerLoadPivotRelations\EagerLoadPivotBuilder|Service whereStaticWage($value)
 * @method static \AjCastro\EagerLoadPivotRelations\EagerLoadPivotBuilder|Service whereUpdatedAt($value)
 * @property int $activate
 * @method static \AjCastro\EagerLoadPivotRelations\EagerLoadPivotBuilder|Service whereActivate($value)
 * @mixin \Eloquent
 */
class Service extends Model
{
    use HasFactory;
    use EagerLoadPivotTrait;
//    protected $fillable =['activate'];
    protected $guarded = ['id'];
//    protected $with = ['service_group'];

    public function service_group(){
        return $this->belongsTo(ServiceGroup::class);
    }
}
