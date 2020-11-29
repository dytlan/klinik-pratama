@extends('layouts.auth')
@section('title','Login')
@section('content')
<section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-md-8 offset-md-2">
            <div class="card card-primary card-login">
              <div class="card-header justify-content-center">
                  <div class="row">
                    <img src="{{ asset('assets/img/logo.jpeg') }}" width="180" height="180" alt="">
                  </div>
              </div>
         
              <div class="card-body">
                <h6 class="text-center mb-4">Silahkan Login</h6>
                <form method="POST" action="{{ route('login') }}" class="needs-validation" novalidate="">
                  @csrf
                  <div class="form-group">
                    <label for="username">Username</label>
                    <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" value="{{ old('username') }}" name="username" tabindex="1" required autofocus>
                
                    @error('username')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <div class="d-block">
                      <label for="password" class="control-label">Password</label>
                    
                    </div>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" tabindex="2" required>
                 
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" name="remember" id="remember-me" {{ old('remember') ? 'checked' : '' }} class="custom-control-input" tabindex="3">
                      <label class="custom-control-label" for="remember-me">Remember Me</label>
                    </div>
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                      Login
                    </button>
                  </div>
                </form>
          
              </div>
            </div>
     
          </div>
        </div>
      </div>
    </section>
@endsection
