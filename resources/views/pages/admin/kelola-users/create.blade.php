@extends('layouts.main')
@section('title','Buat Akun')
@section('content')
<section class="section">
    <div class="section-body">
    <div class="row">
        <div class="col-12">
            <nav class="breadcrumb bg-transparent">
                <a class="breadcrumb-item" href="{{ route('user.index') }}">Kembali</a>
                <span class="breadcrumb-item active">Buat Akun</span>
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
            <form action="{{ route('user.store') }}" method="post">
                @csrf
               <div class="row">
                   <div class="col-md-6">
                        <div class="form-group">
                            <label >Nama</label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" required focus placeholder="Masukkan Nama" value="{{ old('nama') }}">
                            @error('nama')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                   </div>
                   <div class="col-md-6">
                       <div class="form-group">
                           <label>STR</label>
                           <input type="text" class="form-control @error('str') is-invalid @enderror" name="str" required placeholder="Masukkan STR" value="{{ old('str') }}">
                            @error('str')
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
                            <label>Username</label>
                            <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" required placeholder="Masukkan Username" value="{{ old('username') }}">
                            @error('username')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                   </div>
                   <div class="col-md-6">
                       <div class="form-group">
                           <label>Password</label>
                           <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required placeholder="Masukkan Password">
                            @error('password')
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
                            <label>Silahkan pilih roles</label>
                            <select class="form-control @error('role_id') is-invalid @enderror" name="role_id" required>
                                <option readonly selected disabled>Silahkan pilih</option>
                                @foreach ($roles as $role)
                                    <option value="{{ $role->id }}">{{ ucwords($role->nama )}}</option>
                                @endforeach
                            </select>
                            @error('role_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                   </div>
                    <div class="col-md-6">
                       <div class="form-group">
                           <label>Masa Berlaku</label>
                           <input type="date" class="form-control @error('masa_berlaku') is-invalid @enderror" name="masa_berlaku" required  value="{{ old('masa_berlaku') }}">
                            @error('masa_berlaku')
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
