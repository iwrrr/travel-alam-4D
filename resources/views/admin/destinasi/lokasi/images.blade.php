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
            <h2>Gambar Lokasi</h2>
          </div>
          <div class="card-body">
            @include('admin.partials.flash', ['$errors' => $errors])
            <table class="table">
              <thead>
                <tr>
                  <th>Gambar</th>
                  <th>Diunggah pada</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($locationImages as $image)
                  <tr>
                    <td><img src="{{ asset('storage/' . $image->path) }}" style="width:100px"/></td>
                    <td>{{ $image->created_at }}</td>
                    <td>
                      {!! Form::open(['url' => 'admin/destinasi/lokasi/gambar/'. $image->id, 'class' => 'delete', 'style' => 'display:inline-block']) !!}
                      {!! Form::hidden('_method', 'DELETE') !!}
                      {!! Form::submit('Hapus', ['class' => 'btn btn-danger btn-sm']) !!}
                      {!! Form::close() !!}
                    </td>
                  </tr>
                @empty
                  <tr>
                    <td colspan="4" style="text-align: center">No records found</td>
                  </tr>
                @endforelse
              </tbody>
            </table>
            <a class="btn btn-primary float-right" href="{{ url('admin/destinasi/lokasi/' . $locationID . '/tambah-gambar') }}">Tambah</a>
          </div>
        </div>
      </div>
      <div class="col-lg-2">
        @include('admin.destinasi.lokasi.menu')
      </div>
    </div>
  </div>

@endsection