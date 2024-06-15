<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ $title ?? "Dashboard" }} | Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
  @yield('addCss')
  <style>
    .dataTables_filter {
        float: right;
    }
  </style>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-dark-primary bg-dark">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ route('home') }}" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="nav-link">Logout</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
    </ul>
  </nav>

  <!-- Main Sidebar Container -->
  @if (auth()->user()->userType == '1') 
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="{{ route('home') }}" class="brand-link">
      <img src="{{ asset('images/logo-aja.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="background-color: white">
      <span class="brand-text font-weight-light">{{ $title ?? "Cucian.ID" }}</span>
    </a>

    <div class="sidebar">
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('images/blank-profile-picture.png') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ auth()->user()->userFullName }}</a>
        </div>
      </div>

      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item menu-open" id="menu">
                <a href="#" class="nav-link active" id="menu-link">
                <i class="bi bi-person-circle"></i>
                    <p>Admin Master Data
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('daftarCustomer') }}" class="nav-link {{ Route::is('daftarCustomer') ? 'active' : '' }}" id="customer-link">
                        <i class="bi bi-people-fill"></i>
                            <p>
                              Customer</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('daftarPackage') }}" class="nav-link {{ Route::is('daftarPackage') ? 'active' : '' }}" id="package-link">
                        <i class="bi bi-collection-fill"></i>
                            <p>Package</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('daftarTransaction') }}" class="nav-link {{ Route::is('daftarTransaction') ? 'active' : '' }}" id="package-link">
                        <i class="bi bi-cash-stack"></i>
                            <p>Transaksi</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('daftarUser') }}" class="nav-link {{ Route::is('daftarUser') ? 'active' : '' }}" id="user-link">
                        <i class="bi bi-person-gear"></i>
                            <p>User</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('daftarReport') }}" class="nav-link {{ Route::is('daftarReport') ? 'active' : '' }}" id="staff-link"> 
                        <i class="bi bi-journal-text"></i>
                            <p>Report</p>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
    
    </div>
  </aside>
  @elseif (auth()->user()->userType == '2')
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="{{ route('home') }}" class="brand-link">
      <img src="{{ asset('images/logo-aja.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="background-color: white">
      <span class="brand-text font-weight-light">{{ $title ?? "Cucian.ID" }}</span>
    </a>

    <div class="sidebar">
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('images/blank-profile-picture.png') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ auth()->user()->userFullName }}</a>
        </div>
      </div>

      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item menu-open" id="menu">
                <a href="#" class="nav-link active" id="menu-link">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Staff Master Data
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('daftarCustomer') }}" class="nav-link {{ Route::is('daftarCustomer') ? 'active' : '' }}" id="customer-link">
                        <i class="bi bi-people-fill"></i>
                            <p>Customer</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('daftarPackage') }}" class="nav-link {{ Route::is('daftarPackage') ? 'active' : '' }}" id="package-link">
                        <i class="bi bi-collection-fill"></i>
                            <p>Package</p>
                        </a>
                    </li>
                    <li class="nav-item">
                      <a href="{{ route('daftarTransaction') }}" class="nav-link {{ Route::is('daftarTransaction') ? 'active' : '' }}" id="package-link">
                      <i class="bi bi-cash-stack"></i>
                      <p>Transaksi</p>
                      </a>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
    
    </div>
  </aside>

  @endif

  @yield('content')

  @include('sweetalert::alert')

  <!-- jQuery -->
  <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
  <!-- Bootstrap 4 -->
  <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <!-- AdminLTE App -->
  <script src="{{ asset('assets/dist/js/adminlte.min.js') }}"></script>
  @yield('addJavascript')
</div>
</body>
</html>
  