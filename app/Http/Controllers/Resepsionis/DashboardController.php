<?php

namespace App\Http\Controllers\Resepsionis;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Patient;
use App\Models\RegisterPelayanan;

class DashboardController extends Controller
{
    public function index(){

        $registNow = RegisterPelayanan::where('created_at', 'like', now()->toDateString(). '%')->count();
        $complete = RegisterPelayanan::count();
         

        return view('pages.resepsionis.dashboard', compact('registNow', 'complete'));
    }
}
