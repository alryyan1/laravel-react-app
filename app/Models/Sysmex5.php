<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Sysmex5
 *
 * @property int $patient_id
 * @property string $WBC
 * @property string $RBC
 * @property string $HGB
 * @property string $HCT
 * @property string $MCV
 * @property string $MCH
 * @property string $MCHC
 * @property string $PLT
 * @property string $NEUTP
 * @property string $LYMPHP
 * @property string $MONOP
 * @property string $EOP
 * @property string $BASOP
 * @property string $NEUTC
 * @property string $LYMPHC
 * @property string $MONOC
 * @property string $EOC
 * @property string $BASOC
 * @property string $IGP
 * @property string $IGC
 * @property string $RDWSD
 * @property string $RDWCV
 * @property string $MICROR
 * @property string $MACROR
 * @property string $PDW
 * @property string $MPV
 * @property string $PLCR
 * @property string $PCT
 * @method static \Illuminate\Database\Eloquent\Builder|Sysmex5 newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Sysmex5 newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Sysmex5 query()
 * @method static \Illuminate\Database\Eloquent\Builder|Sysmex5 whereBASOC($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sysmex5 whereBASOP($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sysmex5 whereEOC($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sysmex5 whereEOP($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sysmex5 whereHCT($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sysmex5 whereHGB($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sysmex5 whereIGC($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sysmex5 whereIGP($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sysmex5 whereLYMPHC($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sysmex5 whereLYMPHP($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sysmex5 whereMACROR($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sysmex5 whereMCH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sysmex5 whereMCHC($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sysmex5 whereMCV($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sysmex5 whereMICROR($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sysmex5 whereMONOC($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sysmex5 whereMONOP($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sysmex5 whereMPV($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sysmex5 whereNEUTC($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sysmex5 whereNEUTP($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sysmex5 wherePCT($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sysmex5 wherePDW($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sysmex5 wherePLCR($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sysmex5 wherePLT($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sysmex5 wherePatientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sysmex5 whereRBC($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sysmex5 whereRDWCV($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sysmex5 whereRDWSD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sysmex5 whereWBC($value)
 * @property int $id
 * @method static \Illuminate\Database\Eloquent\Builder|Sysmex5 whereId($value)
 * @mixin \Eloquent
 */
class Sysmex5 extends Model
{
   protected $table='sysmex550';
    use HasFactory;
}
