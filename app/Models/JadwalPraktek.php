<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JadwalPraktek extends Model
{
    protected $table = 'jadwal_praktek';

    protected $fillable = ['nama', 'hari', 'mulai', 'sampai', 'ruangan', 'user_id'];

}
