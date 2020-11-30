@extends('layouts.main')
@section('title','Edit Pasien')
@section('content')
<section class="section">
    <div class="section-body">
    <div class="row">
        <div class="col-12">
            <nav class="breadcrumb bg-transparent">
                <a class="breadcrumb-item" href="{{ route('pasien.index') }}">Kembali</a>
                <span class="breadcrumb-item active">Edit pasien</span>
            </nav>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
        <div class="card">
            <div class="card-header">
            <h4>Edit Data Pasien</h4>
            </div>
            <div class="card-body">
            <form action="{{ route('pasien.update',$patient->id) }}" method="post">
                @method('PUT')
                @csrf
               <div class="row">
                   <div class="col-md-6">
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" required focus placeholder="Masukkan Nama Lengkap" value="{{ $patient->nama }}">
                            @error('nama')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                   </div>
                   <div class="col-md-6">
                       <div class="form-group">
                           <label>NIK</label>
                           <input type="number" class="form-control @error('nik') is-invalid @enderror" name="nik" required placeholder="Masukkan NIK" value="{{ $patient->nik}}">
                            @error('nik')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                       </div>
                   </div>
               </div>
               <div class="row">
                   <div class="col-md-6">
                        <div class="form-group">
                            <label>Jenis Kelamin</label>
                            <select  class="form-control @error('jk') is-invalid @enderror" name="jk" required >
                                <option selected class="readonly" value="{{ $patient->jk }}">{{ ucwords($patient->jk) }}</option>
                                <option value="laki-laki">Laki-Laki</option>
                                <option value="perempuan">Perempuan</option>
                            </select>
                            @error('jk')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                   </div>
                   <div class="col-md-6">
                       <div class="form-group">
                           <label>Nomor Handphone</label>
                           <input type="number" class="form-control @error('no_hp') is-invalid @enderror" name="no_hp" required placeholder="Masukkan Nomor Handphone" value="{{ $patient->no_hp }}">
                            @error('no_hp')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                       </div>
                   </div>
               </div>
               <div class="row">
                   <div class="col-md-6">
                        <div class="form-group">
                            <label>Pendidikan</label>
                            <select  class="form-control @error('pendidikan') is-invalid @enderror" name="pendidikan" required >
                                <option selected class="readonly" value="{{ $patient->pendidikan }}">{{ ucwords($patient->pendidikan) }}</option>
                                <option value="belum/tidak sekolah">Belum/Tidak Sekolah</option>
                                <option value="sd sederajat">SD Sederajat</option>
                                <option value="smp sederajat">SMP Sederajat</option>
                                <option value="sma sederajat">SMA Sederajat</option>
                                <option value="universitas sederajat">Universitas Sederajat</option>
                            </select>
                            @error('pendidikan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                   </div>
                   <div class="col-md-6">
                       <div class="form-group">
                           <label>Pekerjaan</label>
                           <input type="text" class="form-control @error('pekerjaan') is-invalid @enderror" name="pekerjaan" required placeholder="Masukkan Nama Pekerjaan" value="{{ $patient->pekerjaan }}">
                            @error('pekerjaan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                       </div>
                   </div>
               </div>
               <div class="row">
                   <div class="col-md-6">
                        <div class="form-group">
                           <label>Tempat Lahir</label>
                           <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" name="tempat_lahir" required placeholder="Masukkan Tempat Lahir" value="{{ $patient->tempat_lahir }}">
                            @error('tempat_lahir')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                       </div>
                   </div>
                   <div class="col-md-6">
                       <div class="form-group">
                           <label>Tanggal Lahir</label>
                           <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" name="tanggal_lahir" required value="{{ $patient->tanggal_lahir }}">
                            @error('tanggal_lahir')
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
                           <label>Alamat Lengkap</label>
                           <textarea style="height: 100px !important" class="form-control @error('alamat') is-invalid @enderror" name="alamat" required placeholder="Masukkan Alamat Lengkap" value="{{ $patient->alamat }}"></textarea>
                            @error('alamat')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                       </div>
                   </div>
               </div>
                <button type="submit" class="btn btn-primary btn-lg">Ubah Data</button>
                
            </form>
            </div>
        </div>
        </div>
    </div>
    </div>
</section>
@endsection
