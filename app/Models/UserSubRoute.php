<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\UserSubRoute
 *
 * @property int $id
 * @property int $sub_route_id
 * @property int $user_id
 * @property-read \App\Models\SubRoute $sub_route
 * @method static \Illuminate\Database\Eloquent\Builder|UserSubRoute newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserSubRoute newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserSubRoute query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserSubRoute whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserSubRoute whereSubRouteId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserSubRoute whereUserId($value)
 * @mixin \Eloquent
 */
class UserSubRoute extends Model
{
    use HasFactory;
    protected $with =['sub_route'];
    protected $guarded = [];
    public $timestamps = false;
    public function sub_route(){
        return $this->belongsTo(SubRoute::class);
    }

}
