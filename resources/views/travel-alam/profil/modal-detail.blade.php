<h4 class="text-center fw-bold" style="margin-top: -15px;">Detail Pesanan</h4>
<div class="row mt-4">
  <div class="col">
    <span>Nomor Invoice</span><br>
    <span class="kode">{{ $order->kode }}</span><br>
    <br>
    <span>Status</span><br>
    <span class="status">{{ $order->status }}</span><br>
    <br>
    <span>Tanggal Pemesanan</span><br>
    <span class="tanggal">{{ date('d M Y H:i T', strtotime($order->tanggal_pemesanan)) }}</span><br>
  </div>
  <div class="col">
    <span>Provinsi</span><br>
    <span class="kode">{{ substr($order->provinsi, 2) }}</span><br>
    <br>
    <span>Lokasi</span><br>
    <span class="status">{{ $order->lokasi }}</span><br>
    <br>
    <span>Tanggal Penyewaan</span><br>
    <span class="tanggal">{{ date('d M Y', strtotime($order->tanggal)) }}</span><br>
  </div>
</div>
<hr>
<div class="row">
  <div class="col">
    <table class="table table-borderless">
      <thead style="color: #666; font-size: 15px;">
        <th width="35%">Daftar Alat</th>
        <th width="25%">Harga Peralatan</th>
        <th>Jumlah</th>
        <th>Total</th>
      </thead>
      <tbody>
        @foreach ($order->orderItems as $item)
          <tr>
            <td>{{ $item->nama_peralatan }}</td>
            <td>Rp. {{ number_format($item->harga_peralatan) }}</td>
            <td>{{ $item->jumlah }}</td>
            <td>Rp. {{ number_format($item->subtotal) }}</td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
<hr>
<div class="row">
  <div class="col">
    <div class="row mb-2">
      <div class="col">
        <span style="font-weight: 600;">Pembayaran</span><br>
      </div>
    </div>
    <div class="row">
      <div class="col">
        <span>Subtotal</span><br>
        <span>Lama Peminjaman</span><br>
        <span>Total Bayar</span><br>
      </div>
      <div class="col-2">
        <span>Rp. {{ number_format($order->subtotal) }}</span><br>
        <span>{{ $order->hari }}</span><br>
        <span>Rp. {{ number_format($order->total) }}</span><br>
      </div>
    </div>
  </div>
</div>
@if (!empty($order->pesan_dibatalkan))
  <hr>
  <div class="row">
    <div class="col">
      <span style="font-weight: 600;">Pesan dibatalkan</span><br>
      <span>{{ $order->pesan_dibatalkan }}</span>
    </div>
  </div>
@endif