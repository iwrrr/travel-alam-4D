@extends('admin.layout')

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
            <h2>{{ $formTitle }} Lokasi</h2>
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
              {!! Form::label('alat', 'Nama Lokasi Wisata', ['class' => 'mb-2']) !!}
              {!! Form::text('alat', null, ['class' => 'form-control form-control-lg', 'placeholder' => 'Masukkan nama alat']) !!}
            </div>

            <div class="form-group mb-3">
              {!! Form::label('kategori_id', 'Kategori', ['class' => 'mb-2']) !!}
              {!! Form::select('kategori_id', $categories, null, ['class' => 'form-control', 'placeholder' => '- Pilih Kategori -']) !!}
            </div>

            <div class="form-group mb-3">
              {!! Form::label('harga', 'Harga', ['class' => 'mb-2']) !!}
              {!! Form::number('harga', null, ['class' => 'form-control form-control-lg']) !!}
            </div>

            <div class="form-group mb-3">
              {!! Form::label('stok', 'Stok') !!}
            {!! Form::text('stok', null, ['class' => 'form-control', 'placeholder' => 'Stok']) !!}
            </div>
            
            <div class="form-footer pt-5">
              <button type="submit" class="btn btn-primary btn-default float-right">{{ $formButton }}</button>
              <a href="{{ url('admin/peralatan/alat') }}" class="btn btn-secondary">Kembali</a>
            </div>

            {!! Form::close() !!}
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection