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
                    <h4>Daftar Semua Transaksi Yang Sudah Selesai</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped table-hover" id="tableTransaksi" style="width:100%;">
                        <thead>
                          <tr class="">
                     
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
                        @foreach ($registers as $register)
                        <tr class="">
                      
                            <td>{{ $loop->iteration }}</td>
                            <td >{{ $register->id }}</td>
                            <td>{{ $register->patient->nama }}</td>
                            <td>{{ $register->jenis_pelayanan }}</td>
                            <td>{{ $register->schedule->user->nama }}</td>
                            <td>{{ $register->created_at->format('d-m-Y')}}</td>
                            <td>Rp. {{ number_format($register->sub_total) }}</td>
                            <td>
                            <div class="d-flex pl-2">
                                <a data-toggle="tooltip" data-original-title="Lihat Invoice" href="{{ route('keuangan.transaksi.show',$register->id) }}" class="btn btn-primary btn-sm  btn-icon">
                                    <i class="fas fa-file-invoice"></i> 
                                </a>
                                <a data-toggle="tooltip" data-original-title="Print Invoice" href="{{ route('keuangan.transaksi.pdf',$register->id) }}" class="btn btn-primary btn-sm  btn-icon">
                                    <i class="fas fa-print"></i>
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
        "order":[],
        'columnDefs': [
                {
                    "targets": 1,
                    "width": "5%"
                },
        ],
    });
  </script>
@endpush