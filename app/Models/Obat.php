<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    protected $table = 'obat';

    protected $fillable = [
        'nama', 'kandungan', 'kategori_obat_id', 'harga', 'jumlah'
    ];

    public function category(){
        return $this->belongsTo('App\Models\KategoriObat');
    }
}
