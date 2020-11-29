<?php

namespace App\Http\Controllers\Apoteker;

use App\Http\Controllers\Controller;
use App\Http\Requests\KategoriObatValidation;
use App\Models\KategoriObat;


class KategoriObatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = KategoriObat::All();
        return view('pages.apoteker.kategori-obat.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.apoteker.kategori-obat.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(KategoriObatValidation $request)
    {
        $request->validated();

        KategoriObat::create([
            'kategori' => $request->kategori
        ]);

        return redirect()->route('kategori.index')->with('toast_success', 'Data Berhasil Dibuat');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = KategoriObat::FindOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = KategoriObat::FindOrFail($id);
        return view('pages.apoteker.kategori-obat.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(KategoriObatValidation $request, $id)
    {
        $request->validated();

        KategoriObat::FindOrFail($id)->update([
            'kategori' => $request->kategori
        ]);

        return redirect()->route('kategori.index')->with('toast_success', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        KategoriObat::destroy($id);
        return redirect()->route('kategori.index')->with('toast_success', 'Data Berhasil Dihapus');
    }
}
