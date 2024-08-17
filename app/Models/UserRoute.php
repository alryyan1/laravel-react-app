<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\UserRoute
 *
 * @property int $id
 * @property int $user_id
 * @property int $route_id
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property-read \App\Models\Route $route
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\UserSubRoute> $sub_routes
 * @property-read int|null $sub_routes_count
 * @method static \Illuminate\Database\Eloquent\Builder|UserRoute newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserRoute newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserRoute query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserRoute whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserRoute whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserRoute whereRouteId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserRoute whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserRoute whereUserId($value)
 * @mixin \Eloquent
 */
class UserRoute extends Model
{
    protected $guarded = [];
    public $timestamps = false;
    protected $with = ['route'];
    public function sub_routes(){
        return $this->hasMany(UserSubRoute::class);
    }

    use HasFactory;
    public function route(){
       return $this->belongsTo(Route::class);
    }

}
