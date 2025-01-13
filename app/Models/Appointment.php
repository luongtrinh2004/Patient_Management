<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $table = 'appointments';

    protected $fillable = [
        'doctor_id',
        'name',
        'email',
        'phone',
        'age',
        'cccd',
        'appointment_date',
        'description',
        'status',
    ];

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

public function patient()
{
    return $this->belongsTo(Patient::class);
}

    /**
     * Scope để lấy các lịch hẹn của bác sĩ cụ thể.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param int $doctorId
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeForDoctor($query, $doctorId)
    {
        return $query->where('doctor_id', $doctorId);
    }

    /**
     * Scope để lấy các lịch hẹn của bệnh nhân cụ thể.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param int $patientId
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeForPatient($query, $patientId)
    {
        return $query->where('patient_id', $patientId);
    }

    /**
     * Kiểm tra trạng thái của lịch hẹn.
     *
     * @return bool
     */
    public function isPending()
    {
        return $this->status === 'pending';
    }

    public function isCompleted()
    {
        return $this->status === 'completed';
    }

    public function isCancelled()
    {
        return $this->status === 'cancelled';
    }
}