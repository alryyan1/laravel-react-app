<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrescribedDrug extends Model
{
    use HasFactory;
    protected $table = 'drugs_prescribed';
    protected $guarded = [];
    protected $with =['item'];
    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function item()
    {
        return $this->belongsTo(Item::class);
    }

}
