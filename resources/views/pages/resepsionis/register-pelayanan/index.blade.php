@extends('layouts.main')
@section('title','Registrasi Pelayanan')
@section('content')
    <section class="section">
        <div class="row mb-2">
           <div class="col">
              <h6>Registrasi Pelayanan</h6>
           </div>
        </div>
        <div class="row">
          @foreach ($services as $service)
              <div class="col-6 col-md-4">
                <a href="#" class="text-decoration-none text-black-50">
                  <div class="card">
                  <div class="card-body">
                    <h6>{{ $service->nama }}</h6>
                  </div>
                </div>
                </a>
              </div>
          @endforeach
        </div>
    </section>
@endsection