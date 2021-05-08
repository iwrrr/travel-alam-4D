@extends('admin.layout')

@section('content')
    
  @php
      $formTitle = !empty($location) ? 'Update' : 'Tambah'
  @endphp

  <div class="content">
    <div class="row">
      <div class="col-lg-6">
        <div class="card card-default">
          <div class="card-header card-header-border-bottom">
            <h2>{{ $formTitle }} Lokasi</h2>
          </div>
          <div class="card-body">
            @include('admin.partials.flash', ['$errors' => $errors])
            @if (!empty($location))
              {!! Form::model($location, ['url' => ['admin/destinasi/lokasi', $location->id], 'method' => 'PUT']) !!}
              {!! Form::hidden('id') !!}
            @else
              {!! Form::open(['url' => 'admin/destinasi/lokasi']) !!}
            @endif

            <div class="form-group mb-3">
              {!! Form::label('name', 'Nama Lokasi Wisata', ['class' => 'mb-2']) !!}
              {!! Form::text('name', null, ['class' => 'form-control form-control-lg', 'placeholder' => 'Masukkan nama lokasi wisata']) !!}
            </div>

            {{-- <div class="form-group">
              {!! Form::label('provinsi', 'Provinsi', ['class' => 'mb-2']) !!}
              {!! Form::select('provinsi_id', $provinces, null, ['class' => 'form-control']) !!}
            </div> --}}
            <div class="form-group mb-3">
              <label for="wisata" class="mb-2">Wisata</label>
              <select name="tour_id" class="form-control">
                <option value="">- Pilih Wisata -</option>
                @foreach ($tours as $tour => $value)
                  <option value="{{ $tour }}">{{ $value }}</option>
                @endforeach
              </select>
            </div>

            <div class="form-group mb-3">
              <label for="provinsi" class="mb-2">Provinsi</label>
              <select name="province_id" class="form-control">
                <option value="">- Pilih Provinsi -</option>
                @foreach ($provinces as $province => $value)
                  <option value="{{ $province }}">{{ $value }}</option>
                @endforeach
              </select>
            </div>
            
            <div class="form-footer pt-5">
              <button type="submit" class="btn btn-primary btn-default float-right">Tambah</button>
              <a href="{{ url('admin/destinasi/lokasi') }}" class="btn btn-secondary">Kembali</a>
            </div>

            {!! Form::close() !!}
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection