@extends('layouts.main')
@section('title','Tambah Jadwal')
@section('content')
<section class="section">
    <div class="section-body">
    <div class="row">
        <div class="col-12">
            <nav class="breadcrumb bg-transparent">
                <a class="breadcrumb-item" href="{{ route('jadwal.index') }}">Kembali</a>
                <span class="breadcrumb-item active">Tambah Jadwal</span>
            </nav>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
        <div class="card">
            <div class="card-header">
            <h4>Silahkan isi form</h4>
            </div>
            <div class="card-body">
            <form action="{{ route('jadwal.store') }}" method="post">
                @csrf
               
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label >Nama Pelayanan</label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" required focus placeholder="Masukkan Nama Pelayanan" value="{{ old('nama') }}">
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
                            <select name="hari" required class="form-control @error ('hari') is-invalid @enderror" >
                                <option disabled selected>Silahkan Pilih Hari</option>
                                <option value="Senin">Senin</option>
                                <option value="Selasa">Selasa</option>
                                <option value="Rabu">Rabu</option>
                                <option value="Kamis">Kamis</option>
                                <option value="Jumat">Jumat</option>
                                <option value="Sabtu">Sabtu</option>
                                <option value="Minggu">Minggu</option>
                            </select>
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
                            <input type="text" required class="form-control jamMulai @error('mulai') is-invalid @enderror" name="mulai" placeholder="Pilih Jam Mulai"  value="{{ old('mulai') }}">
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
                            <input type="text" required  class="form-control jamSelesai @error('sampai') is-invalid @enderror" name="sampai" placeholder="Pilih Jam Selesai"  value="{{ old('sampai') }}">
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
                            <input type="text" class="form-control @error('ruangan') is-invalid @enderror" name="ruangan" required placeholder="Masukkan Nama Ruangan" value="{{ old('ruangan') }}">
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
                                <option disabled selected>Silahkan Pilih Dokter</option>
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

@push('addon-style')
       <link rel="stylesheet" href="{{ asset('assets/bundles/bootstrap-daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/bundles/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}">
@endpush

@push('addon-script')
    <script src="{{ asset('assets/bundles/bootstrap-daterangepicker/daterangepicker.js') }}"></script>

  <script src="{{ asset('assets/bundles/bootstrap-timepicker/js/bootstrap-timepicker.min.js') }}"></script>


     <script>
    //      $("#hariKerja").daterangepicker({
             
    //     locale: { format: "DD/MM/YYYY" },
    //     singleDatePicker: true,
    //   });
         $(".jamMulai").timepicker({
             maxHours:24,
             defaultTime:false,
             showMeridian:false,
            icons: {
                up: "fas fa-chevron-up",
                down: "fas fa-chevron-down"
            }
            });
         $(".jamSelesai").timepicker({
             maxHours:24,
             defaultTime:false,
             showMeridian:false,
            icons: {
                up: "fas fa-chevron-up",
                down: "fas fa-chevron-down"
            }
            });
    </script>
@endpush