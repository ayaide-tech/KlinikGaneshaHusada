<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    //
    protected $fillable =[
        'id',
        'patient_id',
        'doctor_id',
        'complaint',
        'type',
        'blood_pressure',
        'state',
        'weight',
        'high'


    ];

    public function patient(){
        return $this->belongsTo(Patient::class);
    }

    public function diagnosis(){   // dd('HEY');
        return $this->hasOne(Diagnosis::class);
    }
    public function doctor(){
        return $this->belongsTo(User::class);
    }
}
