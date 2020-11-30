<?php

namespace App\Http\Controllers\Resepsionis;

use App\Http\Controllers\Controller;
use App\Http\Requests\PatientValidation;
use App\Http\Requests\StorePatientValidation;
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
        return view('pages.resepsionis.pasien.index', compact('patients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.resepsionis.pasien.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePatientValidation $request)
    {
        $request->validated();

        $patient = Patient::create([
            'nama'          => $request->nama,
            'jk'            => $request->jk,
            'no_hp'         => $request->no_hp,
            'alamat'        => $request->alamat,
            'nik'           => $request->nik,
            'tempat_lahir'  => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'pekerjaan'     => $request->pekerjaan,
            'pendidikan'    => $request->pendidikan,
        ]);

        return redirect()->route('pasien.index')->with('toast_success', 'Data berhasil dibuat');
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
        return view('pages.resepsionis.pasien.edit', compact('patient'));
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
            'nik'           => $request->nik,
            'tempat_lahir'  => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'pekerjaan'     => $request->pekerjaan,
            'pendidikan'    => $request->pendidikan,
        ]);

        return redirect()->route('pasien.index')->with('toast_success', 'Data berhasil diubah');
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
