<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RegisterPelayanan extends Model
{
    protected $table = 'register_pelayanan';

    protected $fillable = ['patient_id', 'jadwal_praktek_id', 'status', 'antrian', 'pelayanan_id'];

    public function patient(){
        return $this->belongsTo('App\Models\Patient');
    }

    public function schedule(){
        return $this->belongsTo('App\Models\JadwalPraktek', 'jadwal_praktek_id');
    }
}
