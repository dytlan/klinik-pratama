@extends('layouts.main')
@section('title','Registrasi Pelayanan')
@section('content')
       <section class="section">
          <div class="section-body">
              <div class="row mb-4">
                  <div class="col-12">
                      <h5>Registrasi {{ $registrations->nama }}</h5>
                  </div>
              </div>
            <div class="row">
              <div class="col-12">
                <a href="{{ route('register.pelayanan.create',$registrations->id) }}" class="btn btn-primary mb-4 btn-sm shadow-sm btn-icon icon-left mb-2"><i class="fas fa-plus"></i>Registrasi</a>
                <div class="card">
                  <div class="card-header">
                    <h4>Daftar Pasien {{ $registrations->nama }}</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped table-hover" id="tableRegistrasi" style="width:100%;">
                        <thead>
                          <tr class="text-center">
                     
                            <th>ID Pasien</th>
                            <th>Nama Pasien</th>
                            <th>Antrian</th>
                            <th>Dokter/Bidan</th>
                            <th>Status</th>
                            <th>Tanggal Registrasi</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach ($registrations->registrations as $regist)
                        <tr class="text-center">
                      
                            <td>{{ $regist->patient_id }}</td>
                            <td>{{ ucwords($regist->patient->nama) }}</td>
                            <td>{{ $regist->kode.'-'.$regist->antrian }}</td>
                            <td>{{ $regist->schedule->user->nama }}</td>
                            <td>{{ ucwords($regist->status) }}</td>
                            <td>{{ $regist->created_at->format('d-m-Y')}}</td>
                            <td>
                            {{-- <div class="d-flex pl-2">
                                <a href="{{ route('user.edit',$user->id) }}" class="btn btn-warning btn-sm btn-icon mr-2">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>
                              <form action="{{ route('user.destroy',$user->id) }}" method="post">
                                @method('DELETE')
                                @csrf
                                <button type="submit" onclick="return confirm('Apakah anda yakin?')" class="btn btn-danger btn-sm btn-icon"><i class="fas fa-trash"></i></button>
                            </form>
                            </div> --}}
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
    $('#tableRegistrasi').DataTable({
       
    });
  </script>
@endpush