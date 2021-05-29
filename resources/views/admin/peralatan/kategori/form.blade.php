@extends('admin.layout')

@section('content')
    
  @php
      $formTitle = !empty($category) ? 'Ubah' : 'Tambah';
      $formButton = !empty($category) ? 'Ubah' : 'Tambah';
  @endphp

  <div class="content">
    <div class="row">
      <div class="col-lg-6">
        <div class="card card-default">
          <div class="card-header card-header-border-bottom">
            <h2>{{ $formTitle }} Kategori</h2>
          </div>
          <div class="card-body">
            @include('admin.partials.flash', ['$errors' => $errors])
            @if (!empty($category))
              {!! Form::model($category, ['url' => ['admin/peralatan/kategori', $category->id], 'method' => 'PUT']) !!}
              {!! Form::hidden('id') !!}
            @else
              {!! Form::open(['url' => 'admin/peralatan/kategori']) !!}
            @endif

            <div class="form-group mb-3">
              {!! Form::label('kategori', 'Kategori Alat', ['class' => 'mb-2']) !!}
              {!! Form::text('kategori', null, ['class' => 'form-control form-control-lg', 'placeholder' => 'Masukkan nama kategori']) !!}
            </div>
            
            <div class="form-footer pt-5">
              <button type="submit" class="btn btn-primary btn-default float-right">{{ $formButton }}</button>
              <a href="{{ url('admin/peralatan/kategori') }}" class="btn btn-secondary">Kembali</a>
            </div>

            {!! Form::close() !!}
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection