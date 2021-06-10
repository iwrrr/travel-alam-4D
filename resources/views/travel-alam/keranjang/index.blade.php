@extends('travel-alam.layout')

@section('title')
  Travel Alam - Keranjang
@endsection

@section('content')
  <!-- Keranjang Section -->
  <section id="keranjang" class="keranjang">

    <div class="container">

      <div class="row mb-2">
        <div class="col-md">
          <header class="keranjang-header">
            <h3><img src="{{ asset('travel-alam/assets/img/Icon material-shopping-cart-1.png') }}" height="25" alt=""> Keranjang </h3>
            <div class="keranjang-line"></div>
          </header>
        </div>
      </div>
      <a href="{{ url('peralatan') }}" class="btn btn-outline-light text-dark btn-custom mt-3"><i class="fa fa-arrow-left" style="margin-right: 3px"></i> Kembali ke peralatan</a>
      <div class="row mt-4">
        <div class="col-9">
          @include('travel-alam.partials.flash')
          <div class="card p-1">
            <div class="card-body">
              {!! Form::open(['url' => 'keranjang/update']) !!}
              @csrf
              <table class="table">
                <thead>
                  <th width="20%">Gambar</th>
                  <th width="25%">Peralatan</th>
                  <th width="20%">Harga</th>
                  <th width="20%">Jumlah</th>
                  <th width="20%">Total</th>
                  <th><button type="submit" class="btn btn-sm float-end"><i class="fa fa-sync-alt" style="color: gray;"></i></a></th>
                </thead>
                <tbody>
                  @forelse ($items as $item)
                    @php
											$tool = $item->associatedModel;
										@endphp
                    <tr>
                      <td><img src="{{ asset('storage/' . $tool->toolImages->first()->path) }}" alt="{{ $tool->nama_peralatan }}" class="custom-img" width="55"></td>
                      <td><p style="margin-top: 12px">{{ $tool->nama_peralatan }}</p></td>
                      <td><p class="prim-color" style="margin-top: 12px">Rp. {{ number_format($item->price) }}</p></td>
                      <td>
                        <div class="form-group col-sm-5 my-2">
                          <input type="number" name="{{ 'items[' . $item->id . '][jumlah]' }}" class="form-control" placeholder="1" min="1" value="{{ $item->quantity }}" required>
                        </div>
                      </td>
                      <td><p style="margin-top: 12px">Rp. {{ number_format($item->price * $item->quantity)}}</p></td>
                      <td><a href="{{ url('keranjang/' . $item->id . '/delete') }}" class="delete"><i class="fa fa-trash" style="color: gray; margin-top: 17px"></i></a></td>
                    </tr>  
                  @empty
                    <tr>
                      <td colspan="6" style="text-align: center">Keranjang kosong</td>
                    </tr>
                  @endforelse
                </tbody>
              </table>
              {!! Form::close() !!}
            </div>
          </div>
        </div>
        
        <div class="col-3">
          <div class="card p-1">
            <div class="card-body">
              <h5 class="card-title mb-4">Ringkasan Harga Sewa</h5>
              <table class="table">
                <tbody>
                  <tr>
                    <td width="54%">Subtotal</td>
                    <td>Rp. {{ number_format(\Cart::session($userId)->getSubTotal()) }}</td>
                  </tr>
                  <tr>
                    <td width="54%">Total</td>
                    <td>Rp. {{ number_format(\Cart::session($userId)->getTotal()) }}</td>
                  </tr>
                </tbody>
              </table>
              <a href="{{ url('pesanan/checkout') }}" class="btn btn-success my-2 w-100 btn-custom btn-theme {{ \Cart::session($userId)->isEmpty() ? 'disabled' : '' }}">Checkout</a>
            </div>
          </div>
        </div>
      </div>
    </div>

  </section>
  <!-- End Destinasi Section -->
@endsection