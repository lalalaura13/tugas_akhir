
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Register</title>
  <link rel="shortcut icon" type="image/png" href="assets/images/logos/logomp.png" />
  <link rel="stylesheet" href="assets/css/styles.min.css" />
</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <div
      class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
      <div class="d-flex align-items-center justify-content-center w-100">
        <div class="row justify-content-center w-100">
          <div class="col-md-8 col-lg-6 col-xxl-3">
            <div class="card mb-0">
              <div class="card-body">
                <a href="./index.html" class="text-nowrap logo-img text-center d-block py-3 w-100">
                  <img src="assets/images/logos/logomp.png" width="100" alt="">
                </a>
                <p class="text-center">Piala Rektor MP Unsoed</p>
                <form action="{{ route('actionregister') }}" method="POST">
                    @csrf
                  <div class="mb-3">
                    <label for="exampleInputtext1" class="form-label">Nama Kontingen</label>
                    <input name="nama_kontingen" type="text" class="form-control" value="{{ old('nama_kontingen') }}" id="exampleInputtext1" aria-describedby="textHelp" required>
                  </div>
                  <div class="mb-3">
                    <label for="exampleInputtext1" class="form-label">Nama Pelatih 1</label>
                    <input name="nama_pelatih_1" type="text" class="form-control" value="{{ old('nama_pelatih_1') }}" id="exampleInputtext1" aria-describedby="textHelp" required>
                  </div>
                  <div class="mb-3">
                    <label for="exampleInputtext1" class="form-label">Nama Pelatih 2</label>
                    <input name="nama_pelatih_2" type="text" class="form-control" value="{{ old('nama_pelatih_2') }}" id="exampleInputtext1" aria-describedby="textHelp" required>
                  </div>
                  <div class="mb-3">
                    <label for="exampleInputtext1" class="form-label">Email</label>
                    <input name="email" type="email" class="form-control" value="{{ old('email') }}" id="exampleInputtext1" aria-describedby="textHelp" required>
                  </div>
                  <div class="mb-4">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <div class="input-group">
                      <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="exampleInputPassword1" required>
                      <span class="input-group-text" onclick="togglePassword()" style="cursor: pointer;">
                          <i class="ti ti-eye" id="eyeIcon"></i>
                          <i class="ti ti-eye-off" id="eyeOffIcon" style="display:none;"></i>
                      </span>
                      @error('password')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                    </div>
                  </div>
                  <button type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Daftar</button>
                  <div class="d-flex align-items-center justify-content-center">
                    <p class="fs-4 mb-0 fw-bold">Sudah punya akun?</p>
                    <a class="text-primary fw-bold ms-2" href="{{ route('login') }}">Log in</a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script>
    function togglePassword() {
        var passwordInput = document.getElementById('exampleInputPassword1');
        var eyeIcon = document.getElementById('eyeIcon');
        var eyeOffIcon = document.getElementById('eyeOffIcon');

        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            eyeIcon.style.display = 'none';
            eyeOffIcon.style.display = 'inline';
        } else {
            passwordInput.type = 'password';
            eyeIcon.style.display = 'inline';
            eyeOffIcon.style.display = 'none';
        }
    }
  </script>

<style>
    .input-group-text {
        display: flex;
        align-items: center;
    }
    .input-group-text i {
        margin-left: 5px;
    }
</style>
  <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  @include('assets.js.notifikasi-berhasil')
  <script src="assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  @include('assets.js.validasi-modal-tambah') {{-- validasi error --}}
</body>

</html>