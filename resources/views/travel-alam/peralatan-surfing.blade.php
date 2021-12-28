@extends('travel-alam.layout')

@section('title')
  Travel Alam - Peralatan Surfing
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

      @foreach ($tools->chunk(20) as $chunk)
        <div class="row g-2">
          @forelse ($chunk as $tool)
            @if ($tool->category->kategori == 'Surfing dan Snorkeling')
              <div class="col-md-6">
                {!! Form::open(['url' => 'keranjang-surfing']) !!}
                {!! Form::hidden('tool_id', $tool->id) !!}
                <div class="card custom-card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-2">
                        <img src="{{ asset('storage/' . $tool->toolImages->first()->path) }}" alt="{{ $tool->alat }}" class="float-left custom-img" width="75">
                      </div>
                      <div class="col-md mt-2">
                        <span class="mx-2 prim-color"><strong>{{ $tool->alat }}</strong></span>
                        <p class="mt-1" style="margin-left: 8px">Rp {{ number_format($tool->harga) }}</p>
                      </div>
                      <div class="col-md-2" style="margin-top: 18px">
                        <input type="number" name="qty" class="form-control" placeholder="1" min="1" value="1">
                      </div>
                      <div class="col-md-2 mt-2">
                        <button type="submit" class="btn float-end m-2"><img src="{{ asset('travel-alam/assets/img/Icon feather-plus-circle.png') }}" height="30"></button>
                      </div>
                    </div>
                  </div>
                </div>
                {!! Form::close() !!}
              </div>
            @endif
          @empty
            Tidak ada peralatan
          @endforelse
        </div>
      @endforeach
      
      <a href="/" class="btn btn-secondary mt-3 btn-custom">Kembali</a>
      <a href="{{ url('keranjang-surfing') }}" class="btn btn-secondary mt-3 btn-custom btn-theme float-end">Keranjang</a>
    </div>
  </section>
  <!-- End Peralatan Surfing Section -->
@endsection