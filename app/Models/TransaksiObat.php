<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransaksiObat extends Model
{
    protected $table = 'transaksi_obat';

    protected $fillable = ['obat_id', 'quantity', 'register_pelayanan_id', 'apoteker_id'];

    public function medicine(){
        return $this->belongsTo('App\Models\Obat');
    }

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function registration(){
        return $this->belongsTo('App\Models\RegisterPelayanan');
    }
}
