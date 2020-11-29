<?php

namespace App\Http\Controllers\Apoteker;

use App\Http\Controllers\Controller;
use App\Http\Requests\ObatValidation;
use App\Models\Obat;
use App\Models\KategoriObat;

class ObatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $medicines = Obat::All();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = KategoriObat::All();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ObatValidation $request)
    {
        $request->validated();

        if($request->jumlah < 30 && $request->jumlah >0){
            $request->status = 'warning';
        } else if($request->jumlah = 0) {
            $request->status = 'habis';
        } else {
            $request->status = 'ada';
        }

        Obat::create([
            'nama'              => $request->nama,
            'kandungan'         => $request->kandungan,
            'kategori_obat_id'  => $request->kategori_obat_id,
            'harga'             => $request->harga,
            'status'            => $request->status,
            'jumlah'            => $request->jumlah,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $medicine = Obat::FindOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $medicine = Obat::FindOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ObatValidation $request, $id)
    {
        $request->validated();

        if($request->jumlah < 30 && $request->jumlah >0){
            $request->status = 'warning';
        } else if($request->jumlah = 0) {
            $request->status = 'habis';
        } else {
            $request->status = 'ada';
        }

        Obat::FindOrFail($id)->update([
            'nama'              => $request->nama,
            'kandungan'         => $request->kandungan,
            'kategori_obat_id'  => $request->kategori_obat_id,
            'harga'             => $request->harga,
            'status'            => $request->status,
            'jumlah'            => $request->jumlah,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Obat::destroy($id);
    }
}
