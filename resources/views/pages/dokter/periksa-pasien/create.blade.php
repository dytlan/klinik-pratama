@extends('layouts.main')
@section('title','Periksa Pasien')
@section('content')
<section class="section">
    <div class="section-body">
    <div class="row">
        <div class="col-12">
            <nav class="breadcrumb bg-transparent">
                <a class="breadcrumb-item" href="{{ route('periksa-pasien') }}">Kembali</a>
                <span class="breadcrumb-item active">Periksa</span>
            </nav>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
        <div class="card">
            <div class="card-header">
            <h4>Silahkan Isi Data Rekam Medis</h4>
            </div>
            <div class="card-body">
            <form action="{{ route('user.store') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-3">
                        <div class="form-group">
                            <label for="">Berat Badan</label>
                                <div class="input-group mb-3">
                                    <input name="berat_badan" type="number" min="0" max="500" class="form-control @error('berat_badan') is-invalid @enderror" required value="{{ old('berat_badan') }}">
                                    <div class="input-group-append">
                                        <span class="input-group-text">Kg</span>
                                    </div>
                                </div>
                            @error('berat_badan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="">Tinggi Badan</label>
                                <div class="input-group mb-3">
                                    <input type="number" name="tinggi_badan" min="0" max="300" class="form-control @error('tinggi_badan') is-invalid @enderror" required value="{{ old('tinggi_badan') }}">
                                    <div class="input-group-append">
                                        <span class="input-group-text">Cm</span>
                                    </div>
                                </div>
                            @error('tinggi_badan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="">Tensi Darah</label>
                                <div class="input-group mb-3">
                                    <input type="number" name="tensi" min="0" max="300" class="form-control @error('tensi') is-invalid @enderror" required value="{{ old('tensi') }}">
                                    <div class="input-group-append">
                                        <span class="input-group-text">mmHg</span>
                                    </div>
                                </div>
                            @error('tensi')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="">Alergi Obat</label><br>
                             <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="alergi_obat" id="inlineRadio1" value="1">
                            <label class="form-check-label" for="inlineRadio1">Ya</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" checked type="radio" name="alergi_obat" id="inlineRadio2" value="0">
                            <label class="form-check-label" for="inlineRadio2">Tidak</label>
                        </div>
                        </div>
                    </div>
                </div>
               <div class="row">
                   <div class="col-md-6">
                        <div class="form-group">
                            <label >Diagnosa</label>
                            <input type="text" class="form-control @error('diagnosa') is-invalid @enderror" name="diagnosa" required focus placeholder="Masukkan Diagnosa" value="{{ old('diagnosa') }}">
                            @error('diagnosa')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                   </div>
                   <div class="col-md-6">
                        <div class="form-group">
                            <label >Keluhan</label>
                            <input type="text" class="form-control @error('keluhan') is-invalid @enderror" name="keluhan" required placeholder="Masukkan Keluhan" value="{{ old('keluhan') }}">
                            @error('keluhan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                   </div>
               </div>
               <div class="row">
                   <div class="col-12">
                       <div class="form-group">
                           <label>Anamnesis</label>
                           <textarea name="anamnesis" class="form-control @error('anamnesis') is-invalid @enderror" style="height: 100px !important" required>{{ old('anamnesis') }}</textarea>
                       </div>
                   </div>
               </div>
                 <div class="row">
                   <div class="col-md-6">
                        <div class="form-group">
                            <label >Tindakan</label>
                            <input type="text" class="form-control @error('tindakan') is-invalid @enderror" name="tindakan" required placeholder="Masukkan Tindakan" value="{{ old('tindakan') }}">
                            @error('tindakan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                   </div>
                   <div class="col-md-6">
                        <div class="form-group">
                            <label >Keterangan</label>
                           <textarea name="keterangan" class="form-control @error('keterangan') is-invalid @enderror" style="height: 100px !important" required>{{ old('keterangan') }}</textarea>
                            @error('keterangan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                   </div>
               </div>
               <hr>
                  <div class="row">
                   <div class="col-12">
                       <div class="form-group">
                           <label>Resep</label>
                           <textarea name="anamnesis" class="form-control" style="height: 150px !important">{{ old('anamnesis') }}</textarea>
                            <small class="text-danger">
                                Kosongkan Jika Tidak Ingin Buat Resep
                            </small>
                       </div>
                   </div>
               </div>
               <div class="row">
                   <div class="col-6 offset-3">
                       <button type="submit" class="btn btn-primary btn-block" onclick="return confirm('Pastikan Data Sudah Benar')">Simpan</button>
                   </div>
               </div>
            </form>
            </div>
        </div>
        </div>
    </div>
    </div>
</section>
@endsection
