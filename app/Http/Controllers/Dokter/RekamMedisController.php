<?php

namespace App\Http\Controllers\Dokter;

use App\Http\Controllers\Controller;
use App\Http\Requests\RekamMedisValidation;
use App\Models\Obat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Patient;
use App\Models\Pelayanan;
use App\Models\RegisterPelayanan;
use App\Models\RekamMedis;

class RekamMedisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $records = RekamMedis::orderByDesc('created_at')->get();
        return view('pages.dokter.rekam-medis.index', compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($registPelayananId)
    {
        $registerPelayanan = RegisterPelayanan::FindOrFail($registPelayananId);
        $patient = Patient::select('nama')->where('id', $registerPelayanan->patient_id)->first();
        $records = RekamMedis::where('patient_id', $registerPelayanan->patient_id)->orderByDesc('created_at')->get();
        $medicines = Obat::with('category')->get();

        $service = Pelayanan::FindOrFail($registerPelayanan->pelayanan_id);
        $jasa = $service->costs()->get();

        return view('pages.dokter.periksa-pasien.create', compact('records', 'patient', 'registerPelayanan', 'jasa', 'medicines'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RekamMedisValidation $request, $registerId)
    {
        $request->validated();
        $userId = Auth::id();
        $registAntrian = RegisterPelayanan::FindOrFail($registerId);

        RekamMedis::create([
            'patient_id'            => $registAntrian->patient_id,
            'dokter_id'             => $userId,
            'pelayanan_id'          => $registAntrian->pelayanan_id,
            'diagnosa'              => $request->diagnosa,
            'keluhan'               => $request->keluhan,
            'anamnesis'             => $request->anamnesis ?? '-',
            'tindakan'              => $request->tindakan,
            'keterangan'            => $request->keterangan ?? '-',
            'alergi_obat'           => $request->alergi_obat,
            'berat_badan'           => $request->berat_badan,
            'tinggi_badan'          => $request->tinggi_badan,
            'tensi'                 => $request->tensi,
            'resep'                 => $request->resep ?? '-',
            'register_pelayanan_id' => $registAntrian->id
        ]);

        foreach ($request->jasa as $jasa) {
            $registAntrian->services()->create([
                'jasa_id' => $jasa
            ]);
        }

        if (!$request->resep) {
            $registAntrian->update([
                'status' => 'resepsionis'
            ]);
        } else {
            $registAntrian->update([
                'status' => 'apoteker'
            ]);
        }

        return redirect()->route('periksa-pasien')->with('toast_success', 'Data berhasil dibuat');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
