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
        $registrations = Pelayanan::FindOrFail($id)->registrations()->get();

    }

}
