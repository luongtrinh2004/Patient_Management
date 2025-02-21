<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalRecord extends Model
{
    use HasFactory;

    protected $fillable = [
        'exam_date', 'diagnosis', 'prescription', 'notes', 'patient_id'
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function invoice()
    {
        return $this->hasOne(Invoice::class);
    }
}
