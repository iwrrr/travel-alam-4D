@extends('admin.layout')

@section('title')
  Dashboard - Provinsi
@endsection

@section('content')
<div class="container-fluid p-2">
  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-header">
          <h5 class="card-title" style="font-size: 30px !important; font-weight: bold;">Manajemen Provinsi</h5>
        </div>
        <div class="card-body">
          @include('admin.partials.flash')
          <table class="table">
            <thead>
              <tr>
                <th style="width:15%;">#</th>
                <th style="width:35%;">Provinsi</th>
                <th style="width:30%">Slug</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($provinces as $province)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $province->nama_provinsi }}</td>
                  <td>{{ $province->slug }}</td>
                  <td>
                    <a href="{{ url('admin/destinasi/provinsi/' . $province->id . '/edit') }}"> <i class="align-middle" data-feather="edit-2"></i></a>
                    <a href="{{ route('admin.provinsi.delete',  $province->id) }}" onclick="return confirm('Apakah anda yakin?')"><i class="align-middle" data-feather="trash" style="color: red"></i></a>
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
          <a href="{{ url('admin/destinasi/provinsi/create') }}" class="btn btn-primary">Tambah</a>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection