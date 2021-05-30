  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="/" class="logo d-flex align-items-center">
        <img src="{{ asset('travel-alam/assets/img/Travel Alam@2x.png') }}" class="mx-2" alt="">
      </a>

      <nav id="navbar" class="navbar">
        <ul>
          <li class="dropdown"><a class="nav-link" href="#"><img src="{{ asset('travel-alam/assets/img/Icon awesome-hiking@2x.png') }}" class="mx-2"><span class="wisata">Destinasi Wisata</span><i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="pegunungan.html">Pegunungan</a></li>
              <li><a href="pantai.html">Pantai</a></li>
            </ul>
          </li>
          {{-- <li><a class="nav-link" href="peralatan-travel.html"><img src="{{ asset('travel-alam/assets/img/Icon awesome-toolbox@2x.png') }}" class="mx-2"><span class="tools">Peralatan Travel</span></a></li> --}}
          @if (Route::has('login'))
            @auth
              <li class="dropdown"><a class="nav-link" href="#"><i class="fa fa-user-circle mx-2" style="font-size: 1.5rem"></i><span>{{ Auth::user()->name }}</span><i class="bi bi-chevron-down"></i></a>
                <ul>
                  @role('admin')
                    <li><a href="{{ route('logout') }}" class="nav-link login">Log out</a></li>
                    <li><a href="{{ route('dashboard') }}" class="nav-link login">Dashboard</a></li>
                  @else
                    <li><a href="{{ route('logout') }}" class="nav-link login">Log out</a></li>
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

      <!-- Login Modal -->
      <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content" style="border-radius: 20px;">
            <div class="modal-header border-bottom-0">
              <button type="button" class="btn-close mt-2 float-end" data-bs-dismiss="modal" aria-label="Close" style="margin-right: 0;"></button>
            </div>
            <div class="modal-body p-4">
              <h5 class="modal-title text-center mb-4" id="loginModalLabel" style="margin-top: -50px;">Login</h5>
              <x-auth-validation-errors class="mb-4" :errors="$errors" />
              <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="mb-3">
                  <div class="row">
                    <div class="col-md-1 mt-1" style="font-size: 20px; color: grey;">
                      <i class="fas fa-envelope"></i>
                    </div>
                    <div class="col-md" style="margin-left: -10px;">
                      <input type="email" class="form-control" name="email" placeholder="Alamat Email">
                    </div>
                  </div>
                </div>
                <div class="mb-3">
                  <div class="row">
                    <div class="col-md-1 mt-1" style="font-size: 20px; color: grey;">
                      <i class="fas fa-lock"></i>
                    </div>
                    <div class="col-md" style="margin-left: -10px;">
                      <input type="password" class="form-control" name="password" placeholder="Password">
                    </div>
                  </div>
                </div>
                <button type="submit" class="btn btn-secondary btn-theme mt-3 w-100" style="border-radius: 3rem;">Login</button>
              </form>
            </div>
            <div class="modal-footer d-flex justify-content-center border-top-0" style="margin-top: -25px;">
              <p>Belum punya akun? <a href="#" data-bs-toggle="modal" data-bs-target="#signupModal" data-bs-dismiss="modal">Sign Up</a></p>
            </div>
          </div>
        </div>
      </div>

      <!-- Sign Up Modal -->
      <div class="modal fade" id="signupModal" tabindex="-1" aria-labelledby="signupModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content" style="border-radius: 20px;">
            <div class="modal-header border-bottom-0">
              <button type="button" class="btn-close mt-2 float-end" data-bs-dismiss="modal" aria-label="Close" style="margin-right: 0;"></button>
            </div>
            <div class="modal-body p-4">
              <h5 class="modal-title text-center mb-4" id="signupModalLabel" style="margin-top: -50px;">Sign Up</h5>
              <x-auth-validation-errors class="mb-4" :errors="$errors" />
              <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="mb-3">
                  <label for="name" class="form-label">Nama Pengguna</label>
                  <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="mb-3">
                  <label for="email" class="form-label">Email</label>
                  <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-3">
                  <label for="tel" class="form-label">No. Telepon</label>
                  <input type="text" class="form-control" id="tel" name="tel" required>
                </div>
                <div class="mb-3">
                  <label for="password" class="form-label">Kata Sandi</label>
                  <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <div class="mb-3">
                  <label for="password_confirmation" class="form-label">Konfirmasi Kata Sandi</label>
                  <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                </div>
                <button type="submit" class="btn btn-secondary bayar mt-3 w-100" style="border-radius: 3rem;">Sign Up</button>
              </form>
            </div>
          </div>
        </div>
      </div>

  </header>
  <!-- End Header -->