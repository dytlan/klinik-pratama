@extends('layouts.main')
@section('title','Pembayaran')
@section('content')
    <section class="section">
        <div class="row">
          <div class="col-6">
              <div class="card card-warning">
                  <div class="card-header">
                      <h6>Belum Bayar <span class="badge badge-warning badge-sm badge-pill">{{ $ongoingAntrian->count() }}</span></h6>
                  </div>
                  <div class="card-body">
                      <ul class="list-group">
                        @forelse ($ongoingAntrian as $antrian)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                {{ $antrian->patient->nama }} / No Antrian ({{ $antrian->kode }}-{{ $antrian->antrian }})
                                <span><a href="{{ route('pembayaran.invoice',$antrian->id) }}" class="btn btn-primary btn-sm">Lihat Biaya</a></span>
                            </li>
                        @empty 
                            <li class="list-group-item text-center">
                                Belum Ada Pembayaran
                            </li>
                        @endforelse
                    </ul>
                  </div>
              </div>
          </div>
          <div class="col-6">
              <div class="card card-success">
                  <div class="card-header">
                      <h6>Sudah Bayar <span class="badge badge-success badge-sm badge-pill">{{ $doneAntrian->count() }}</span></h6>
                  </div>
                  <div class="card-body">
                      <ul class="list-group">
                         @forelse ($doneAntrian as $done)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                {{ $done->patient->nama }} / No Antrian ({{ $done->kode }}-{{ $done->antrian }})
                                <span class="badge badge-success badge-sm badge-pill">Selesai</span>
                            </li>
                        @empty 
                            <li class="list-group-item text-center">
                                Belum Ada Pembayaran
                            </li>
                        @endforelse
                    </ul>
                  </div>
              </div>
          </div>
        </div>
    </section>
@endsection