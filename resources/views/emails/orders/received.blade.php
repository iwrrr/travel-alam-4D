@component('mail::message')
# Terima kasih atas pesanannya!

Pesanan Anda ditangguhkan hingga kami mengonfirmasi pembayaran telah diterima. Detail pesanan Anda ditunjukkan di bawah ini untuk referensi Anda:

## Invoice {{ $order->kode }} ({{ \General::datetimeFormat($order->tanggal_pemesanan)}} )

@component('mail::table')
| Peralatan       | Jumlah      | Harga  |
| :------------- |:-------------:| --------:|
@foreach ($order->orderItems as $item)
| {{ $item->nama_peralatan }}      |  {{ $item->jumlah }}      | Rp {{ number_format($item->subtotal) }}      |
@endforeach
| &nbsp;         |<strong>Sub Total</strong> |  Rp {{ number_format($order->subtotal) }} |
| &nbsp;         |<strong>Lama Sewa</strong> |  {{ $order->hari }} Hari |
| &nbsp;         |<strong>Total Harga Sewa</strong> |  <strong>Rp {{ number_format($order->total) }}</strong>|
@endcomponent

## Detail Pembayaran:
<strong>{{ $order->nama_depan }} {{ $order->nama_belakang }}</strong>
<br> Email   : {{ $order->email_pelanggan }}
<br> Telepon : {{ $order->no_telepon }}

@component('mail::button', ['url' => url('penyewaan/diterima/'. $order->id)])
Ke Detail Pesanan
@endcomponent

Terima kasih,<br>
Travel Alam
@endcomponent
