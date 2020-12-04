<?php

namespace App\Http\Controllers\Resepsionis;

use App\Http\Controllers\Controller;
use App\Http\Requests\CheckPatientValidation;
use Illuminate\Http\Request;

use App\Models\Pelayanan;
use App\Models\Patient;

class RegisterPelayananController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($pelayananId)
    {
        $service = Pelayanan::select('id', 'nama')->whereId($pelayananId)->first();
        $day = now()->locale('id')->dayName;
        $time = now()->addMinute(15)->toTimeString();
        $schedules = $service->schedules()->where('hari', $day)->where('sampai', '>=', $time)->get();

        return view('pages.resepsionis.register-pelayanan.create', compact('pelayananId', 'schedules', 'service'));
    }

    public function checkPatient(CheckPatientValidation $request, $pelayananId)
    {

        $request->validated();

        $patient = Patient::FindOrFail($request->patient_id);

        $service = Pelayanan::select('id', 'nama')->whereId($pelayananId)->first();
        $day = now()->locale('id')->dayName;
        $time = now()->addMinute(15)->toTimeString();
        $schedules = $service->schedules()->where('hari', $day)->where('sampai', '>=', $time)->get();

        return view('pages.resepsionis.register-pelayanan.create', compact('schedules', 'service', 'patient'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $pelayananId)
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
