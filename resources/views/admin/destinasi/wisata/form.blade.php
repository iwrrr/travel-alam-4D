@extends('admin.layout')

@section('content')
    
  @php
      $formTitle = !empty($tour) ? 'Ubah' : 'Tambah';
      $formButton = !empty($tour) ? 'Ubah' : 'Tambah';
  @endphp

  <div class="content">
    <div class="row">
      <div class="col-lg-6">
        <div class="card card-default">
          <div class="card-header card-header-border-bottom">
            <h2>{{ $formTitle }} Wisata</h2>
          </div>
          <div class="card-body">
            @include('admin.partials.flash', ['$errors' => $errors])
            @if (!empty($tour))
              {!! Form::model($tour, ['url' => ['admin/destinasi/wisata', $tour->id], 'method' => 'PUT']) !!}
              {!! Form::hidden('id') !!}
            @else
              {!! Form::open(['url' => 'admin/destinasi/wisata']) !!}
            @endif

            <div class="form-group mb-3">
              {!! Form::label('name', 'Nama Wisata', ['class' => 'mb-2']) !!}
              {!! Form::text('name', null, ['class' => 'form-control form-control-lg', 'placeholder' => 'Masukkan nama wisata']) !!}
            </div>
            
            <div class="form-footer pt-5">
              <button type="submit" class="btn btn-primary btn-default float-right">{{ $formButton }}</button>
              <a href="{{ url('admin/destinasi/wisata') }}" class="btn btn-secondary">Kembali</a>
            </div>

            {!! Form::close() !!}
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection