<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\AccountCategory
 *
 * @property int $id
 * @property string $name
 * @method static \Illuminate\Database\Eloquent\Builder|AccountCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AccountCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AccountCategory query()
 * @method static \Illuminate\Database\Eloquent\Builder|AccountCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AccountCategory whereName($value)
 * @mixin \Eloquent
 */
class AccountCategory extends Model
{
    public $timestamps = false;
    protected $guarded =['id'];
    protected $table ='account_categories';
    use HasFactory;
}
