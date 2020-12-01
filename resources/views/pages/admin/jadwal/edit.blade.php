@extends('layouts.main')
@section('title','Edit Akun')
@section('content')
<section class="section">
    <div class="section-body">
    <div class="row">
        <div class="col-12">
            <nav class="breadcrumb bg-transparent">
                <a class="breadcrumb-item" href="{{ route('user.index') }}">Kembali</a>
                <span class="breadcrumb-item active">Edit Ruangan</span>
            </nav>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
        <div class="card">
            <div class="card-header">
            <h4>Edit ruangan {{ $user->nama }}</h4>
            </div>
            <div class="card-body">
            <form action="{{ route('user.update',$user->id) }}" method="post">
                @method('PUT')
                @csrf
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label >Nama Pelayanan</label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" required focus placeholder="Masukkan Nama Pelayanan" value="{{ $jadwal->nama }}">
                            @error('nama')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label >Hari Kerja</label>
                            <input type="date" id="hariKerja" required class="form-control @error('hari') is-invalid @enderror" name="hari" placeholder="Pilih Hari"  value="{{ $jadwal->hari }}">
                            @error('hari')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                  
                </div>

                <div class="row">
                      <div class="col-6">
                        <div class="form-group">
                            <label >Jam Mulai</label>
                            <input type="text" required class="form-control jamMulai @error('mulai') is-invalid @enderror" name="mulai" placeholder="Pilih Jam Mulai"  value="{{ $jadwal->mulai }}">
                            @error('mulai')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                      <div class="col-6">
                        <div class="form-group">
                            <label >Jam Selesai</label>
                            <input type="text" required  class="form-control jamSelesai @error('sampai') is-invalid @enderror" name="sampai" placeholder="Pilih Jam Selesai"  value="{{ $jadwal->sampai }}">
                            @error('sampai')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                </div>
                
                 <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label >Nama Ruangan</label>
                            <input type="text" class="form-control @error('ruangan') is-invalid @enderror" name="ruangan" required placeholder="Masukkan Nama Ruangan" value="{{ $jadwal->ruangan}}">
                            @error('ruangan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label >Pilih Dokter</label>
                            <select class="form-control @error('user_id') is-invalid @enderror" name="user_id" required>
                                <option selected value="{{ $jadwal->user_id }}">{{ $jadwal->user->nama }}</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->nama }}</option>
                                @endforeach
                            </select>
                                @error('user_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                  
                </div>
                <button type="submit" class="btn btn-primary btn-lg">Simpan</button>
                
            </form>
            </div>
        </div>
        </div>
    </div>
    </div>
</section>
@endsection
