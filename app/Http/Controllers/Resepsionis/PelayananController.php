<?php

namespace App\Http\Controllers\Resepsionis;

use App\Models\Pelayanan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PelayananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Pelayanan::all();
        return view('pages.resepsionis.register-pelayanan.index', compact('services'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $registrations = Pelayanan::with(['registrations' => function ($item) {
            $item->orderByDesc('created_at');
        }])->where('id', $id)->first();
        return view('pages.resepsionis.register-pelayanan.show', compact('registrations'));
    }
}
