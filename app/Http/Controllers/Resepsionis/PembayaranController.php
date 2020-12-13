<?php

namespace App\Http\Controllers\Resepsionis;

use App\Http\Controllers\Controller;
use App\Models\RegisterPelayanan;
use Illuminate\Http\Request;

class PembayaranController extends Controller
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
        $regist = RegisterPelayanan::FindOrFail($registerPelayananId);

        $medicines = $regist->transactions()->get();
        $mappingMedicine = $medicines->map(function ($item) {
            $item->total_harga =  $item->quantity * $item->medicine->harga;
            return $item;
        });

        $services = $regist->services()->get();
        $mappingService = $services->map(function ($item) {
            $item->total_harga = $item->service->biaya;
            return $item;
        });

        $subTotal = 0;

        foreach($mappingService as $data){
            $subTotal = $subTotal + $data->total_harga;
        }

        foreach($mappingMedicine as $data){
            $subTotal = $subTotal + $data->total_harga;
        }
    
        return view('pages.resepsionis.pembayaran.invoice', [
            'regist'        => $regist,
            'services'      => $mappingService,
            'medicines'     => $mappingMedicine,
            'subTotal'      => $subTotal
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $registerPelayananId)
    {
        if ($request->payment == 1) {
            $regist = RegisterPelayanan::FindOrFail($registerPelayananId);
            $regist->update([
                'status' => 'selesai'
            ]);
        }
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
