@extends('layouts.main')
@section('title','Registrasi Pelayanan')
@section('content')
    <section class="section">
        <div class="row mb-2">
           <div class="col">
              <h6>Silahkan isi form dibawah</h6>
           </div>
        </div>
        <div class="row">
          <div class="col-12">
              <div class="card shadow-sm">
                  <div class="card-body">
                    <form action="{{route('check.patient',['pelayanan' => $pelayananId])}}" method="POST">
                        <div class="row">
                             <div class="col-6">
                                <div class="form-group">
                                    <label for="">ID Pasien</label>
                                    <input type="text" name="patient_id" placeholder="Masukkan ID Pasien" class="form-control">
                                </div>
                            </div>
                            <div class="col-6 d-flex align-items-center">
                                <button type="submit" class="btn btn-success">Cek ID</button>
                            </div>
                        </div>
                    </form>
                    <form action="{{ route('register.pelayanan.store',$service->id) }}" method="post">
                        
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="">Nama Pasien</label>
                                    <input type="text" class="form-control" disabled readonly name="patient_id" value="patient_id">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="">Dokter Tersedia</label>
                                    <select name="" required class="form-control">
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
                  </div>
              </div>
          </div>
        </div>
    </section>
@endsection