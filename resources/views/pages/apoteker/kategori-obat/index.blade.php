@extends('layouts.main')
@section('title','Kategori Obat')
@section('content')
       <section class="section">
          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <a href="{{ route('kategori.create') }}" class="btn btn-primary btn-sm shadow-sm btn-icon icon-left mb-2"><i class="fas fa-plus"></i>Tambah Kategori</a>
                <div class="card">
                  <div class="card-header">
                    <h4>Kategori Obat</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped table-hover" id="tableKategori" style="width:100%;">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Kategori</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach ($categories as $category)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ ucwords($category->kategori) }}</td>
                            <td>
                            <div class="d-flex pl-2">
                                <a href="{{ route('kategori.edit',$category->id) }}" class="btn btn-warning btn-sm btn-icon mr-2">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>
                              <form action="{{ route('kategori.destroy',$category->id) }}" method="post">
                                @method('DELETE')
                                @csrf
                                <button type="submit" onclick="return confirm('Apakah anda yakin?')" class="btn btn-danger btn-sm btn-icon"><i class="fas fa-trash"></i></button>
                            </form>
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
    $('#tableKategori').DataTable({
       
    });
  </script>
@endpush