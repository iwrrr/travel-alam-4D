@extends('admin.layout')

@section('title')
  Dashboard - Alat
@endsection

@section('content')
    
  @php
      $formTitle = !empty($tool) ? 'Ubah' : 'Tambah';
      $formButton = !empty($tool) ? 'Ubah' : 'Tambah';
  @endphp

  <div class="content">
    <div class="row">

      <div class="col-lg-6">
        <div class="card card-default">
          <div class="card-header card-header-border-bottom">
            <h2>{{ $formTitle }} Alat</h2>
          </div>
          <div class="card-body">
            @include('admin.partials.flash', ['$errors' => $errors])
            @if (!empty($tool))
              {!! Form::model($tool, ['url' => ['admin/peralatan/alat', $tool->id], 'method' => 'PUT']) !!}
              {!! Form::hidden('id') !!}
            @else
              {!! Form::open(['url' => 'admin/peralatan/alat']) !!}
            @endif

            <div class="form-group mb-3">
              {!! Form::label('nama_peralatan', 'Nama Peralatan', ['class' => 'mb-2']) !!}
              {!! Form::text('nama_peralatan', null, ['class' => 'form-control form-control-lg', 'placeholder' => 'Masukkan nama alat']) !!}
            </div>

            <div class="form-group mb-3">
              {!! Form::label('harga_peralatan', 'Harga', ['class' => 'mb-2']) !!}
              {!! Form::number('harga_peralatan', null, ['class' => 'form-control form-control-lg']) !!}
            </div>
            
            <div class="form-footer pt-5">
              <button type="submit" class="btn btn-primary btn-default float-right">{{ $formButton }}</button>
              <a href="{{ url('admin/peralatan/alat') }}" class="btn btn-secondary">Kembali</a>
            </div>

            {!! Form::close() !!}
          </div>
        </div>
      </div>

      <div class="col-lg-2">
        
        @if (!empty($tool))
          @include('admin.peralatan.alat.menu')
        @endif

      </div>

    </div>
  </div>

@endsection