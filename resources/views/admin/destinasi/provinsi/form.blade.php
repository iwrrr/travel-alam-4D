@extends('admin.layout')

@section('content')
    
  @php
      $formTitle = !empty($province) ? 'Ubah' : 'Tambah';
      $formButton = !empty($province) ? 'Ubah' : 'Tambah';
  @endphp

  <div class="content">
    <div class="row">
      <div class="col-lg-6">
        <div class="card card-default">
          <div class="card-header card-header-border-bottom">
            <h2>{{ $formTitle }} Provinsi</h2>
          </div>
          <div class="card-body">
            @include('admin.partials.flash', ['$errors' => $errors])
            @if (!empty($province))
              {!! Form::model($province, ['url' => ['admin/destinasi/provinsi', $province->id], 'method' => 'PUT']) !!}
              {!! Form::hidden('id') !!}
            @else
              {!! Form::open(['url' => 'admin/destinasi/provinsi']) !!}
            @endif

            <div class="form-group mb-3">
              {!! Form::label('nama_provinsi', 'Nama Provinsi', ['class' => 'mb-2']) !!}
              {!! Form::text('nama_provinsi', null, ['class' => 'form-control form-control-lg', 'placeholder' => 'Masukkan nama provinsi']) !!}
            </div>
            
            <div class="form-footer pt-5">
              <button type="submit" class="btn btn-primary btn-default float-right">{{ $formButton }}</button>
              <a href="{{ url('admin/destinasi/provinsi') }}" class="btn btn-secondary">Kembali</a>
            </div>

            {!! Form::close() !!}
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection