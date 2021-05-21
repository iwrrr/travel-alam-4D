@extends('travel-alam.layout')

@section('title')
  Travel Alam - Konfirmasi
@endsection

@section('content')
    <!-- Konfirmasi Section -->
  <section id="konfirmasi" class="konfirmasi">

    <div class="container">

      <div class="row mb-4">
        <div class="col-md">
          <header class="keranjang-header">
            <h3><img src="assets/img/Icon material-shopping-cart-1.png" height="25" alt=""> Konfirmasi Pembayaran </h3>
            <div class="konfirmasi-line"></div>
          </header>
        </div>
      </div>

      <div class="row">

        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Ringkasan Total</h5>
              <table class="table my-4">
                <tr>
                  <td>Total Harga</td>
                  <td>Rp. 157.000,-</td>
                </tr>
                <tr>
                  <td>Lama Sewa</td>
                  <td>2 Hari</td>
                </tr>
                <tfoot>
                  <tr>
                    <td>Total Harga Sewa</td>
                    <td>Rp. 314.000,-</td>
                  </tr>
                  <tr>
                    <td>Metode Pembayaran</td>
                    <td>BCA</td>
                  </tr>
                </tfoot>
              </table>
              <a href="#" class="btn btn-success my-4 w-100 bayar">Bayar Sekarang</a>
            </div>
          </div>
        </div>

      </div>

    </div>

  </section>
  <!-- End Konfirmasi Section -->
@endsection