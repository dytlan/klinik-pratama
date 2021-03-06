@extends('layouts.main')
@section('title','Dashboard')
@section('content')
    <section class="section">
           <div class="row">
              <div class="col-lg-6 col-md-6 col-12">
                <div class="card card-statistic-1">
                  <div class="card-icon l-bg-purple">
                    <i class="fas fa-file-medical-alt"></i>
                  </div>
                  <div class="card-wrap">
                    <div class="padding-20">
                      <div class="text-right">
                        <h3 class="font-light mb-0">
                          <i class="ti-arrow-up text-success"></i> {{ $total_transaksi }}
                        </h3>
                        <span class="text-muted">Total Permintaan Resep</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-6 col-md-6 col-12">
                <div class="card card-statistic-1">
                  <div class="card-icon l-bg-orange">
                    <i class="fas fa-file-medical-alt"></i>
                  </div>
                  <div class="card-wrap">
                    <div class="padding-20">
                      <div class="text-right">
                        <h3 class="font-light mb-0">
                          <i class="ti-arrow-up text-success"></i> {{ $total }}
                        </h3>
                        <span class="text-muted">Total Permintaan Resep Hari Ini</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-6 col-md-6 col-12">
                <div class="card card-statistic-1">
                  <div class="card-icon l-bg-green">
                    <i class="fas fa-briefcase-medical"></i>
                  </div>
                  <div class="card-wrap">
                    <div class="padding-20">
                      <div class="text-right">
                        <h3 class="font-light mb-0">
                          <i class="ti-arrow-up text-success"></i> {{ $obat }}
                        </h3>
                        <span class="text-muted">Total Obat Hampir Habis</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

           
            </div>
    </section>
@endsection