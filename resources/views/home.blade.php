@extends('adminlte.layouts.app')
@section('addCss')
    <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap4.min.css') }}">
@endsection

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->  
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4">
                    <div class="card" style="color: #007bff; ">
                        <div class="card-body">
                            <h5 class="card-title">Daftar Kategori</h5>
                            <p class="card-text">
                                {{-- <h1>Jumlah : {{ $totalKategoris }} Kategori</h1> --}}
                            </p>
                            <!-- Tautan yang menjadi link -->
                            {{-- <a href="{{ route('daftarKategori') }}" class="card-link">Lihat Kategori</a> --}}
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Daftar Artikel</h5>
                            <p class="card-text">
                                {{-- <h1>Jumlah : {{ $totalArtikels }} Artikel</h1> --}}
                            </p>
                            <!-- Tautan yang menjadi link -->
                            {{-- <a href="{{ route('daftarArtikel') }}" class="card-link">Lihat Artikel</a> --}}
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card" style="color: #e121d8; ">
                        <div class="card-body">
                            <h5 class="card-title">Daftar User</h5>
                            <p class="card-text">
                                {{-- <h1>Jumlah : {{ $totalUsers }} User</h1> --}}
                            </p>
                            <!-- Tautan yang menjadi link -->
                            <a href="{{ route('home') }}" class="card-link">Lihat User</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection
