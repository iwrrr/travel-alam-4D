@extends('travel-alam.layout')

@section('title')
  Travel Alam - Checkout
@endsection

@section('content')
  <!-- Checkout Section -->
  <section id="checkout" class="checkout">

    <div class="container">

      <div class="row mb-2">
        <div class="col-md">
          <header class="checkout-header">
            <h3><img src="{{ asset('travel-alam/assets/img/Icon material-shopping-cart-1.png') }}" height="25" alt=""> Checkout </h3>
            <div class="checkout-line"></div>
          </header>
        </div>
      </div>

      {!! Form::model($user, ['url' => 'pesanan/checkout']) !!}

      <div class="row">

        <div class="col-8 mt-4">
          <div class="card p-1">
            <div class="card-body">
              <h5 class="prim-color mb-4 fw-bold">Barang yang disewa</h5>
              <table class="table">
                <thead>
                  <tr>
                    <th width="20%">Gambar</th>
                    <th width="25%">Peralatan</th>
                    <th width="20%">Harga</th>
                    <th width="20%">Jumlah</th>
                    <th width="20%">Total</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse ($items as $item)
                    @php
                      $tool = $item->associatedModel;
                    @endphp
                    <tr>
                      <td><img src="{{ asset('storage/' . $tool->toolImages->first()->path) }}" alt="{{ $tool->nama_peralatan }}" class="custom-img" width="55"></td>
                      <td><p style="margin-top: 12px">{{ $tool->nama_peralatan }}</p></td>
                      <td><p class="prim-color" style="margin-top: 12px">Rp {{ number_format($item->price) }}</p></td>
                      <td><p style="margin-top: 12px">{{ $item->quantity }}</p></td>
                      <td><p style="margin-top: 12px">Rp {{ number_format($item->price * $item->quantity)}}</p></td>
                    </tr>
                  @empty
                    <tr>
                      <td colspan="5">Tidak ada item</td>
                    </tr>
                  @endforelse
                </tbody>
                <tfoot>
                  <td colspan="4" align="right"><p class="my-3 prim-color"><strong>Total Penyewaan: </strong></p></td>
                  <td><p class="my-3 prim-color">Rp. {{ number_format(\Cart::getSubTotal()) }}</p></td>
                </tfoot>
              </table>
            </div>
          </div>
        </div>

        <div class="col-4 mt-4">
          <div class="card p-1">
            <div class="card-body">
              {!! Form::hidden('nama_depan', Auth::user()->nama_depan) !!}
              {!! Form::hidden('nama_belakang', Auth::user()->nama_belakang) !!}
              {!! Form::hidden('email_pelanggan', Auth::user()->email) !!}
              {!! Form::hidden('no_telepon', Auth::user()->no_telepon) !!}
              <h5>Lokasi Pengambilan</h5>
              <div class="row my-4">
                <div class="col-6">
                  <h6>Provinsi<span style="color: red">*</span></h6>
                  <select name="provinsi" class="form-select" id="province" data-minimum-results-for-search="Infinity">
                    <option disabled selected>Pilih Provinsi</option>
                    @foreach ($provinces as $province)
                      <option value="{{ $province->id }} {{ $province->nama_provinsi }}">{{ $province->nama_provinsi }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="col-6">
                  <h6>Lokasi Gunung<span style="color: red">*</span></h6>
                  <select name="lokasi" class="form-select" id="location" data-minimum-results-for-search="Infinity">
                    <option selected>Pilih Provinsi</option>
                  </select>
                </div>
              </div>

              <div class="row my-4">
                <div class="col-6">
                  <h6>Tanggal Pengambilan<span style="color: red">*</span></h6>
                  <input type="date" name="tanggal" class="form-control dropdown-toggle w-100" id="date">
                </div>
                <div class="col-6">
                  <h6>Lama Sewa (Hari)<span style="color: red">*</span></h6>
                  <input type="number" name="hari" class="form-control" style="width: 40%" min="1" max="7">
                </div>
              </div>
              
              <button type="submit" class="btn btn-success btn-theme btn-custom mt-1" style="width: 100%;">Checkout</button>
            </div>
          </div>
        </div>

      </div>

      {!! Form::close() !!}

    </div>

  </section>
  
  <script type=text/javascript>
    $(function () {
      $('select').select2();

      $('#location').select2({
        placeholder: "Pilih Lokasi",
      });

      $('#province').select2().on('change', function () {
        var id_provinsi = $(this).val();
        console.log(id_provinsi);

        $.ajax({
          type: "get",
          url: "{{ url('fetch') }}",
          data: {id: id_provinsi},
          success: function (data) {
            $('#location').empty();

            $.each(data, function (key, value) {
              $("#location").append('<option value="' + value.nama_lokasi + '">' + value.nama_lokasi + '</option>');
            });
            
            $('#location').select2();
          }
        });
      });
      
      $('#location').on('change', function () {
        var id = $(this).val();

        console.log(id);
      });
    });
  </script>
  <!-- End Destinasi Section -->
@endsection