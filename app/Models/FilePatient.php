<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\FilePatient
 *
 * @property int $id
 * @property int $file_id
 * @property int $patient_id
 * @property-read \App\Models\File $file
 * @property-read \App\Models\Patient $patient
 * @property-read \Illuminate\Database\Eloquent\Collection<int, FilePatient> $patients
 * @property-read int|null $patients_count
 * @method static \Illuminate\Database\Eloquent\Builder|FilePatient newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FilePatient newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FilePatient query()
 * @method static \Illuminate\Database\Eloquent\Builder|FilePatient whereFileId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FilePatient whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FilePatient wherePatientId($value)
 * @mixin \Eloquent
 */
class FilePatient extends Model
{
    protected $table = 'file_patient';
//    protected $with =['file'];
    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function file()
    {
        return $this->belongsTo(File::class);
    }
//    protected $appends =['patients'];
//    public function getPatientsAttribute()
//    {
//        return $this->patients();
//    }
    public function patients(){
        return $this->hasMany(FilePatient::class,'file_id');
    }
    use HasFactory;
}
