<?php

namespace App\Http\Controllers\Apoteker;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\RegisterPelayanan;

class AntrianController extends Controller
{
    public function antrian()
    {
        $date = now()->toDateString();

        $ongoingAntrian = RegisterPelayanan::where('created_at', 'like', $date . '%')->where('status', 'apoteker')->orderBy('antrian')->get();

    $doneAntrian = RegisterPelayanan::where('created_at', 'like', $date . '%')->where('status', 'resepsionis')->whereHas('record', function($query){
        $query->where('resep', '!=', '-');
    })->orderBy('antrian')->get();

        return view('pages.apoteker.permintaan-resep.index', compact('ongoingAntrian', 'doneAntrian'));
    }
}
