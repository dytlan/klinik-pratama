<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jasa extends Model
{
    protected $table = 'jasa';

    protected $fillable = ['nama', 'biaya'];

    public function services(){
        return $this->belongsToMany('App\Models\Pelayanan');
    }
}
