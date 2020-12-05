<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RekamMedis extends Model
{
    protected $table = 'rekam_medis';

    protected $fillable = [
        'patient_id', 'dokter_id', 'pelayanan_id',
        'diagnosa', 'keluhan', 'anamnesis', 
        'tindakan', 'keterangan', 'alergi_obat',
        'berat_badan', 'tinggi_badan', 'tensi'
    ];

    public function patient(){
        return $this->belongsTo('App\Models\Patient');
    }

    public function dokter(){
        return $this->belongsTo('App\Models\User', 'dokter_id');
    }

    public function service(){
        return $this->belongsTo('App\Models\Pelayanan');
    }
}