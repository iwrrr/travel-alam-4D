@extends('travel-alam.layout')

@section('title')
  Travel Alam - Peralatan Hiking
@endsection

@section('content')
  <!-- Peralatan Hiking Section -->
  <section id="peralatan" class="peralatan hiking">
    <div class="container">
      <div class="row mb-4">
        <div class="col-md">
          <header class="section-header">
            <p>Peralatan Hiking dan Camping</p>
          </header>
        </div>
      </div>

      <a href="/" class="btn btn-outline-light text-dark mb-3 btn-custom"><i class="fa fa-arrow-left" style="margin-right: 3px"></i> Kembali</a>

      @foreach ($tools->chunk(20) as $chunk)
        <div class="row g-2">
          @forelse ($chunk as $tool)
            <div class="col-md-6">
              {!! Form::open(['url' => 'keranjang']) !!}
              {!! Form::hidden('id_peralatan', $tool->id) !!}
              <div class="card p-1 custom-card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-2">
                      <img src="{{ asset('storage/' . $tool->toolImages->first()->path) }}" alt="{{ $tool->nama_peralatan }}" class="float-left custom-img" width="75">
                    </div>
                    <div class="col-md mt-2">
                      <span class="prim-color"><strong>{{ $tool->nama_peralatan }}</strong></span>
                      <p class="mt-1">Rp {{ number_format($tool->harga_peralatan) }}</p>
                    </div>
                    <div class="col-md-2" style="margin-top: 18px">
                      <input type="number" name="jumlah" class="form-control" placeholder="1" min="1" value="1" style="margin-left: 30px">
                    </div>
                    <div class="col-md-2 mt-2">
                      <button type="submit" class="btn float-end mt-2"><img src="{{ asset('travel-alam/assets/img/Icon feather-plus-circle.png') }}" height="30"></button>
                    </div>
                  </div>
                </div>
              </div>
              {!! Form::close() !!}
            </div>
          @empty
            Tidak ada peralatan
          @endforelse
        </div>
      @endforeach
      
      {{-- <a href="/" class="btn btn-secondary mt-3 btn-custom">Kembali</a> --}}
      {{-- <a href="{{ url('keranjang') }}" class="btn btn-secondary mt-3 btn-custom btn-theme float-end">Keranjang</a> --}}
    </div>
  </section>

  <a href="{{ url('keranjang') }}" class="cart-btn d-flex align-items-center justify-content-center" style="cursor: pointer;"><i
        class="fa fa-shopping-cart"></i></a>
  <!-- End Peralatan Hiking Section -->
@endsection