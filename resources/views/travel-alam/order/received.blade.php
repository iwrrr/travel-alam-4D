@extends('travel-alam.layout')

@section('title')
  Travel Alam - Konfirmasi
@endsection

@section('content')
  <!-- Konfirmasi Section -->
  <section id="received" class="received">

    <div class="container">

      <div class="row mb-4">
        <div class="col-md">
          <header class="keranjang-header">
            <h3><img src="{{ asset('travel-alam/assets/img/Icon material-shopping-cart-1.png') }}" height="25" alt=""> Pesanan Anda</h3>
            <div class="received-line"></div>
          </header>
        </div>
      </div>
      
      <div class="row mb-3">
        <div class="col-3">
          <h5 class="prim-color" style="margin-bottom: -10px;"><strong>Penyewa</strong></h5>
          <br> Nama  &nbsp;   &nbsp;   &nbsp;   &nbsp;: {{ $order->nama_depan }} {{ $order->nama_belakang }}
          <br> Email &nbsp;   &nbsp;   &nbsp;   &nbsp;      : {{ $order->email_pelanggan }}
          <br> Telepon &nbsp;   &nbsp;   : {{ $order->no_telepon }}
        </div>

        <div class="col-3">
          <h5 class="prim-color" style="margin-bottom: -10px;"><strong>Detail</strong></h5>
          <br> Nomor Invoice: <br>{{ $order->kode }}
          <br> {{ \General::datetimeFormat($order->tanggal_pemesanan) }}
        </div>
        
        <div class="col-3" style="margin-top: 13px; margin-left: -50px">
          <br> Lokasi &nbsp;   &nbsp;&nbsp; : {{ $order->lokasi }}
          <br> Provinsi &nbsp;&nbsp; : {{ substr($order->provinsi, 2) }}
          <br> Tanggal Penyewaan: {{ date('d M Y', strtotime($order->tanggal)) }}
        </div>

      </div>

      <div class="row">
        <div class="col-8">
          <div class="card p-1">
            <div class="card-body">
              <table class="table">
                <thead>
                  <tr>
                    <th colspan="2">Peralatan</th>
                    <th width="20%">Harga</th>
                    <th width="20%">Jumlah</th>
                    <th width="20%">Total</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse ($order->orderItems as $item)
                    <tr>
                      <td colspan="2">{{ $item->nama_peralatan }}</td>
                      <td>Rp. {{ number_format($item->harga_peralatan) }}</td>
                      <td>{{ $item->jumlah }}</td>
                      <td>Rp. {{ number_format($item->subtotal) }}</td>
                    </tr>
                  @empty
                    <tr>
                      <td colspan="5" align="center">Item tidak ditemukan</td>
                    </tr>
                  @endforelse
                </tbody>
                <tfoot>
                  <td colspan="4"><p class="my-3 prim-color"><strong>Total Penyewaan</strong></p></td>
                  <td><p class="my-3 prim-color">Rp. {{ number_format($order->subtotal) }}</p></td>
                </tfoot>
              </table>
            </div>
          </div>
        </div>

        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Ringkasan Total</h5>
              <table class="table my-4">
                <tr>
                  <td>Total Penyewaan</td>
                  <td>Rp. {{ number_format($order->subtotal) }}</td>
                </tr>
                <tr>
                  <td>Lama Sewa</td>
                  <td>{{ $order->hari }} Hari</td>
                </tr>
                <tfoot>
                  <tr>
                    <td>Total Harga Sewa</td>
                    <td>Rp. {{ number_format($order->total) }}</td>
                  </tr>
                </tfoot>
              </table>
              @if (!$order->isPaid())
                <a href="{{ $order->url_pembayaran }}" class="btn btn-success mb-1 w-100 btn-custom btn-theme">Bayar Sekarang</a>
              @endif
            </div>
          </div>
        </div>

      </div>

    </div>

  </section>
  <!-- End Konfirmasi Section -->
@endsection