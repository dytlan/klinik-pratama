<?php

namespace App\Http\Controllers\Dokter;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\JadwalPraktek;

class AntrianController extends Controller
{
    public function antrian()
    {
        $userId = Auth::id();
        $day = now()->locale('id')->dayName;
        $date = now()->toDateString();

        $schedule = JadwalPraktek::where('hari', $day)->where('user_id', $userId)->first();

        if (!$schedule) {
            return redirect()->back()->with('toast_error', 'Tidak ada jadwal praktek di hari ini.');
        }

        $ongoingAntrian = $schedule->registrations()->where('created_at', 'like', $date . '%')->where('status', 'dokter')->orderBy('antrian')->get();

        $doneAntrian = $schedule->registrations()->where('created_at', 'like', $date . '%')->whereIn('status', ['resepsionis','apoteker'])->orderBy('antrian')->get();

        return view('pages.dokter.periksa-pasien.index', compact('ongoingAntrian', 'doneAntrian'));
    }
}
