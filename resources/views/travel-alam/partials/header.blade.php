  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="/" class="logo d-flex align-items-center">
        <img src="{{ asset('travel-alam/assets/img/Travel Alam@2x.png') }}" class="mx-2" alt="">
      </a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link" href="{{ url('destinasi') }}"><img src="{{ asset('travel-alam/assets/img/Icon awesome-hiking@2x.png') }}" class="mx-2"><span class="wisata">Destinasi Wisata</span></a></li>
          @if (Route::has('login'))
            @auth
              <li class="dropdown"><a class="nav-link" href="#"><i class="fa fa-user-circle mx-2" style="font-size: 1.5rem"></i><span>{{ Auth::user()->nama_depan }} {{ Auth::user()->nama_belakang }}</span><i class="bi bi-chevron-down"></i></a>
                <ul>
                  @role('admin')
                  <li><a href="{{ url('profil') }}" class="nav-link">Profil</a></li>
                  <li><a href="{{ route('dashboard') }}" class="nav-link">Dashboard</a></li>
                  <li><a href="{{ route('logout') }}" class="nav-link">Log out</a></li>
                  @else
                    <li><a href="{{ url('profil') }}" class="nav-link">Profil</a></li>
                    <li><a href="{{ route('logout') }}" class="nav-link">Log out</a></li>
                  @endrole
                </ul>
              </li>
            @else
              <li><a class="nav-link login" data-bs-toggle="modal" data-bs-target="#loginModal" style="cursor: pointer;">Login</a></li>
              @if (Route::has('register'))
                <li><a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#signupModal"><p>Sign up</p></a></li>
              @endif
            @endauth
          @endif
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>
      <!-- End Navbar -->

      @include('travel-alam.partials.modal')

  </header>
  <!-- End Header -->