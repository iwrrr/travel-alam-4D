<nav id="sidebar" class="sidebar">
  <div class="sidebar-content js-simplebar">
    <a class="sidebar-brand" href="/">
      <span class="align-middle">Travel Alam</span>
    </a>

    <ul class="sidebar-nav">
      <li class="sidebar-header">
        
      </li>

      <li class="sidebar-item {{ ($currentAdminMenu == 'dashboard') ? 'active' : ''}}">
        <a class="sidebar-link" href="{{ url('admin/dashboard') }}">
          <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
        </a>
      </li>

      <li class="sidebar-header">
        Manajemen
      </li>

      <li class="sidebar-item {{ ($currentAdminMenu == 'destinasi') ? 'expand active' : ''}}">
        <a data-target="#destinasi" data-toggle="collapse" class="sidebar-link collapsed">
          <i class="align-middle" data-feather="map"></i> <span class="align-middle">Destinasi</span>
        </a>
        <ul id="destinasi" class="sidebar-dropdown list-unstyled collapse" data-parent="#sidebar">
          <li class="sidebar-item {{ ($currentAdminSubMenu == 'provinsi') ? 'active' : ''}}"><a class="sidebar-link" href="{{ url('admin/destinasi/provinsi') }}">Provinsi</a></li>
          <li class="sidebar-item {{ ($currentAdminSubMenu == 'lokasi') ? 'active' : ''}}"><a class="sidebar-link" href="{{ url('admin/destinasi/lokasi') }}">Lokasi</a></li>
        </ul>
      </li>

      <li class="sidebar-item {{ ($currentAdminMenu == 'peralatan') ? 'expand active' : ''}}">
        <a data-target="#peralatan" data-toggle="collapse" class="sidebar-link collapsed">
          <i class="align-middle" data-feather="briefcase"></i> <span class="align-middle">Peralatan</span>
        </a>
        <ul id="peralatan" class="sidebar-dropdown list-unstyled collapse" data-parent="#sidebar">
          <li class="sidebar-item {{ ($currentAdminSubMenu == 'alat') ? 'active' : ''}}"><a class="sidebar-link" href="{{ url('admin/peralatan/alat') }}">Alat</a></li>
        </ul>
      </li>

      <li class="sidebar-item {{ ($currentAdminMenu == 'transaksi') ? 'expand active' : ''}}">
        <a data-target="#transaksi" data-toggle="collapse" class="sidebar-link collapsed">
          <i class="align-middle" data-feather="credit-card"></i> <span class="align-middle">Transaksi</span>
        </a>
        <ul id="transaksi" class="sidebar-dropdown list-unstyled collapse" data-parent="#sidebar">
          <li class="sidebar-item {{ ($currentAdminSubMenu == 'pesanan') ? 'active' : ''}}"><a class="sidebar-link" href="{{ url('admin/transaksi') }}">Pesanan</a></li>
        </ul>
      </li>
    </ul>
    
  </div>
</nav>