@extends('travel-alam.layout')

@section('title')
  Travel Alam - {{ $location->nama_lokasi }}
@endsection

@section('content')
  <!-- Detail Destinasi Section -->
  <section id="detail-destinasi" class="detail-destinasi mt-5">

    <div class="container">

      <div class="row mt-4 mb-2">
        <div class="col-md">
          <header class="section-header float-start">
            <p>{{ $location->nama_lokasi }}</p>
          </header>
        </div>
      </div>

      <div class="row">
        <div class="col-lg-5 col-md-5 col-xl-5">
          <a href="{{ $location->map }}" target="_blank">
            <img src="{{ asset('storage/' . $location->locationImages->first()->path) }}" alt="{{ $location->nama_lokasi }}" width="400" class="rounded-3 shadow">
          </a>
        </div>
        <div class="col-lg-7 col-md-7 col-xl-7">
          <p>{{ $location->deskripsi }}</p>
        </div>
      </div>

      <div class="row mt-5">
        <div class="col">

          <div class="row">
            <div class="col">
              <h3 class="fw-bold prim-color">Jalur Pendakian</h3>
            </div>
          </div>

          <div class="row">
            <div class="col">
              <p>{{ $location->jalur_pendakian }}</p>
            </div>
          </div>
          
          <div class="row">
            <div class="col">
              <p style="font-size: 16px;"><strong class="prim-color">Rute Termudah: </strong>{{ $location->rute_termudah }}</p>
            </div>
          </div>

          <div class="row" style="margin-top: -12px;">
            <div class="col">
              <p style="font-size: 16px;"><strong class="prim-color">Rute Normal: </strong>{{ $location->rute_normal }}</p>
            </div>
          </div>

        </div>
      </div>

    </div>

  </section>
  <!-- End Detail Destinasi Section -->
@endsection