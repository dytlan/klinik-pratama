<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KategoriObat extends Model
{
    protected $table = 'kategori_obat';
    protected $fillable = ['kategori'];

    public function medicines(){
        return $this->hasMany('App\Models\Obat');
    }
}
