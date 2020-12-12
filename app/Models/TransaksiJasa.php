<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransaksiJasa extends Model
{
    protected $table = 'transaksi_jasa';

    protected $fillable = [
        'register_pelayanan_id', 'jasa_id'
    ];

    public function service(){
        return $this->belongsTo('App\Models\Jasa');
    }
}
