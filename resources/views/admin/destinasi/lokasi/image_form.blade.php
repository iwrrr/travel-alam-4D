@extends('admin.layout')

@section('title')
  Dashboard - Gambar Lokasi
@endsection

@section('content')

<div class="content">
  <div class="row">

    <div class="col-lg-6">
      <div class="card pt-2">
        <div class="card-header">
          <h2>Upload Gambar</h2>
        </div>
        <div class="card-body">
          @include('admin.partials.flash', ['$errors' => $errors])
          {!! Form::open(['url' => ['admin/destinasi/lokasi/gambar', $location->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
          <div class="form-group">
            {!! Form::label('image', 'Gambar Lokasi') !!}<br>
            {!! Form::file('image', ['class' => 'form-control-file mt-2']) !!}
          </div>
          <div class="form-footer mt-5">
            <button type="submit" class="btn btn-primary btn-default float-right">Simpan</button>
            <a href="{{ url('admin/destinasi/lokasi/' . $locationID . '/gambar') }}" class="btn btn-secondary btn-default">Kembali</a>
          </div>
          {!! Form::close() !!}
        </div>
      </div>  
    </div>
    
    <div class="col-lg-2">
        @include('admin.destinasi.lokasi.menu')
    </div>

  </div>
</div>
@endsection