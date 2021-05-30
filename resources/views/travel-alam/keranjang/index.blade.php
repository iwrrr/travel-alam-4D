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

      <div class="row mt-4">
        <div class="col-9">
          <div class="card">
            <div class="card-body">
              <table class="table">
                <thead>
                  <th>Gambar</th>
                  <th>Peralatan</th>
                  <th>Harga</th>
                  <th width="23%">Jumlah</th>
                  <th width="20%">Total</th>
                  <th><a href="#"><i class="fa fa-sync-alt" style="color: gray;"></i></a></th>
                </thead>
                <tbody>
                  @forelse ($items as $item)
                    @php
											$tool = $item->associatedModel;
										@endphp
                    <tr>
                      <td><img src="{{ asset('storage/' . $tool->toolImages->first()->path) }}" alt="{{ $tool->alat }}" class="custom-img" width="55"></td>
                      <td><p style="margin-top: 12px">{{ $tool->alat }}</p></td>
                      <td><p class="prim-color" style="margin-top: 12px">Rp {{ number_format($item->price) }}</p></td>
                      <td>
                        <div class="form-group col-sm-4 my-2">
                          <input type="number" name="{{ 'items[' . $item->id . '][quantity]' }}" class="form-control" placeholder="1" min="1" value="{{ $item->quantity }}" required>
                        </div>
                      </td>
                      <td><p style="margin-top: 12px">Rp {{ number_format($item->price * $item->quantity)}}</p></td>
                      <td><a href="{{ url('keranjang/' . $item->id . '/delete') }}" onclick="return confirm('Ingin menghapus item dari keranjang?')"><i class="fa fa-trash mt-4" style="color: gray;"></i></a></td>
                    </tr>  
                  @empty
                    <tr>
                      <td colspan="6" style="text-align: center">Keranjang kosong</td>
                    </tr>
                  @endforelse
                </tbody>
                <tfoot>
                </tfoot>
              </table>
            </div>
          </div>
          <a href="{{ url('peralatan-hiking') }}" class="btn btn-secondary btn-custom mt-3">Kembali Ke Peralatan</a>
        </div>
        
        <div class="col-3">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-4">Ringkasan Harga Sewa</h5>
              <table class="table">
                <tbody>
                  <tr>
                    <td width="64%">Subtotal</td>
                    <td>Rp {{ number_format(\Cart::getSubTotal()) }}</td>
                  </tr>
                  <tr>
                    <td width="64%">Total</td>
                    <td>Rp {{ number_format(\Cart::getTotal()) }}</td>
                  </tr>
                </tbody>
              </table>
              <a href="#" class="btn btn-success my-2 w-100 btn-custom btn-theme">Checkout</a>
            </div>
          </div>
        </div>
      </div>
    </div>

  </section>
  <!-- End Destinasi Section -->
@endsection