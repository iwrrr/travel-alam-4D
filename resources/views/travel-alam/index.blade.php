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
          <img src="{{ asset('travel-alam/assets/img/Travel Alam Logo new.png') }}" alt="" data-aos="zoom-out" data-aos-delay="200" width="80%">
        </div>
        <div class="col-lg-6" data-aos="zoom-out" data-aos-delay="200">
          <div class="row">
            <div class="col-md-8">
              <h1 class="text-start text-uppercase fw-normal">Jelajahi <strong>indonesia</strong> yuk!</h1>
            </div>
          </div>
          <div class="row">
            <div class="col-md-10">
              <h6 class="text-start fw-light">Indonesia memiliki banyak keindahan alam.
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

          <div class="col-md text-center">
            <p>Travel Alam adalah website penyewaan perlengkapan hiking dengan harga yang sangat murah. Barang yang kami miliki mempunyai kualitas terbaik dan terawat dikarenakan kami mempunyai standarisasi untuk penyewaan, itu semua demi kenyamanan dan keamanan traveller.

            Barang yang Kami sewakan adalah barang-barang yang sudah terpilih dalam pengujian kualitas layak pemakaian dan layak keamanannya dan juga sudah di uji oleh rekan rekan mitra kami.</p>
          </div>

        </div>

      </div>

    </section>
    <!-- End Destinasi Wisata Section -->
    
    <a href="{{ route('peralatan') }}" class="cart-btn d-flex align-items-center justify-content-center" style="cursor: pointer;"><i
        class="fa fa-shopping-cart"></i></a>
        
  </main>
  <!-- End #main -->
@endsection