<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JadwalPraktek extends Model
{
    protected $table = 'jadwal_praktek';

    protected $fillable = ['pelayanan_id', 'hari', 'mulai', 'sampai', 'ruangan', 'user_id'];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function pelayanan()
    {
        return $this->belongsTo('App\Models\Pelayanan');
    }

    public function registrations()
    {
        return $this->hasMany('App\Models\RegisterPelayanan');
    }
}
