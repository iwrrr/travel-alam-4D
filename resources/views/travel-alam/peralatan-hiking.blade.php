@extends('travel-alam.layout')

@section('title')
  Peralatan Hiking
@endsection

@section('content')
      <!-- Peralatan Hiking Section -->
  <section id="peralatan" class="peralatan">
    <div class="container">
      <div class="row mb-5">
        <div class="col-md">
          <header class="section-header">
            <p>Peralatan Hiking dan Camping</p>
          </header>
        </div>
      </div>

      <div class="row g-2">
        <div class="col-md-6">
          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-md-2">
                  <img src="assets/img/tenda.png" alt="" class="float-left" width="75">
                </div>
                <div class="col-md">
                  <span class="mx-2 prim-color"><strong>Tenda Kapasitas 2 - 3 Orang</strong></span>
                  <p style="margin-left: 8px;">Rp </p>
                </div>
                <div class="col-md-2 mt-1">
                  <a href="#" class="btn float-end m-2"><img src="assets/img/Icon feather-plus-circle.png" height="30"></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <a href="#" class="btn btn-secondary mt-3">Kembali</a>
      <a href="#" class="btn btn-secondary mt-3 bayar float-end">Lanjut</a>
    </div>
  </section>
  <!-- End Peralatan Hiking Section -->
@endsection