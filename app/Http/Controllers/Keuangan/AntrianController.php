<?php

namespace App\Http\Controllers\Keuangan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RegisterPelayanan;

class AntrianController extends Controller
{
    public function antrian()
    {
        $date = now()->toDateString();

        $ongoingAntrian = RegisterPelayanan::where('created_at', 'like', $date . '%')->where('status', 'resepsionis')->orderBy('antrian')->get();

        $doneAntrian = RegisterPelayanan::where('created_at', 'like', $date . '%')->where('status', 'selesai')->whereHas('record', function ($query) {
            $query->where('resep', '!=', '-');
        })->orderBy('antrian')->get();

        return view('pages.keuangan.pembayaran.index', compact('ongoingAntrian', 'doneAntrian'));
    }
}
