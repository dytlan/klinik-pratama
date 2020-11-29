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
        'tempat_lahir',
        'tanggal_lahir',
        'nik',
        'pekerjaan',
        'pendidikan',
    ];

    public function families(){
        return $this->hasMany('App\Models\Family');
    }
}
