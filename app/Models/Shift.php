<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\This;

class Shift extends Model
{
    use HasFactory;
    protected $fillable = ['total',	'bank'	,'expenses'	,'closed_at','is_closed'];
    public function patients(){
        return $this->hasMany(Patient::class);
    }

    protected $with = ['patients'];

    public function total(){
        $this::patients();
    }

    /**
     * return total lab money considering discounts
     * @return int|mixed
     */
    public function totalPaid(): mixed
    {
        $total = 0;
        /** @var Patient $patient */
        foreach ($this->patients as $patient){
            if ($patient->is_lab_paid == 1){
                $total += $patient->paid();
            }
        }
        return $total;
    }

    public function totalBank(){
        $total = 0;
        /** @var Patient $patient */
        foreach ($this->patients as $patient){
            if ($patient->is_lab_paid == 1){
                $total += $patient->paid();
            }
        }
        return $total;
    }
}
