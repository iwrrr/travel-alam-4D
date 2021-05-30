@extends('travel-alam.layout')

@section('title')
  Travel Alam
@endsection

@section('content')
  <!-- ======= Hero Section ======= -->
  <section id="hero" class="hero">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center">
          <img src="{{ asset('travel-alam/assets/img/Travel Alam Logo.png') }}" alt="" data-aos="zoom-out" data-aos-delay="200" width="80%">
        </div>
        <div class="col-lg-6" data-aos="zoom-out" data-aos-delay="200">
          <div class="row">
            <div class="col-md-8">
              <h1 class="text-start text-uppercase">Jelajahi indonesia yuk!</h1>
            </div>
          </div>
          <div class="row">
            <div class="col-md-10">
              <h6 class="text-start">Indonesia memiliki banyak keindahan alam.
                Banyak sekali potensi wisata alam kita yang membuat kita bangga dengan Indonesia. Tersebar lebih dari
                17.504 pulau,
                berapa banyak Destinasi Alam yang sudah kamu datangi?</h6>
            </div>
          </div>
        </div>
      </div>
    </div>
      
  </section>
  <!-- End Hero -->
  
  <!-- ======= Main Section ======= -->
  <main id="main">
      
    <!-- ======= Destinasi Wisata Section ======= -->
    <section id="destinasi-wisata" class="destinasi-wisata">

      <div class="container" data-aos="fade-up">

        <div class="row mb-5">
          <div class="col-md">
            <header class="section-header">
              <p>Destinasi Wisata</p>
            </header>
          </div>
        </div>

        <div class="row gy-5 justify-content-center">

          <div class="col-md-3 d-flex justify-content-center">
            <a href="">
              <div class="card destinasi">
                <img src="{{ asset('travel-alam/assets/img/pantai@2x.png') }}" class="icon" width="100">
                <img src="{{ asset('travel-alam/assets/img/pantai.jpg') }}" class="card-img">
              </div>
            </a>
          </div>

          <div class="col-md-3 d-flex justify-content-center">
            <a href="">
              <div class="card destinasi">
                <img src="{{ asset('travel-alam/assets/img/gunung@2x.png') }}" class="icon" width="100">
                <img src="{{ asset('travel-alam/assets/img/bromo.png') }}" class="card-img">
              </div>
            </a>
          </div>

        </div>

      </div>

    </section>
    <!-- End Destinasi Wisata Section -->

    <!-- ======= Tentang Kami Section ======= -->
    <section id="tentang-kami" class="tentang-kami my-5">

      <div class="container" data-aos="fade-up">

        <div class="row mb-3">
          <div class="col-md">
            <header class="section-header">
              <p>Tentang Kami</p>
            </header>
          </div>
        </div>

        <div class="row">

          <div class="col md">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ratione itaque id minima ut, fugit at nemo eligendi aperiam consectetur obcaecati consequuntur nisi enim ullam, omnis ipsam quidem vero. Sapiente excepturi beatae sit temporibus! Itaque odit, exercitationem voluptatem possimus non porro ad distinctio, ab mollitia sunt tenetur earum, magnam ea incidunt.</p>
          </div>

        </div>

      </div>

    </section>
    <!-- End Destinasi Wisata Section -->

    
    <a class="cart-btn d-flex align-items-center justify-content-center" style="cursor: pointer;"><i
        class="fa fa-shopping-cart" data-bs-toggle="modal" data-bs-target="{{ Auth::check() ? '#destinasiModal' : '#loginModal' }}"></i></a>

    <!-- Modal -->
    <div class="modal fade" id="destinasiModal" data-bs-keyboard="false" tabindex="-1" aria-labelledby="destinasiModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" style="border-radius: 20px;">
          <div class="modal-header border-bottom-0">
            <button type="button" class="btn-close my-1" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body modal-cart">
            <h5 class="modal-title mb-4 text-center" id="staticBackdropLabel" style="margin-top: -30px;">Pilih Destinasi</h5>
            <div class="row">
              
              <div class="col-md-3">
                <a href="{{ route('peralatan-surfing') }}">
                  <div class="card modal-destinasi">
                    <img src="{{ asset('travel-alam/assets/img/pantai.jpg') }}" class="card-img">
                  </div>
                </a>
              </div>

              <div class="col-md-3 offset-3">
                <a href="{{ route('peralatan-hiking') }}">
                  <div class="card modal-destinasi">
                    <img src="{{ asset('travel-alam/assets/img/bromo.png') }}" class="card-img">
                  </div>
                </a>
              </div>
              
            </div>
          </div>
        </div>
      </div>
    </div>

  </main>
  <!-- End #main -->
  
@endsection