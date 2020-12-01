<?php

namespace App\Http\Controllers\Admin;

use App\Models\JadwalPraktek;
use App\Models\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\JadwalValidation;
use Illuminate\Http\Request;

class JadwalPraktekController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $schedules = JadwalPraktek::All();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::whereHas('role', function($query){
            $query->where('nama', 'dokter');
        });
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(JadwalValidation $request)
    {
        $request->validated();

        JadwalPraktek::create([
            'nama'      => $request->nama,
            'hari'      => $request->hari,
            'mulai'     => $request->mulai,
            'sampai'    => $request->sampai,
            'ruangan'   => $request->ruangan,
            'user_id'   => $request->user_id
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
        $schedule = JadwalPraktek::FindOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $schedule = JadwalPraktek::FindOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(JadwalValidation $request, $id)
    {
        $request->validated();
        $schedule = JadwalPraktek::FindOrFail($id);
        $schedule->update([
            'nama'      => $request->nama,
            'hari'      => $request->hari,
            'mulai'     => $request->mulai,
            'sampai'    => $request->sampai,
            'ruangan'   => $request->ruangan,
            'user_id'   => $request->user_id
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
        JadwalPraktek::destroy($id);
    }
}
