<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\UserSetting
 *
 * @property int $id
 * @property int $user_id
 * @property string $theme
 * @property string $lang
 * @property int $web_dialog
 * @property int $node_dialog
 * @property int $node_direct
 * @method static \Illuminate\Database\Eloquent\Builder|UserSetting newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserSetting newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserSetting query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserSetting whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserSetting whereLang($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserSetting whereNodeDialog($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserSetting whereNodeDirect($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserSetting whereTheme($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserSetting whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserSetting whereWebDialog($value)
 * @property int $print_lab_direction
 * @method static \Illuminate\Database\Eloquent\Builder|UserSetting wherePrintLabDirection($value)
 * @mixin \Eloquent
 */
class UserSetting extends Model
{
    use HasFactory;
    protected $guarded = [];
    public $timestamps = false;
}
