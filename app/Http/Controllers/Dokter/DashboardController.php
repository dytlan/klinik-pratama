<?php

namespace App\Http\Controllers\Dokter;

use App\Http\Controllers\Controller;
use App\Models\JadwalPraktek;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\RegisterPelayanan;

class DashboardController extends Controller
{
    public function index(){
        $day = now()->locale('id')->dayName;
        $userId = Auth::id();
        $total = RegisterPelayanan::where('created_at', 'like', now()->toDateString().'%')->count();
        $schedule = JadwalPraktek::where('hari', $day)->where('user_id', $userId)->first();

        return view('pages.dokter.dashboard', compact('total', 'schedule'));
    }
}
