@extends('layouts.main')
@section('title','Dashboard')
@section('content')
    <section class="section">
        <div class="row">
          <div class="col-lg-4 col-md-6 col-12">
            <div class="card card-statistic-1">
              <div class="card-icon l-bg-green">
                <i class="fas fa-procedures"></i>
              </div>
              <div class="card-wrap">
                <div class="padding-20">
                  <div class="text-right">
                    <h3 class="font-light mb-0">
                      <i class="ti-arrow-up text-success"></i> 524
                    </h3>
                    <span class="text-muted">Pasien Hari Ini</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 col-12">
            <div class="card card-statistic-1">
              <div class="card-icon l-bg-purple">
                <i class="fas fa-clock"></i>
              </div>
              <div class="card-wrap">
                <div class="padding-20">
                  <div class="text-right">
                    <h3 class="font-light mb-0">
                      <i class="ti-arrow-up text-success"></i> 12:00 - 18:00
                    </h3>
                    <span class="text-muted">jam Kerja Hari Ini</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </section>
@endsection