@extends('admin.layout')

@section('title')
    Dashboard - Lokasi
@endsection

@section('content')
<div class="container-fluid p-2">
  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-header">
          <h5 class="card-title" style="font-size: 30px !important; font-weight: bold;">Manajemen Lokasi Wisata</h5>
        </div>
        <div class="card-body">
          @include('admin.partials.flash')
          <table class="table">
            <thead>
              <tr>
                <th style="width:10%;">#</th>
                <th style="width:20%;">Lokasi</th>
                <th style="width:20%">Slug</th>
                <th style="width:20%">Provinsi</th>
                <th style="width:20%">Kabupaten</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($locations as $location)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $location->nama_lokasi }}</td>
                  <td>{{ $location->slug }}</td>
                  <td>{{ $location->province->nama_provinsi }}</td>
                  <td>{{ $location->kabupaten }}</td>
                  <td>
                    <a href="{{ url('admin/destinasi/lokasi/' . $location->id . '/edit') }}"> <i class="align-middle" data-feather="edit-2"></i></a>
                    <a href="{{ route('admin.lokasi.delete',  $location->id) }}" onclick="return confirm('Apakah anda yakin?')"><i class="align-middle" data-feather="trash" style="color: red"></i></a>
                  </td>
                </tr>
              @empty
                <tr>
                  <td colspan="5" style="text-align: center">Tidak ada data</td>
                </tr>
              @endforelse
            </tbody>
          </table>
        </div>
        <div class="card-footer text-right">
          <a href="{{ url('admin/destinasi/lokasi/create') }}" class="btn btn-primary">Tambah</a>
          {{ $locations->links() }}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection