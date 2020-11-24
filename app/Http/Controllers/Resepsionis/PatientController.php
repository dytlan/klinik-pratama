<?php

namespace App\Http\Controllers\Resepsionis;

use App\Http\Controllers\Controller;
use App\Http\Requests\PatientValidation;
use Illuminate\Http\Request;

use App\Models\Patient;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $patients = Patient::All();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PatientValidation $request)
    {
        $request->validated();

        $patient = Patient::create([
            'nama'          => $request->nama,
            'jk'            => $request->jk,
            'no_hp'         => $request->no_hp,
            'alamat'        => $request->alamat,
            'rt'            => $request->rt,
            'rw'            => $request->rw,
            'kelurahan'     => $request->kelurahan,
            'kecamatan'     => $request->kecamatan,
            'kota'          => $request->kota,
            'tempat_lahir'  => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
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
        $patient = Patient::FindOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $patient = Patient::FindOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PatientValidation $request, $id)
    {
        $request->validated();

        $patient = Patient::FindOrFail($id);
        $patient->update([
            'nama'          => $request->nama,
            'jk'            => $request->jk,
            'no_hp'         => $request->no_hp,
            'alamat'        => $request->alamat,
            'rt'            => $request->rt,
            'rw'            => $request->rw,
            'kelurahan'     => $request->kelurahan,
            'kecamatan'     => $request->kecamatan,
            'kota'          => $request->kota,
            'tempat_lahir'  => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
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
        Patient::destroy($id);
    }
}
