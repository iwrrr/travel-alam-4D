@extends('admin.layout')

@section('content')
    
  @php
      $formTitle = !empty($location) ? 'Ubah' : 'Tambah';
      $formButton = !empty($location) ? 'Ubah' : 'Tambah';
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
              {!! Form::label('lokasi', 'Nama Lokasi Wisata', ['class' => 'mb-2']) !!}
              {!! Form::text('lokasi', null, ['class' => 'form-control form-control-lg', 'placeholder' => 'Masukkan nama lokasi wisata']) !!}
            </div>

            <div class="form-group mb-3">
              {!! Form::label('wisata_id', 'Wisata', ['class' => 'mb-2']) !!}
              {!! Form::select('wisata_id', $tours, null, ['class' => 'form-control', 'placeholder' => '- Pilih Wisata -']) !!}
            </div>

            <div class="form-group mb-3">
              {!! Form::label('provinsi_id', 'Provinsi', ['class' => 'mb-2']) !!}
              {!! Form::select('provinsi_id', $provinces, null, ['class' => 'form-control', 'placeholder' => '- Pilih Provinsi -']) !!}
            </div>

            <div class="form-group mb-3">
              {!! Form::label('deskripsi', 'Deskripsi', ['class' => 'mb-2']) !!}
              {!! Form::textarea('deskripsi', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group mb-3">
              {!! Form::label('jenis', 'Tipe Lokasi', ['class' => 'mb-2']) !!}
              {!! Form::select('jenis', $types, null, ['class' => 'form-control', 'placeholder' => '- Pilih Tipe -']) !!}
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
            
            <div class="form-footer pt-5">
              <button type="submit" class="btn btn-primary btn-default float-right">{{ $formButton }}</button>
              <a href="{{ url('admin/destinasi/lokasi') }}" class="btn btn-secondary">Kembali</a>
            </div>

            {!! Form::close() !!}
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection