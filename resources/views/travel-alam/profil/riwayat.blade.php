@extends('travel-alam.layout')

@section('title')
  Travel Alam - Daftar Transaksi
@endsection

@section('content')
    <!-- Profil Section -->
  <section id="profil" class="profil riwayat mt-5">
    <div class="container">
      
      <div class="row mt-5">
        @include('travel-alam.partials.user-menu')
        <div class="col">
          <h4>Daftar Transaksi</h4>
          <div class="card outer mt-3">
            <div class="card-body">
              {!! Form::open(['url'=> Request::path(),'method'=>'GET','class' => 'input-daterange form-inline']) !!}
              <div class="row mb-3"> 
                <div class="col-md-4">
                  <div class="input-group flex-nowrap">
                    <input type="text" class="form-control" name="q" value="{{ !empty(request()->input('q')) ? request()->input('q') : '' }}" placeholder="Cari transaksimu di sini">
                    <span class="input-group-text" id="addon-wrapping"><i class="fa fa-search"></i></span>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="input-group">
                    <input type="text" class="form-control datepicker" readonly value="{{ !empty(request()->input('start')) ? request()->input('start') : '' }}" name="start">
                    <span class="input-group-text" id="addon-wrapping">-</span>
                    <input type="text" class="form-control datepicker" readonly value="{{ !empty(request()->input('end')) ? request()->input('end') : '' }}" name="end">
                  </div>
                </div>
                <div class="col-md-2">
                  {{ Form::select('status', $statuses, !empty(request()->input('status')) ? request()->input('status') : null, ['placeholder' => 'Semua Status', 'class' => 'form-control']) }}
                </div>
                <div class="col-md-1">
                  <button type="submit" class="btn btn-primary float-right btn-show">Tampilkan</button>
                </div>
              </div>
              {!! Form::close() !!}
              @forelse ($orders as $order)
                <div class="row mt-3">
                  <div class="col">
                    <div class="card inner">
                      <div class="card-body">
                        <div class="row">
                          <div class="col">
                            <p class="tanggal">{{ $order->tanggal_pemesanan }}</p>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col">
                            <p class="kode fw-bold">{{ $order->kode }}</p>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col">
                            <a class="detail float-end fw-bold btn-detail" data-id="{{ $order->id }}">Lihat Detail Transaksi</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              @empty
                <div class="row mt-5">
                  <div class="col text-center">
                    <p>Tidak ada riwayat transaksi</p>
                  </div>
                </div>
              @endforelse
            </div>
            {{ $orders->links('vendor.pagination.custom') }}
          </div>
        </div>
      </div>

      <!-- Modal -->
      @if (!empty($order))
      <div class="modal fade modal-detail" id="modal-detail" data-bs-keyboard="false" tabindex="-1" aria-hidden="true" style="z-index: 9999">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
          <div class="modal-content p-2">
            <div class="modal-header border-0">
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              @include('travel-alam.profil.modal-detail')
            </div>
          </div>
        </div>
      </div>
      @endif

    </div>
  </section>
  <!-- End Profil Section -->
  <script type=text/javascript>
  $(function () {
    $('.btn-detail').on('click', function () {
      // console.log($(this).data('id'));
      let id = $(this).data('id');

      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });

      $.ajax({
        type: "get",
        url: `/transaksi/${id}`,
        success: function (data) {
          // console.log(data);
          $('#modal-detail').find('.modal-body').html(data);
          $('#modal-detail').modal('show');
        },
        error: function (data) {
          console.log(data);
        }
      });
    });
  });
  </script>
@endsection