<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\childGroup
 *
 * @property int $id
 * @property string $name
 * @method static \Illuminate\Database\Eloquent\Builder|childGroup newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|childGroup newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|childGroup query()
 * @method static \Illuminate\Database\Eloquent\Builder|childGroup whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|childGroup whereName($value)
 * @mixin \Eloquent
 */
class childGroup extends Model
{
    public $timestamps = false;
    protected $fillable =['name'];
    use HasFactory;
}
