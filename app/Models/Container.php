<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Container
 *
 * @property int $id
 * @property string $container_name
 * @method static \Illuminate\Database\Eloquent\Builder|Container newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Container newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Container query()
 * @method static \Illuminate\Database\Eloquent\Builder|Container whereContainerName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Container whereId($value)
 * @mixin \Eloquent
 */
class Container extends Model
{
    use HasFactory;
}
