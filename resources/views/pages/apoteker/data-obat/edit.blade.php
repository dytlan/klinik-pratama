@extends('layouts.main')
@section('title','Edit Data Obat')
@section('content')
<section class="section">
    <div class="section-body">
    <div class="row">
        <div class="col-12">
            <nav class="breadcrumb bg-transparent">
                <a class="breadcrumb-item" href="{{ route('kategori.index') }}">Kembali</a>
                <span class="breadcrumb-item active">Edit Data Obat</span>
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
            <form action="{{ route('data-obat.update',$medicine->id) }}" method="post">
                @method('PUT')
                @csrf
                <div class="row">
                    <div class="col-md-6">
                         <div class="form-group">
                            <label >Nama Obat</label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" required focus placeholder="Masukkan nama obat" value="{{ $medicine->nama}}">
                            @error('nama')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                        <label for="">Kategori Obat</label>
                        <select name="kategori_obat_id" class="form-control  @error('kategori_obat_id') is-invalid @enderror" required>
                            <option readonly selected disabled>Silahkan pilih kategori</option>
                            @foreach ($categories as $category)
                                <option {{ $medicine->kategori_obat_id == $category->id ? 'selected' :'' }} value="{{ $category->id }}">{{ $category->kategori }}</option>
                            @endforeach
                        </select>
                        @error('kategori_obat_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror

                        </div>
                    </div>
                       <div class="col-md-6">
                         <div class="form-group">
                            <label >Jumlah Obat</label>
                            <input type="number" min="0" class="form-control @error('jumlah') is-invalid @enderror" name="jumlah" required placeholder="Masukkan jumlah obat" value="{{ $medicine->jumlah}}">
                            @error('jumlah')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                       <div class="col-md-6">
                         <div class="form-group">
                            <label >Harga Obat</label>
                            <input type="number" min="0" class="form-control @error('harga') is-invalid @enderror" name="harga" required placeholder="Masukkan harga obat" value="{{ $medicine->harga}}">
                            @error('harga')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label >Satuan Obat</label>
                            <input type="text"  class="form-control @error('satuan') is-invalid @enderror" name="satuan" required placeholder="Tablet,botol,kapsul..." value="{{ $medicine->satuan}}">
                            @error('satuan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                    <div class="form-group">
                        <label>Kandungan Obat</label>
                        <textarea name="kandungan" style="height: 100px !important" required class="form-control @error('kandungan') is-invalid @enderror" cols="30" rows="10">{{ $medicine->kandungan}}</textarea>
                        @error('kandungan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                    </div>
                    </div>
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
