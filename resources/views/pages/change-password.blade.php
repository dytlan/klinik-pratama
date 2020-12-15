@extends('layouts.main')
@section('title','Ganti Password')
@section('content')
<section class="section">
    <div class="section-body">

    <div class="row">
        <div class="col-12">
        <div class="card">
            <div class="card-header">
            <h4>Ganti Password</h4>
            </div>
            <div class="card-body">
            <form action="{{ route('change.password',Auth::id()) }}" method="post">
                @method('PUT')
                @csrf
                <div class="row">
                    <div class="col-12 col-md-4">
                        <div class="form-group">
                            <label for="">Password Lama</label>
                            <input required name="old_password" type="password" class="form-control form-control-sm @error('old_password')is-invalid @enderror" focus>
                            @error('old_password')
                                <div class="text-danger text-small">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="form-group">
                            <label for="">Password Baru</label>
                            <input required name="password" type="password" class="form-control form-control-sm @error('password')is-invalid @enderror">
                            @error('password')
                                <div class="text-danger text-small">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="form-group">
                            <label for="">Konfirmasi Password Baru</label>
                            <input required name="password_confirmation" type="password" class="form-control form-control-sm">
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
