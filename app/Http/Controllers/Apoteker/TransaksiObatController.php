<?php

namespace App\Http\Controllers\Apoteker;

use App\Http\Controllers\Controller;
use App\Models\Obat;
use App\Models\RegisterPelayanan;
use App\Models\RekamMedis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransaksiObatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($registerPelayananId)
    {
        $record = RekamMedis::where('register_pelayanan_id', $registerPelayananId)->first();

        return view('pages.apoteker.permintaan-resep.create', compact('record'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $registerPelayananId)
    {
        $register = RegisterPelayanan::FindOrFail($registerPelayananId);
        foreach($request->medicines as $medicine){
            $data = $register->transactions()->create([
                'obat_id'       => $medicine['obat_id'],
                'quantity'      => $medicine['quantity'],
                'apoteker_id'   => $request->user_id
            ]);

            $obat = Obat::FindOrFail($data->obat_id);
            $obat->update([
                'jumlah' => $obat->jumlah - $data->quantity
            ]);
        }

        $register->update([
            'status' => 'resepsionis'
        ]);

        return response()->json(['message' => 'stored successfull'],201);  
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
