<div class="col-3">
  <div class="card menu">
    <div class="card-header">
      <div class="row">
        <div class="col-1">
          <i class="fa fa-user-circle fa-3x"></i>
        </div>
        <div class="col" style="margin-left: 40px;">
          <span class="nama">{{ Auth::user()->nama_depan }} {{ Auth::user()->nama_belakang }}</span> <br>
          <span class="email">{{ Auth::user()->email }}</span>
        </div>
      </div>
    </div>
    <div class="card-body">
      <div class="row">
        <div class="col">
          <a href="{{ url('profil') }}">Edit Profil</a>
        </div>
      </div>
      <div class="row mt-2 mb-5">
        <div class="col">
          <a href="{{ url('transaksi') }}">Daftar Transaksi</a>
        </div>
      </div>
      <div class="row mt-5">
        <div class="col">
          <a href="{{ route('logout') }}"><i class="fa fa-door-open"></i> Logout</a>
        </div>
      </div>
    </div>
  </div>
</div>