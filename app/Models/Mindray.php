<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Mindray
 *
 * @property int $id
 * @property int $pid
 * @property float $pho
 * @property float $mg
 * @property float $ca
 * @property int $gluh
 * @property float $tb
 * @property float $db
 * @property int $alt
 * @property int $ast
 * @property float $crp
 * @property int $alp
 * @property float $tp
 * @property float $alb
 * @property int $tg
 * @property int $ldl
 * @property int $hdl
 * @property int $tc
 * @property float $crea
 * @property float $uric
 * @property int $urea
 * @property float $ckmb
 * @property float $ck
 * @property float $ldh
 * @property float $fe
 * @property float $fer
 * @property int $glug
 * @property float $ddimer
 * @property float $amylase
 * @property float $lipase
 * @property int $aso
 * @property float $tibc
 * @property float $acr
 * @property float $pcr
 * @property string $hb
 * @property float $na
 * @property float $k
 * @property float $c1
 * @property float $c2
 * @property string $ggt
 * @property string $a1c
 * @property string $iron
 * @property string $tpc3
 * @method static \Illuminate\Database\Eloquent\Builder|Mindray newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Mindray newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Mindray query()
 * @method static \Illuminate\Database\Eloquent\Builder|Mindray whereA1c($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mindray whereAcr($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mindray whereAlb($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mindray whereAlp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mindray whereAlt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mindray whereAmylase($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mindray whereAso($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mindray whereAst($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mindray whereC1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mindray whereC2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mindray whereCa($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mindray whereCk($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mindray whereCkmb($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mindray whereCrea($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mindray whereCrp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mindray whereDb($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mindray whereDdimer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mindray whereFe($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mindray whereFer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mindray whereGgt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mindray whereGlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mindray whereGluh($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mindray whereHb($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mindray whereHdl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mindray whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mindray whereIron($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mindray whereK($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mindray whereLdh($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mindray whereLdl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mindray whereLipase($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mindray whereMg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mindray whereNa($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mindray wherePcr($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mindray wherePho($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mindray wherePid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mindray whereTb($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mindray whereTc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mindray whereTg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mindray whereTibc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mindray whereTp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mindray whereTpc3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mindray whereUrea($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mindray whereUric($value)
 * @mixin \Eloquent
 */
class Mindray extends Model
{
    protected $table ='mindray2';
    use HasFactory;
}
