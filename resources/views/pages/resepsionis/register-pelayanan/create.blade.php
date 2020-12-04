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
                    <form action="#" method="post">
                        <div class="row">
                             <div class="col-6">
                                <div class="form-group">
                                    <label for="">ID Pasien</label>
                                    <input type="text" name="" placeholder="Masukkan ID Pasien" class="form-control">
                                </div>
                            </div>
                            <div class="col-6 d-flex align-items-center">
                                <button type="button" class="btn btn-success">Cek ID</button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <p>ID terdaftar atas nama <span>Agung Sulaiman</span></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="">Dokter Tersedia</label>
                                    <select name="" class="form-control">
                                        <option disabled selected>Silahkan Pilih Dokter</option>
                                        
                                    </select>
                                </div>
                            </div>
                        </div>
                    </form>
                  </div>
              </div>
          </div>
        </div>
    </section>
@endsection