@extends('travel-alam.layout')

@section('title')
  Travel Alam - Keranjang
@endsection

@section('content')
    <!-- Checkout Section -->
  <section id="checkout" class="checkout">

    <div class="container">

      <div class="row mb-2">
        <div class="col-md">
          <header class="keranjang-header">
            <h3><img src="assets/img/Icon material-shopping-cart-1.png" height="25" alt=""> Checkout </h3>
            <div class="keranjang-line"></div>
          </header>
        </div>
      </div>

      <div class="row">

        <div class="col my-4">
          <div class="card p-2">
            <div class="card-body">
              <h5 class="prim-color"><strong>Nama Penyewa</strong></h5><br>
              <span>Username Pengguna <br>
              +62 812 3456 7890
              </span>
            </div>
          </div>
        </div>

      </div>

      <div class="row">

        <div class="col">
          <div class="table-responsive">
            <div class="card">
              <div class="card-body">
                <table class="table my-4">
                  <thead>
                    <tr>
                      <th colspan="2">Pesanan</th>
                      <th>Harga Satuan </th>
                      <th>Qty</th>
                      <th>Subtotal</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td colspan="2"><img src="assets/img/Sleepingbag.jpg" alt="sleepingbagsm" height="60" width="60"> Sleeping Bag Uk. S dan M</td>
                      <td><p class="my-3 prim-color">Rp. 12.000,-</p></td>
                      <td><p class="my-3 prim-color">1</p></td>
                      <td><p class="my-3 prim-color">Rp. 12.000,-</p></td></td>
                    </tr>
                    <tr>
                      <td colspan="2"><img src="assets/img/tenda.png" alt="tenda" height="60" width="60"> Tenda Kapasitas 2-3 Orang</td>
                      <td><p class="my-3 prim-color">Rp. 35.000,-</p></td>
                      <td><p class="my-3 prim-color">1</p></td>
                      <td><p class="my-3 prim-color">Rp. 35.000,-</p></td></td>
                    </tr>
                    <tr>
                      <td colspan="2"><img src="assets/img/tenda.png" alt="tenda" height="60" width="60"> Tenda Kapasitas 4-5 Orang</td>
                      <td><p class="my-3 prim-color">Rp. 45.000,-</p></td>
                      <td><p class="my-3 prim-color">1</p></td>
                      <td><p class="my-3 prim-color">Rp. 45.000,-</p></td></td>
                    </tr>
                    <tr>
                      <td colspan="2"><img src="assets/img/komporr.jpg" alt="kompor" height="60" width="60"> Kompor Portable + Gas</td>
                      <td><p class="my-3 prim-color">Rp. 30.000,-</p></td>
                      <td><p class="my-3 prim-color">1</p></td>
                      <td><p class="my-3 prim-color">Rp. 30.000,-</p></td></td>
                    </tr>
                    <tr>
                      <td colspan="2"><img src="assets/img/tas.jpg" alt="kompor" height="60" width="60"> Tas Carrier 60L</td>
                      <td><p class="my-3 prim-color">Rp. 35.000,-</p></td>
                      <td><p class="my-3 prim-color">1</p></td>
                      <td><p class="my-3 prim-color">Rp. 35.000,-</p></td></td>
                    </tr>
                  </tbody>
                  <tfoot>
                      <td colspan="4"><p class="my-3 prim-color"><strong>Total Penyewaan</strong></p></td>
                      <td><p class="my-3 prim-color">Rp. 157.000,-</p></td></td>
                  </tfoot>
                </table>
              </div>
            </div>
          </div>
        </div>

      </div>

      <div class="row">
        <div class="col-8 mt-4">
          <div class="card p-2">
            <div class="card-body">
              <h5>Lokasi Pengambilan</h5>
  
              <div class="row my-4">
                <div class="col-4">
                  <h6>Provinsi</h6>
                  <select class="form-select">
                    <option selected>Pilih Provinsi</option>
                    <option value="1">Jawa Barat</option>
                    <option value="2">Jawa Timur</option>
                    <option value="3">Jawa Tengah</option>
                    <option value="3">DIY Yogyakarta</option>
                    <option value="3">Banten</option>
                  </select>
                </div>
                <div class="col-4">
                  <h6>Lokasi Gunung</h6>
                  <select class="form-select">
                    <option selected>Pilih Lokasi Gunung</option>
                    <option value="1">Gunung</option>
                    <option value="2">Gunung</option>
                    <option value="3">Gunung</option>
                  </select>
                </div>
              </div>

              <div class="row my-4">
                <div class="col-4">
                  <h6>Tanggal Pengambilan</h6>
                  <input type="date" class="form-control border border-success dropdown-toggle w-100">
                </div>
                <div class="col-4">
                  <h6>Durasi Peminjaman (Hari)</h6>
                  <input type="number" class="form-control border border-success dropdown-toggle w-50" min="1" max="7">
                </div>
              </div>

            </div>
          </div>
        </div>

        <div class="col-4 mt-4">
          <div class="card">
            <div class="card-body">
              <h6>Metode Pembayaran</h6>
              <select class="form-select">
                <option selected>Pilih Metode Pembayaran</option>
                <option value="1">Bank</option>
                <option value="2">Bank</option>
              </select>
            </div>
          </div>
          <a href="#" class="btn btn-success float-end mt-3 bayar" style="width: 415px;">Konfirmasi</a>
        </div>
      </div>

    </div>

  </section>
  <!-- End Checkout Section -->
@endsection