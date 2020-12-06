@extends('layouts.main')
@section('title','Buat Permintaan Resep')
@section('content')
<section class="section">
    <div class="section-body">
    <div class="row">
        <div class="col-12">
            <nav class="breadcrumb bg-transparent">
                <a class="breadcrumb-item" href="{{ route('permintaan-resep') }}">Kembali</a>
                <span class="breadcrumb-item active">Permintaan Resep</span>
            </nav>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-12">
            <h5 class="text-dark">Permintaan Resep No Antrean {{ $record->register->antrian }}</h5>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <h6 class="mb-4">Data Rekam Medis</h6>
                             <form>
                                <div class="form-group row mb-0">
                                    <label  class="col-sm-3 col-form-label">Nama Pasien</label>
                                    <div class="col-sm-9">
                                    <input type="text" readonly class="form-control-plaintext" value="{{ $record->patient->nama}}">
                                    </div>
                                </div>
                                <div class="form-group row mb-0">
                                    <label  class="col-sm-3 col-form-label">Nama Dokter</label>
                                    <div class="col-sm-9">
                                    <input type="text" readonly class="form-control-plaintext" value="{{ $record->dokter->nama }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label  class="col-sm-3 col-form-label">Alergi Obat</label>
                                    <div class="col-sm-9">
                                    <input type="text" readonly class="form-control-plaintext" value="{{ $record->alergi_obat ? 'Ya' :'Tidak' }}">
                                    </div>
                                </div>
                             </form>
                        </div>
                        <div class="col-6">
                            <h6 class="mb-4">Permintaan Resep</h6>
                            <textarea readonly disabled class="form-control" style="height: 150px !important">{{ $record->resep }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <tambah-resep></tambah-resep>

    </div>
</section>
@endsection
