<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RegisterPelayanan extends Model
{
    protected $table = 'register_pelayanan';



    public function patient(){
        return $this->belongsTo('App\Models\Patient');
    }

    public function schedule(){
        return $this->belongsTo('App\Models\JadwalPraktek', 'jadwal_praktek_id');
    }
}
