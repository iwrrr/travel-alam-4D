@extends('admin.layout')

@section('title')
  Dashboard - Wisata
@endsection

@section('content')
<div class="container-fluid p-2">
  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-header">
          <h5 class="card-title" style="font-size: 30px !important; font-weight: bold;">Manajemen Wisata</h5>
        </div>
        <div class="card-body">
          @include('admin.partials.flash')
          <table class="table">
            <thead>
              <tr>
                <th>#</th>
                <th style="width:40%;">Nama</th>
                <th style="width:25%">Slug</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($tours as $tour)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $tour->name }}</td>
                  <td>{{ $tour->slug }}</td>
                  <td class="table-action">
                    <a href="{{ url('admin/destinasi/wisata/' . $tour->id . '/edit') }}"> <i class="align-middle" data-feather="edit-2"></i></a>
                    <a href="{{ route('admin.wisata.delete',  $tour->id) }}" onclick="return confirm('Apakah anda yakin?')"><i class="align-middle" data-feather="trash" style="color: red"></i></a>
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
          <a href="{{ url('admin/destinasi/wisata/create') }}" class="btn btn-primary">Tambah</a>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection