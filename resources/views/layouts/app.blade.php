<!doctype html>
<html lang="en">

<head>
    @include('assets.css')
</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <!-- Sidebar Start -->
    @include('assets.sidebar')
    <!--  Sidebar End -->
    <!--  Main wrapper -->
    <div class="body-wrapper">
      <!--  Header Start -->
      <header class="app-header">
        @include('assets.navbar')
      </header>
      <!--  Header End -->
      
      @yield('content')
    </div>
  </div>
  
  @include('assets.js')

</body>

</html>