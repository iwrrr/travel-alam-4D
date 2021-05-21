@extends('travel-alam.layout')

@section('title')
  Peralatan Surfing
@endsection

@section('content')
  <!-- Peralatan Surfing Section -->
  <section id="peralatan" class="peralatan surfing">
    <div class="container">
      <div class="row mb-5">
          <div class="col-md">
            <header class="section-header">
              <p>Peralatan Surfing dan Snorkeling</p>
            </header>
          </div>
      </div>

      <div class="row g-2">
        <div class="col-md-6">
          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-md-2">
                  <img src="assets/img/papan.jpg" alt="" class="float-left" width="65">
                </div>
                <div class="col-md">
                  <span class="mx-2 prim-color"><strong>Papan Selancar</strong></span>
                  <p style="margin-left: 8px;">Rp</p>
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
  <!-- End Peralatan Surfing Section -->
@endsection