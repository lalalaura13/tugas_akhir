<aside class="left-sidebar">
  <!-- Sidebar scroll-->
  <div>
    <div class="brand-logo d-flex align-items-center justify-content-between mt-3">
      <a href="./index.html" class="text-nowrap logo-img">
        <img src="{{ asset('assets/images/logos/logomp.png') }}" width="60" alt="" />
      </a>
      <span class="hide-menu">PIALA REKTOR UNSOED</span>
      <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
        <i class="ti ti-x fs-8"></i>
      </div>
    </div>
    <!-- Sidebar navigation-->
    <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
      <ul id="sidebarnav">
        <li class="nav-small-cap">
          <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
          <span class="hide-menu">Home</span>
        </li>
        @if (Auth()->user()->role_id == 1)
        <li class="sidebar-item">
          <a class="sidebar-link" href="{{ route('a.dashboard') }}" aria-expanded="false">
            <span>
              <i class="ti ti-layout-dashboard"></i>
            </span>
            <span class="hide-menu">Dashboard</span>
          </a>
        </li>
        <li class="nav-small-cap">
          <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
          <span class="hide-menu">USER</span>
        </li> 
        <li class="sidebar-item">
          <a class="sidebar-link" href="{{ route('a.kolat') }}" aria-expanded="false">
            <span>
              <i class="ti ti-article"></i>
            </span>
            <span class="hide-menu">Data Kolat</span>
          </a>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link" href="{{ route('a.data-atlet') }}" aria-expanded="false">
            <span>
              <i class="ti ti-article"></i>
            </span>
            <span class="hide-menu">Data Atlet</span>
          </a>
        </li>
        <li class="nav-small-cap">
          <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
          <span class="hide-menu">JADWAL KEJUARAAN</span>
        </li> 
        <li class="sidebar-item">
          <a class="sidebar-link" href="{{ route('a.jadwal-pendaftaran') }}" aria-expanded="false">
            <span>
              <i class="ti ti-article"></i>
            </span>
            <span class="hide-menu">Pendaftaran</span>
          </a>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link" href="{{ route('a.jadwal-tm') }}" aria-expanded="false">
            <span>
              <i class="ti ti-article"></i>
            </span>
            <span class="hide-menu">Technical Meeting</span>
          </a>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link" href="{{ route('a.jadwal-pelaksanaan') }}" aria-expanded="false">
            <span>
              <i class="ti ti-article"></i>
            </span>
            <span class="hide-menu">Pelaksanaan</span>
          </a>
        </li>
        <li class="nav-small-cap">
          <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
          <span class="hide-menu">BAGAN</span>
        </li> 
        <li class="sidebar-item">
          <a class="sidebar-link" href="{{ route('a.olah-bagan') }}" aria-expanded="false">
            <span>
              <i class="ti ti-file-description"></i>
            </span>
            <span class="hide-menu">Daftar Bagan</span>
          </a>
        </li>
        <li class="nav-small-cap">
          <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
          <span class="hide-menu">SERTIFIKAT</span>
        </li> 
        <li class="sidebar-item">
          <a class="sidebar-link" href="{{ route('a.olah-sertifikat') }}" aria-expanded="false">
            <span>
              <i class="ti ti-file-description"></i>
            </span>
            <span class="hide-menu">Daftar Sertifikat</span>
          </a>
        </li>
        <li class="nav-small-cap">
          <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
          <span class="hide-menu">MEDALI</span>
        </li> 
        <li class="sidebar-item">
          <a class="sidebar-link" href="{{ route('a.olah-medali') }}" aria-expanded="false">
            <span>
              <i class="ti ti-file-description"></i>
            </span>
            <span class="hide-menu">Daftar Medali</span>
          </a>
        </li>
        @endif

        @if (Auth()->user()->role_id == 2)
        <li class="sidebar-item">
          <a class="sidebar-link" href="{{ route('k.dashboard') }}" aria-expanded="false">
            <span>
              <i class="ti ti-layout-dashboard"></i>
            </span>
            <span class="hide-menu">Dashboard</span>
          </a>
        </li>
        <li class="nav-small-cap">
          <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
          <span class="hide-menu">PENDAFTARAN</span>
        </li> 
        <li class="sidebar-item">
          <a class="sidebar-link" href="{{ route('k.table-peserta') }}" aria-expanded="false">
            <span>
              <i class="ti ti-article"></i>
            </span>
            <span class="hide-menu">Data Atlet</span>
          </a>
        </li>
        <li class="nav-small-cap">
          <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
          <span class="hide-menu">BAGAN</span>
        </li> 
        <li class="sidebar-item">
          <a class="sidebar-link" href="{{ route('k.daftar-bagan') }}" aria-expanded="false">
            <span>
              <i class="ti ti-article"></i>
            </span>
            <span class="hide-menu">Daftar Bagan</span>
          </a>
        </li>
        <li class="nav-small-cap">
          <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
          <span class="hide-menu">SERTIFIKAT</span>
        </li> 
        <li class="sidebar-item">
          <a class="sidebar-link" href="{{ route('k.daftar-sertifikat') }}" aria-expanded="false">
            <span>
              <i class="ti ti-article"></i>
            </span>
            <span class="hide-menu">Daftar Sertifikat</span>
          </a>
        </li>
        @endif
        
        {{-- <li class="sidebar-item">
          <a class="sidebar-link" href="./ui-alerts.html" aria-expanded="false">
            <span>
              <i class="ti ti-alert-circle"></i>
            </span>
            <span class="hide-menu">Alerts</span>
          </a>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link" href="./ui-card.html" aria-expanded="false">
            <span>
              <i class="ti ti-cards"></i>
            </span>
            <span class="hide-menu">Card</span>
          </a>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link" href="./ui-forms.html" aria-expanded="false">
            <span>
              <i class="ti ti-file-description"></i>
            </span>
            <span class="hide-menu">Forms</span>
          </a>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link" href="./ui-typography.html" aria-expanded="false">
            <span>
              <i class="ti ti-typography"></i>
            </span>
            <span class="hide-menu">Typography</span>
          </a>
        </li> --}}
        {{-- <li class="nav-small-cap">
          <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
          <span class="hide-menu">AUTH</span>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link" href="./authentication-login.html" aria-expanded="false">
            <span>
              <i class="ti ti-login"></i>
            </span>
            <span class="hide-menu">Login</span>
          </a>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link" href="./authentication-register.html" aria-expanded="false">
            <span>
              <i class="ti ti-user-plus"></i>
            </span>
            <span class="hide-menu">Register</span>
          </a>
        </li>
        <li class="nav-small-cap">
          <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
          <span class="hide-menu">EXTRA</span>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link" href="./icon-tabler.html" aria-expanded="false">
            <span>
              <i class="ti ti-mood-happy"></i>
            </span>
            <span class="hide-menu">Icons</span>
          </a>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link" href="./sample-page.html" aria-expanded="false">
            <span>
              <i class="ti ti-aperture"></i>
            </span>
            <span class="hide-menu">Sample Page</span>
          </a>
        </li>
      </ul>
      <div class="unlimited-access hide-menu bg-light-primary position-relative mb-7 mt-5 rounded">
        <div class="d-flex">
          <div class="unlimited-access-title me-3">
            <h6 class="fw-semibold fs-4 mb-6 text-dark w-85">Upgrade to pro</h6>
            <a href="https://adminmart.com/product/modernize-bootstrap-5-admin-template/" target="_blank" class="btn btn-primary fs-2 fw-semibold lh-sm">Buy Pro</a>
          </div>
          <div class="unlimited-access-img">
            <img src="{{ asset('assets/images/backgrounds/rocket.png') }}" alt="" class="img-fluid">
          </div>
        </div>
      </div> --}}
    </nav>
    <!-- End Sidebar navigation -->
  </div>
  <!-- End Sidebar scroll-->
</aside>