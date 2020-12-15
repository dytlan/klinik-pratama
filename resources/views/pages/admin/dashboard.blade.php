@extends('layouts.main')
@section('title','Dashboard')
@section('content')
    <section class="section">
           <div class="row">
              <div class="col-lg-3 col-md-4 col-12">
                <div class="card card-statistic-1">
                  <div class="card-icon l-bg-purple">
                    <i class="fas fa-clipboard-list"></i>
                  </div>
                  <div class="card-wrap">
                    <div class="padding-20">
                      <div class="text-right">
                        <h3 class="font-light mb-0">
                          <i class="ti-arrow-up text-success"></i> {{$resepsionis}}
                        </h3>
                        <span class="text-muted">Resepsionis</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-md-4  col-12">
                <div class="card card-statistic-1">
                  <div class="card-icon l-bg-green">
                    <i class="fas fa-briefcase-medical"></i>
                  </div>
                  <div class="card-wrap">
                    <div class="padding-20">
                      <div class="text-right">
                        <h3 class="font-light mb-0">
                          <i class="ti-arrow-up text-success"></i> {{$apoteker}}
                        </h3>
                        <span class="text-muted">Apoteker</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-md-4  col-12">
                <div class="card card-statistic-1">
                  <div class="card-icon l-bg-cyan">
                    <i class="fas fa-hand-holding-heart"></i>
                  </div>
                  <div class="card-wrap">
                    <div class="padding-20">
                      <div class="text-right">
                        <h3 class="font-light mb-0">
                          <i class="ti-arrow-up text-success"></i> {{$dokter}}
                        </h3>
                        <span class="text-muted">Dokter</span>
                      </div>
                    </div>  
                  </div>
                </div>
              </div>

                <div class="col-lg-3 col-md-4  col-12">
                <div class="card card-statistic-1">
                  <div class="card-icon l-bg-orange">
                    <i class="fas fa-hand-holding-heart"></i>
                  </div>
                  <div class="card-wrap">
                    <div class="padding-20">
                      <div class="text-right">
                        <h3 class="font-light mb-0">
                          <i class="ti-arrow-up text-success"></i> {{$bidan}}
                        </h3>
                        <span class="text-muted">Bidan</span>
                      </div>
                    </div>  
                  </div>
                </div>
              </div>
           
            </div>
    </section>
@endsection