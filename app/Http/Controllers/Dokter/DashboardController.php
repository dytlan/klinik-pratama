<?php

namespace App\Http\Controllers\Dokter;

use App\Http\Controllers\Controller;
use App\Models\JadwalPraktek;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

use App\Models\RegisterPelayanan;

class DashboardController extends Controller
{
    public function index(){
        $day = now()->locale('id')->dayName;
        $userId = Auth::id();
        $total = RegisterPelayanan::where('created_at', 'like', now()->toDateString().'%')->count();
        $schedule = JadwalPraktek::where('hari', $day)->where('user_id', $userId)->first();

        if($schedule){
            $schedule->mulai = Carbon::parse($schedule->mulai)->format("H:i");
            $schedule->sampai = Carbon::parse($schedule->sampai)->format("H:i");
        }

        return view('pages.dokter.dashboard', compact('total', 'schedule'));
    }
}
