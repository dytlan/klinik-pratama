<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pelayanan extends Model
{
    protected $table ='pelayanan';

    protected $fillable = ['nama'];

    public function schedules(){
        return $this->hasMany('App\Models\JadwalPraktek');
    }

    public function registrations(){
        return $this->hasMany('App\Models\RegisterPelayanan');
    }

    public function costs(){
        return $this->belongsToMany('App\Models\Jasa');
    }
}
