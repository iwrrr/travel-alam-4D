@extends('admin.layout')

@section('title')
    Dashboard - Alat
@endsection

@section('content')
<div class="container-fluid p-2">
  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-header">
          <h5 class="card-title" style="font-size: 30px !important; font-weight: bold;">Manajemen Peralatan</h5>
        </div>
        <div class="card-body">
          @include('admin.partials.flash', ['$errors' => $errors])
          <table class="table">
            <thead>
              <tr>
                <th style="width:10%">#</th>
                <th style="width:25%;">Nama</th>
                {{-- <th style="width:20%">Slug</th> --}}
                <th style="width:25%">Kategori</th>
                <th style="width:15%">Harga</th>
                <th style="width:15%">Stok</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($tools as $tool)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $tool->alat }}</td>
                  <td>{{ $tool->category->kategori }}</td>
                  <td>{{ $tool->harga }}</td>
                  <td>{{ $tool->stok }}</td>
                  <td>
                    <a href="{{ url('admin/peralatan/alat/' . $tool->id . '/edit') }}"> <i class="align-middle" data-feather="edit-2"></i></a>
                    <a href="{{ route('admin.alat.delete',  $tool->id) }}" onclick="return confirm('Apakah anda yakin?')"><i class="align-middle" data-feather="trash" style="color: red"></i></a>
                  </td>
                </tr>
              @empty
                <tr>
                  <td colspan="6" style="text-align: center">Tidak ada data</td>
                </tr>
              @endforelse
            </tbody>
          </table>
        </div>
        <div class="card-footer text-right">
          <a href="{{ url('admin/peralatan/alat/create') }}" class="btn btn-primary">Tambah</a>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection