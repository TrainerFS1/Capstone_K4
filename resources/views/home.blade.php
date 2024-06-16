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
                    <div class="card" style="color: #007bff;">
                        <div class="card-body">
                            <h5 class="card-title">Daftar Customer</h5>
                            <p class="card-text">
                                <h1>Jumlah : {{ $totalCustomers }} Customer</h1>
                            </p>
                            <!-- Tautan yang menjadi link -->
                            {{-- <a href="{{ route('daftarCustomer') }}" class="card-link">Lihat Customer</a> --}}
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Daftar Transaksi</h5>
                            <p class="card-text">
                                <h1>Jumlah : {{ $totalTransactions }} Transaksi</h1>
                            </p>
                            <!-- Tautan yang menjadi link -->
                            {{-- <a href="{{ route('daftarArtikel') }}" class="card-link">Lihat Artikel</a> --}}
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Total Pemasukan</h5>
                            <p class="card-text">
                                <h1>Rp. {{ $transactionTotal }}</h1>
                            </p>
                            <!-- Tautan yang menjadi link -->
                            {{-- <a href="{{ route('daftarArtikel') }}" class="card-link">Lihat Artikel</a> --}}
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
