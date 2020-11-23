<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $fillable = [
        'nama',
        'jk',
        'no_hp',
        'alamat',
        'rt',
        'rw',
        'kelurahan',
        'kecamatan',
        'kota',
        'tempat_lahir',
        'tanggal_lahir',
        'pekerjaan',
        'pendidikan'
    ];

    public function families(){
        return $this->hasMany('App\Models\Family');
    }
}
