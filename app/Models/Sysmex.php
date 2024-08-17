<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Sysmex
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Sysmex newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Sysmex newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Sysmex query()
 * @property int $id
 * @property int $patient_id
 * @property string $wbc
 * @property string $rbc
 * @property string $hgb
 * @property string $hct
 * @property int $mcv
 * @property int $mch
 * @property int $mchc
 * @property int $plt
 * @property int $lym_p
 * @property string $mxd_p
 * @property int $neut_p
 * @property string $lym_c
 * @property string $mxd_c
 * @property string $neut_c
 * @property string $rdw_sd
 * @property string $rdw_cv
 * @property string $pdw
 * @property string $mpv
 * @property string $plcr
 * @method static \Illuminate\Database\Eloquent\Builder|Sysmex whereHct($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sysmex whereHgb($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sysmex whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sysmex whereLymC($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sysmex whereLymP($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sysmex whereMch($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sysmex whereMchc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sysmex whereMcv($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sysmex whereMpv($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sysmex whereMxdC($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sysmex whereMxdP($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sysmex whereNeutC($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sysmex whereNeutP($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sysmex wherePatientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sysmex wherePdw($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sysmex wherePlcr($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sysmex wherePlt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sysmex whereRbc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sysmex whereRdwCv($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sysmex whereRdwSd($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sysmex whereWbc($value)
 * @property int $flag
 * @method static \Illuminate\Database\Eloquent\Builder|Sysmex whereFlag($value)
 * @mixin \Eloquent
 */
class Sysmex extends Model
{
    protected $table ='sysmex';
    use HasFactory;
}
