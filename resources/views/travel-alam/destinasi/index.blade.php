@extends('travel-alam.layout')

@section('title')
  Travel Alam - Destinasi
@endsection

@section('content')
  <!-- Destinasi Section -->
  <section id="destinasi" class="destinasi mt-5">

    <div class="container">

      <div class="row mb-2">
        <div class="col-md">
          <header class="section-header">
            <p>Destinasi Wisata</p>
          </header>
        </div>
      </div>

      <div class="row mt-5">
        <div class="col">
          <h3 class="prim-color fw-bold mb-3">Jawa Barat</h3>
          
          <div class="owl-carousel jabar owl-theme">

            @foreach ($locations as $location)
              @if ($location->province->nama_provinsi == 'Jawa Barat')
                <div class="item p-1">
                  <a href="{{ url('destinasi/detail/' . $location->slug) }}">
                    <div class="card">
                      <img src="{{ asset('storage/' . $location->locationImages->first()->path) }}" class="card-img-top" alt="{{ $location->nama_lokasi }}">
                      <div class="card-body custom-color">
                        <h5>{{ $location->nama_lokasi }}</h5>
                        <p style="margin-bottom: 0;">Kab. {{ $location->kabupaten }}</p>
                      </div>
                    </div>
                  </a>
                </div>
              @endif
            @endforeach

          </div>

          <div id="next-slide-jabar" class="controls-btns-jabar d-flex justify-content-center align-items-center">
            <i class="fa fa-chevron-right" style="margin-right: -3px;"></i>
          </div>
          <div id="prev-slide-jabar" class="controls-btns-jabar d-flex justify-content-center align-items-center">
            <i class="fa fa-chevron-left" style="margin-left: -3px;"></i>
          </div>
          
        </div>
      </div>

      <div class="row mt-5">
        <div class="col">
          <h3 class="prim-color fw-bold mb-3">Jawa Tengah</h3>
          
          <div class="owl-carousel jateng owl-theme">

            @foreach ($locations as $location)
              @if ($location->province->nama_provinsi == 'Jawa Tengah')
                <div class="item p-1">
                  <a href="{{ url('destinasi/detail/' . $location->slug) }}">
                    <div class="card">
                      <img src="{{ asset('storage/' . $location->locationImages->first()->path) }}" class="card-img-top" alt="{{ $location->nama_lokasi }}">
                      <div class="card-body custom-color">
                        <h5>{{ $location->nama_lokasi }}</h5>
                        <p style="margin-bottom: 0;">Kab. {{ $location->kabupaten }}</p>
                      </div>
                    </div>
                  </a>
                </div>
              @endif
            @endforeach

          </div>

          <div id="next-slide-jateng" class="controls-btns-jateng d-flex justify-content-center align-items-center">
            <i class="fa fa-chevron-right" style="margin-right: -3px;"></i>
          </div>
          <div id="prev-slide-jateng" class="controls-btns-jateng d-flex justify-content-center align-items-center">
            <i class="fa fa-chevron-left" style="margin-left: -3px;"></i>
          </div>
          
        </div>
      </div>

      <div class="row mt-5">
        <div class="col">
          <h3 class="prim-color fw-bold mb-3">Jawa Timur</h3>
          
          <div class="owl-carousel jatim owl-theme">

            @foreach ($locations as $location)
              @if ($location->province->nama_provinsi == 'Jawa Timur')
                <div class="item p-1">
                  <a href="{{ url('destinasi/detail/' . $location->slug) }}">
                    <div class="card">
                      <img src="{{ asset('storage/' . $location->locationImages->first()->path) }}" class="card-img-top" alt="{{ $location->nama_lokasi }}">
                      <div class="card-body custom-color">
                        <h5>{{ $location->nama_lokasi }}</h5>
                        <p style="margin-bottom: 0;">Kab. {{ $location->kabupaten }}</p>
                      </div>
                    </div>
                  </a>
                </div>
              @endif
            @endforeach

          </div>

          <div id="next-slide-jatim" class="controls-btns-jatim d-flex justify-content-center align-items-center">
            <i class="fa fa-chevron-right" style="margin-right: -3px;"></i>
          </div>
          <div id="prev-slide-jatim" class="controls-btns-jatim d-flex justify-content-center align-items-center">
            <i class="fa fa-chevron-left" style="margin-left: -3px;"></i>
          </div>
          
        </div>
      </div>

    </div>

  </section>
  <a href="{{ url('keranjang') }}" class="cart-btn d-flex align-items-center justify-content-center" style="cursor: pointer;"><i
        class="fa fa-shopping-cart"></i></a>
  <!-- End Destinasi Section -->
@endsection