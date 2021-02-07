@extends('layouts.main')
@section('title','Rekam Medis Pasien')
@section('content')
       <section class="section">
          <div class="section-body">
              <div class="row mb-4">
                  <div class="col-12">
                      <h5>Rekam Medis Pasien</h5>
                  </div>
              </div>
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Daftar Semua Rekam Medis Pasien</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped table-hover" id="tableRecord" style="width:100%;">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Nama Pasien</th>
                            <th>Pelayanan</th>
                            <th>Dokter/Bidan</th>
                            <th>Diagnosa</th>
                            <th>Keluhan</th>
                            <th>Tanggal Berobat</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach ($records as $record)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $record->patient->nama }}</td>
                            <td>{{ $record->service->nama }}</td>
                            <td>{{ $record->dokter->nama }}</td>
                            <td>{{ $record->diagnosa }}</td>
                            <td>{{ $record->keluhan }}</td>
                            <td>{{ $record->created_at->format('d-m-Y')}}</td>
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
    $('#tableRecord').DataTable({
        "order":[],
    
    });
  </script>
@endpush