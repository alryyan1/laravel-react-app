<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\ServiceGroup
 *
 * @property int $id
 * @property string $name
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Service> $services
 * @property-read int|null $services_count
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceGroup newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceGroup newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceGroup query()
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceGroup whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceGroup whereName($value)
 * @mixin \Eloquent
 */
class ServiceGroup extends Model
{
    protected $fillable = [ 'name'];
    protected $table = 'service_groups';
    public $timestamps = false;
    protected $with = ['services'];
    use HasFactory;

    public function services(){
        return $this->hasMany(Service::class);
    }
}
