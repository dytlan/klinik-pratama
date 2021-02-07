<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

<style>
    table{
  border: 1px solid black;
}
</style>
</head>
<body>
    
<div class="invoice">
              <div class="invoice-print">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="invoice-title">
                      <h2>Invoice</h2>
                      <div class="invoice-number">ID Pendaftaran #{{ $regist->id }}</div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-md-6">
                        <address>
                          <strong>Nama:</strong><br>
                          {{$regist->patient->nama}}<br>
                        </address>
                        <address>
                          <strong>ID Pasien:</strong><br>
                          {{$regist->patient->id}}<br>
                        </address>
                      </div>
                      <div class="col-md-6 text-md-right">
                        <address>
                          <strong>Jenis Pelayanan:</strong><br>
                          {{$regist->schedule->pelayanan->nama}}<br>
                        </address>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <address>
                          <strong>Tanggal Periksa:</strong><br>
                          {{$regist->created_at->format('d-M-Y')}}<br>
                        </address>
                      </div>
                      <div class="col-md-6 text-md-right">
                        <address>
                          <strong>Dokter/Bidan:</strong><br>
                          {{$regist->schedule->user->nama}}<br><br>
                        </address>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row ">
                  <div class="col-md-12">
                    <div class="section-title">Rincian Biaya</div>
                    {{-- <p class="section-lead"></p> --}}
                    <div class="table-responsive">
                      <table class="table table-striped table-hover table-md">
                      
                        <tr>
                          <th data-width="40">#</th>
                          <th>Item</th>
                          <th class="text-center">Harga</th>
                          <th class="text-center">Quantity</th>
                          <th class="text-right">Total</th>
                        </tr>
                             <tr>
                          <th colspan="5" class="">Rincian Biaya Jasa</th>
                        </tr>
                       @foreach ($services as $service)
                        <tr>
                          <td>{{ $loop->iteration }}</td>
                          <td>{{ $service->service->nama }}</td>
                          <td class="text-center">Rp. {{ number_format( $service->service->biaya) }}</td>
                          <td class="text-center">1</td>
                          <td class="text-right">RP. {{ number_format($service->total_harga) }}</td>
                        </tr>
                       @endforeach
                        <tr>
                          <th colspan="5" class="">Rincian Biaya Obat</th>
                        </tr>
                       @forelse ($medicines as $medicine)
                        <tr>
                          <td>{{ $loop->iteration }}</td>
                          <td>{{ $medicine->medicine->nama }}</td>
                          <td class="text-center">Rp. {{ number_format( $medicine->medicine->harga) }}</td>
                          <td class="text-center">{{ $medicine->quantity }}</td>
                          <td class="text-right">RP. {{ number_format($medicine->total_harga) }}</td>
                        </tr>
                        @empty 
                        <tr>
                          <td colspan="5" class="text-center">Data Kosong</td>
                        </tr>
                       @endforelse
                      </table>
                    </div>
                    <div class="row mt-4">
                  
                      <div class="offset-lg-8 col-lg-4 text-right">
                       
                        <hr class="mt-1 mb-2">
                        <div class="invoice-detail-item">
                          <div class="invoice-detail-name">Sub Total</div>
                          <div class="invoice-detail-value invoice-detail-value-lg">Rp. {{number_format($subTotal)}}</div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <hr>
      
            </div>
            </body>  
</html>