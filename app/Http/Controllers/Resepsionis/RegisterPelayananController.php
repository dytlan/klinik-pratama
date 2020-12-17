<?php

namespace App\Http\Controllers\Resepsionis;

use App\Http\Controllers\Controller;
use App\Http\Requests\CheckPatientValidation;
use App\Http\Requests\RegisterPelayananValidation;
use Illuminate\Http\Request;

use App\Models\Pelayanan;
use App\Models\Patient;
use App\Models\RegisterPelayanan;

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
        // $schedules = $service->schedules()->get();

        return view('pages.resepsionis.register-pelayanan.create', compact('pelayananId', 'schedules', 'service'));
    }

    public function checkPatient(CheckPatientValidation $request, $pelayananId)
    {

        $request->validated();

        $patient = Patient::FindOrFail($request->patient_id);

        $request->session()->flash('patient', $patient);

        return redirect()->back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RegisterPelayananValidation $request, $pelayananId)
    {
        $request->validated();

        $service = Pelayanan::FindOrFail($pelayananId);

        $antrian = $this->generateAntrian($service, $request);

        $data = $service->registrations()->create([
            'patient_id'            => $request->patient_id,
            'jadwal_praktek_id'     => $request->jadwal_praktek_id,
            'hari'                  => now(),
            'kode'                  => $antrian['kode'],
            'antrian'               => $antrian['nomor'],
            'pelayanan_id'          => $pelayananId
        ]);



        return redirect()->route('pelayanan.show', $pelayananId)->with('nomor_antrian', alert()->info('Nomor Antrian: ' . $antrian['kode'] . '-' . $antrian['nomor'],  'Ruangan : ' . $data->schedule->ruangan)->autoClose(false));
    }

    function generateAntrian($service, $request)
    {
        $date = now()->toDateString();

        $checkRegistration = $service->registrations()->where('jadwal_praktek_id', $request->jadwal_praktek_id)->where('created_at', 'like', $date . '%')->latest('created_at')->first();


        if ($checkRegistration) {
            $antrian = [
                'kode'  => $checkRegistration->kode,
                'nomor' => $checkRegistration->antrian + 1
            ];
        } else {
            $serviceNames = explode(' ', $service->nama);
            $antrianCode = '';
            foreach ($serviceNames as $name) {
                $antrianCode .= $name[0];
            }
            $antrian = [
                'kode'  => $antrianCode,
                'nomor' => 1
            ];
        }

        return $antrian;
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
        $item = RegisterPelayanan::findOrFail($id);
        $item->delete();

        return redirect()->back()->with('toast_success', 'Data berhasil dihapus');
    }
}
