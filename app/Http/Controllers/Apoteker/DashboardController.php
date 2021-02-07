<?php

namespace App\Http\Controllers\Apoteker;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\TransaksiObat;
use App\Models\Obat;

class DashboardController extends Controller
{
    public function index(){
        $total = TransaksiObat::where('created_at', 'like', now()->toDateString() . '%')->count();
        
        $total_transaksi = TransaksiObat::count();
        $obat = Obat::where('jumlah', '<', 11)->count();
        return view('pages.apoteker.dashboard', compact('total', 'obat','total_transaksi'));
    }
}
