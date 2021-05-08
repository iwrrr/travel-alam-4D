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
        <table class="table">
          <thead>
            <tr>
              <th>#</th>
              <th style="width:35%;">Nama</th>
              {{-- <th style="width:15%">Slug</th> --}}
              <th style="width:25%">Kategori</th>
              <th style="width:20%">Harga</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            {{-- @forelse ($tools as $tool)
              <tr>
                <td>{{ $tool->id }}</td>
                <td>{{ $tool->name }}</td>
                <td>{{ $tool->slug }}</td>
                <td>
                  <a href="{{ url('admin/tools/' . $tool->id . '/edit') }}"> <i class="align-middle" ></i> Edit</a>
                    
                  <form method="post" action="admin/tools/ . {{ $tool->id }}">
                    <button type="submit"><i class="align-middle" data-feather="trash"></i></button>
                  </form>
                </td>
              </tr>
            @empty
              <tr>
                <td colspan="5">Tidak ada data</td>
              </tr>
            @endforelse --}}
            <tr>
              <td colspan="6" style="text-align: center">Tidak ada data</td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="card-footer text-right">
        <a href="{{ url('admin/peralatan/kategori/create') }}" class="btn btn-primary">Tambah</a>
      </div>
    </div>
  </div>
</div>
@endsection