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
            <label for="name" class="form-label">Nama Depan</label>
            <input type="text" class="form-control" name="nama_depan" required>
          </div>
          <div class="mb-3">
            <label for="name" class="form-label">Nama Belakang</label>
            <input type="text" class="form-control" name="nama_belakang" required>
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
          </div>
          <div class="mb-3">
            <label for="tel" class="form-label">No. Telepon</label>
            <input type="text" class="form-control" id="tel" name="no_telepon" required>
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Kata Sandi</label>
            <input type="password" class="form-control" id="password" name="password" required>
          </div>
          <div class="mb-3">
            <label for="password_confirmation" class="form-label">Konfirmasi Kata Sandi</label>
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
          </div>
          <div class="mb-3">
            <input class="form-check-input" type="checkbox" value="" id="sk">
            <label class="form-check-label" for="flexCheckDefault">
              <span>Saya setuju dengan <a href="#" data-bs-toggle="modal" data-bs-target="#skModal" data-bs-dismiss="modal">Syarat dan Ketentuan Travel Alam</a></span>
            </label>
          </div>
          <button type="submit" id="signup" class="btn btn-secondary btn-theme mt-3 w-100" style="border-radius: 3rem;" disabled>Sign Up</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- SK Modal -->
<div class="modal fade" id="skModal" tabindex="-1" aria-labelledby="skModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content" style="border-radius: 20px;">
      <div class="modal-header border-bottom-0">
        <button type="button" class="btn-close mt-2 float-end" data-bs-dismiss="modal" aria-label="Close" style="margin-right: 0;"></button>
      </div>
      <div class="modal-body p-5">
        <h3 class="modal-title text-center mb-4" id="skModalLabel" style="margin-top: -50px;">Syarat dan Ketentuan</h3>
        <ul>
          <li>Penyewa wajib menggunakan identitas asli, masih berlaku dan sesuai yang datang menyewa, kami tidak menerima jika identitas orang lain yang bukan/tidak menyewa.</li>
          <li>Identitas asli dapat berupa E-KTP/SIM/Surat pengurusan E-KTP/ Kartu Keluarga, untuk Pelajar SMA/SMP berupa Kartu Pelajar yang masih berlaku dan E-KTP Orang tua asli.</li>
          <li>Penyewa hanya diperbolehkan menyewa maksimal 7 Hari.</li>
          <li>Penyewa wajib memeriksa kembali kelengkapan dan kondisi barang yang akan di ambil di tempat Pengambilan, tidak ada komplain jika sudah meninggalkan tempat pengambilan barang.</li>
          <li>Seluruh penyewa berani bertanggung jawab dan mengganti rugi atas kerusakan barang/peralatan sewa.</li>
          <li>Travel Alam tidak bertanggung jawab atas identitas jaminan sewa bagi penyewa yang tidak mengganti kerusakan/kehilangan barang.</li>
          <li>Dilarang menyewakan kembali perlengkapan kepada orang lain.</li>
          <li>Penyewa wajib menaati semua Syarat dan Ketentuan Travel alam dan menjaga barang yang disewa dengan sebaik-baiknya.</li>
          <li>Semua tindakan pencurian / pemalsuan identitas akan diproses sesuai hukum yang berlaku.</li>
          <li>Waktu sewa dimulai dari pengambilan barang di tempat mitra kami.</li>
          <li>Pengambilan Barang dapat diambil di mitra sekitaran lokasi yang dipilih saat checkout barang, biasanya pada destinasi pegunungan mitra kami berada pada setiap pintu masuk jalur pendakian.</li>
          <li>Pengembalian Barang Sewa diberikan waktu telat dengan toleransi 12 Jam, dikembalikan di mitra tempat awal pengambilan barang, jika pengembalian barang melebihi batas waktu yang diberikan akan dikenakan denda tambahan 10% harga sewa barang/hari.</li>
          <li>Pengguna hanya dapat memesan barang 1x, dan dapat memesan barang kembali Setelah transaksi atau pengembalian barang dari Pemesanan sebelumnya</li>
        </ul>
        <strong>DILARANG MENYALAKAN API / KOMPOR DAN MEROKOK DI DALAM TENDA.</strong>
      </div>
    </div>
  </div>
</div>