<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Deno
 *
 * @property int $id
 * @property string $name
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\User> $users
 * @property-read int|null $users_count
 * @method static \Illuminate\Database\Eloquent\Builder|Deno newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Deno newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Deno query()
 * @method static \Illuminate\Database\Eloquent\Builder|Deno whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Deno whereName($value)
 * @mixin \Eloquent
 */
class Deno extends Model
{
    public $timestamps = false;
    protected $fillable =['name'];
    protected $table = 'cash_tally';
    public function users()
    {
       return $this->belongsToMany(User::class,'denos_users','deno_id','user_id');
    }
    use HasFactory;
}
