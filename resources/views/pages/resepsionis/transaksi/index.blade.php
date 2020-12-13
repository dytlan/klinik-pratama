@extends('layouts.main')
@section('title','Transaksi Selesai')
@section('content')
       <section class="section">
          <div class="section-body">
              <div class="row mb-4">
                  <div class="col-12">
                      <h5>Transaksi Selesai</h5>
                  </div>
              </div>
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Daftar Semua Transaksi Yang Sudah Selesai/h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped table-hover" id="tableTransaksi" style="width:100%;">
                        <thead>
                          <tr class="text-center">
                     
                            <th>#</th>
                            <th>ID Pendaftaran</th>
                            <th>Nama Pasien</th>
                            <th>Jenis Pelayanan</th>
                            <th>Dokter/Bidan</th>
                            <th>Tanggal Transaksi</th>
                            <th>Total Biaya</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach ($registrations->registrations as $regist)
                        <tr class="text-center">
                      
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ ucwords($regist->patient->nama) }}</td>
                            <td>{{ $regist->kode.'-'.$regist->antrian }}</td>
                            <td>{{ $regist->schedule->user->nama }}</td>
                            <td>{{ ucwords($regist->status) }}</td>
                            <td>{{ $regist->created_at->format('d-m-Y')}}</td>
                            <td>
                            <div class="d-flex pl-2">
                                <a href="#" class="btn btn-warning btn-sm icon-left btn-icon mr-2">
                                    <i class="fas fa-file-invoice"></i> Lihat Invoice
                                </a>
                            
                            </div>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>

  @if (session('no_antrian'))
      {{ session('no_antrian') }}
  @endif
@endsection

@push('addon-style')
    <link rel="stylesheet" href="{{ asset('assets/bundles/datatables/datatables.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">
@endpush

@push('addon-script')
     <!-- Page Specific JS File -->
  <script src="{{ asset('assets/bundles/datatables/datatables.min.js') }}"></script>
  <script src="{{ asset('assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>

  <script>
    $('#tableTransaksi').DataTable({
        "order":[]
    });
  </script>
@endpush