<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Hormone
 *
 * @property int $id
 * @property string $pid
 * @property float $tsh
 * @property float $t3
 * @property float $t4
 * @property float $fsh
 * @property float $lh
 * @property float $prl
 * @property float $vitd
 * @property float $pth
 * @property float $psa
 * @property float $fpsa
 * @property float $ft3
 * @property float $ft4
 * @property float $ferr
 * @property float $folate
 * @property float $afp
 * @property float $ca153
 * @property float $ca199
 * @property float $ca125
 * @property float $amh
 * @property float $e2
 * @property float $prog
 * @property float $testo
 * @property float $bhcg
 * @property float $cortiso
 * @property float $cea
 * @property float $hiv
 * @property float $antihcv
 * @property float $trop
 * @property float $vb12
 * @property string $hbsag
 * @property string $ana
 * @property string $dsdna
 * @property float $ins
 * @property float $cp
 * @property string $antihbc
 * @property string $Anti_HBe
 * @property float $HBeAg
 * @property float $ccp
 * @property float $CK_MB
 * @property float $CMV_IgG
 * @property float $CMV_IgM
 * @property float $dimer
 * @property float $GH
 * @property float $HE4
 * @property float $HSV_IgG
 * @property float $HSV_IgM
 * @property string $IgA
 * @property string $IgE
 * @property string $IgG
 * @property string $IgM
 * @property float $PCT
 * @property float $Rubella_IgG
 * @property float $Rubella_IgM
 * @property float $TOXO_IgG
 * @property float $TOXO_IgM
 * @property float $acth
 * @property string $antihbs
 * @method static \Illuminate\Database\Eloquent\Builder|Hormone newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Hormone newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Hormone query()
 * @method static \Illuminate\Database\Eloquent\Builder|Hormone whereActh($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hormone whereAfp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hormone whereAmh($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hormone whereAna($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hormone whereAntiHBe($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hormone whereAntihbc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hormone whereAntihbs($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hormone whereAntihcv($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hormone whereBhcg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hormone whereCKMB($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hormone whereCMVIgG($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hormone whereCMVIgM($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hormone whereCa125($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hormone whereCa153($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hormone whereCa199($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hormone whereCcp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hormone whereCea($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hormone whereCortiso($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hormone whereCp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hormone whereDimer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hormone whereDsdna($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hormone whereE2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hormone whereFerr($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hormone whereFolate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hormone whereFpsa($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hormone whereFsh($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hormone whereFt3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hormone whereFt4($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hormone whereGH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hormone whereHBeAg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hormone whereHE4($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hormone whereHSVIgG($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hormone whereHSVIgM($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hormone whereHbsag($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hormone whereHiv($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hormone whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hormone whereIgA($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hormone whereIgE($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hormone whereIgG($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hormone whereIgM($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hormone whereIns($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hormone whereLh($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hormone wherePCT($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hormone wherePid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hormone wherePrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hormone whereProg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hormone wherePsa($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hormone wherePth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hormone whereRubellaIgG($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hormone whereRubellaIgM($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hormone whereT3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hormone whereT4($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hormone whereTOXOIgG($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hormone whereTOXOIgM($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hormone whereTesto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hormone whereTrop($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hormone whereTsh($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hormone whereVb12($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hormone whereVitd($value)
 * @mixin \Eloquent
 */
class Hormone extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $guarded = [];
    protected $table = 'hormone';
}
