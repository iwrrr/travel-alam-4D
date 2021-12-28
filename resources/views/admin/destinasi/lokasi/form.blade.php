@extends('admin.layout')

@section('title')
  Dashboard - Lokasi
@endsection

@section('content')
    
  @php
      $formTitle = !empty($location) ? 'Ubah' : 'Tambah';
      $formButton = !empty($location) ? 'Ubah' : 'Tambah';
  @endphp

  <div class="content">
    <div class="row">
      <div class="col-lg-6">
        <div class="card pt-2">
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
              {!! Form::label('nama_lokasi', 'Nama Lokasi Wisata', ['class' => 'mb-2']) !!}
              {!! Form::text('nama_lokasi', null, ['class' => 'form-control form-control-lg', 'placeholder' => 'Masukkan nama lokasi wisata']) !!}
            </div>

            <div class="form-group mb-3">
              {!! Form::label('id_provinsi', 'Provinsi', ['class' => 'mb-2']) !!}
              {!! Form::select('id_provinsi', $provinces, null, ['class' => 'form-control', 'placeholder' => '- Pilih Provinsi -']) !!}
            </div>

            <div class="form-group mb-3">
              {!! Form::label('kabupaten', 'Kabupaten', ['class' => 'mb-2']) !!}
              {!! Form::text('kabupaten', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group mb-3">
              {!! Form::label('map', 'Lokasi Google Maps', ['class' => 'mb-2']) !!}
              {!! Form::text('map', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group mb-3">
              {!! Form::label('deskripsi', 'Deskripsi', ['class' => 'mb-2']) !!}
              {!! Form::textarea('deskripsi', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group mb-3">
              {!! Form::label('jalur_pendakian', 'Jalur Pendakian', ['class' => 'mb-2']) !!}
              {!! Form::textarea('jalur_pendakian', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group mb-3">
              {!! Form::label('rute_termudah', 'Rute Termudah', ['class' => 'mb-2']) !!}
              {!! Form::textarea('rute_termudah', null, ['class' => 'form-control', 'rows' => '2']) !!}
            </div>

            <div class="form-group mb-3">
              {!! Form::label('rute_normal', 'Rute Normal', ['class' => 'mb-2']) !!}
              {!! Form::textarea('rute_normal', null, ['class' => 'form-control', 'rows' => '2']) !!}
            </div>
            
            <div class="form-footer mt-5">
              <button type="submit" class="btn btn-primary btn-default float-right">{{ $formButton }}</button>
              <a href="{{ url('admin/destinasi/lokasi') }}" class="btn btn-secondary">Kembali</a>
            </div>

            {!! Form::close() !!}
          </div>
        </div>
      </div>

      <div class="col-lg-2">
        
        @if (!empty($location))  
          @include('admin.destinasi.lokasi.menu')
        @endif

      </div>
      
    </div>
    
  </div>

@endsection