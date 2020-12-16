@extends('layouts.main')
@section('title','Kelola Data Obat')
@section('content')
<section class="section">
    <div class="section-body">
    <div class="row">
        <div class="col-12">
        <a href="{{ route('data-obat.create') }}" class="btn btn-primary btn-sm shadow-sm btn-icon icon-left mb-2"><i class="fas fa-plus"></i>Tambah Obat</a>
        <div class="card">
            <div class="card-header">
            <h4>Data Obat</h4>
            </div>
            <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover" id="tableDataObat" style="width:100%;">
                <thead>
                    <tr>
                    <th>#</th>
                    <th>Nama</th>
                    <th>Kategori</th>
                    <th>Kandungan</th>
                    <th>Satuan</th>
                    <th>Jumlah</th>
                    <th>Harga</th>
                    <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($medicines as $medicine)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ ucwords($medicine->nama) }}</td>
                    <td>{{ $medicine->kandungan }}</td>
                    <td>{{ $medicine->satuan }}</td>
                    <td>{{ $medicine->category->kategori }}</td>
                    <td>{{ $medicine->jumlah }}</td>
                    <td>Rp. {{ number_format($medicine->harga) }}</td>
                    <td>
                    <div class="d-flex pl-2">
                        <a href="{{ route('data-obat.edit',$medicine->id) }}" class="btn btn-warning btn-sm btn-icon mr-2">
                            <i class="fas fa-pencil-alt"></i>
                        </a>
                        <form action="{{ route('data-obat.destroy',$medicine->id) }}" method="post">
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
    $('#tableDataObat').DataTable({
       
    });
  </script>
@endpush