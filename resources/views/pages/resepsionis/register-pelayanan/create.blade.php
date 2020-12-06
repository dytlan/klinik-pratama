@extends('layouts.main')
@section('title','Registrasi Pelayanan')
@section('content')
    <section class="section">
        <div class="row">
            <nav class="breadcrumb bg-transparent">
                <a class="breadcrumb-item" href="{{ route('pelayanan.show',$service->id) }}">Kembali</a>
                <span class="breadcrumb-item active">{{ $service->nama }}</span>
            </nav>
        </div>
        <div class="row mb-2">
           <div class="col">
              <h6>Silahkan isi form dibawah</h6>
           </div>
        </div>
        <div class="row">
          <div class="col-12">
              <div class="card shadow-sm">
                  <div class="card-body">
                    <form action="{{route('check.patient',$service->id)}}" method="POST">
                        @csrf
                        <div class="row">
                             <div class="col-6">
                                <div class="form-group">
                                    <label for="">ID Pasien</label>
                                    <input type="text" name="patient_id" placeholder="Masukkan ID Pasien" class="form-control" value="{{session('patient')->id ?? ''}}">
                                </div>
                            </div>
                            <div class="col-6 d-flex align-items-center">
                                <button type="submit" class="btn btn-success">Cek ID</button>
                            </div>
                        </div>
                    </form>
                    
                    @error('patient_id')
                        <p class="text-danger">Pasien Tidak Terdaftar </p>
                    @enderror
                    @if (session('patient'))
                         <form action="{{ route('register.pelayanan.store',$service->id) }}" method="post">
                        @csrf

                        <input type="text" name="patient_id" required hidden name="patient_id" value="{{ session('patient')->id }}">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="">Nama Pasien</label>
                                    <input type="text" class="form-control" disabled readonly value="{{session('patient')->nama}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="">NIK Pasien</label>
                                    <input type="text" class="form-control" disabled readonly value="{{session('patient')->nik}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="">Dokter Tersedia</label>
                                    <select name="jadwal_praktek_id" required class="form-control">
                                        <option disabled selected>Silahkan Pilih Dokter</option>
                                        @foreach ($schedules as $schedule)
                                            <option value="{{ $schedule->id }}">{{ $schedule->user->nama }} / Jam Praktek ({{ $schedule->mulai }} - {{ $schedule->sampai }})</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary" onclick="return(confirm('Pastikan data sudah benar'))">Simpan</button>
                            </div>
                        </div>
                    </form>
                    @endif
                   
                  </div>
              </div>
          </div>
        </div>
    </section>
@endsection