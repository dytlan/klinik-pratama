@extends('layouts.main')
@section('title','Tambah Kategori Obat')
@section('content')
<section class="section">
    <div class="section-body">
    <div class="row">
        <div class="col-12">
            <nav class="breadcrumb bg-transparent">
                <a class="breadcrumb-item" href="{{ route('kategori.index') }}">Kembali</a>
                <span class="breadcrumb-item active">Tambah Kategori Obat</span>
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
            <form action="{{ route('kategori.store') }}" method="post">
                @csrf
    
                    <div class="form-group">
                        <label >Kategori</label>
                        <input type="text" class="form-control @error('kategori') is-invalid @enderror" name="kategori" required focus placeholder="Masukkan Kategori" value="{{ old('kategori') }}">
                        @error('kategori')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
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
