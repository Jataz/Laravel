<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = [
          'patient_name',
          'age',
          'l_m_p',
          'phone_number',
          'gender',
          'medical_aid',
          'medical_aid_no',
          'examination',
          'examination_requested',
          'doctor_id',
          'history',
          'patient_status',
          'image',
          'radiographer_id',
          'appointment_rad',
          'appointment_doctor',
          'priority'
    ];

    
    public function doctor()
    {
        return $this->belongsTo(User::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
