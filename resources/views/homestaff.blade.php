@extends('adminlte.layouts.app')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Staff</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Starter Page</li>
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
          <div class="col-sm-6 mb-3 lg-1 mb-sm-0">
            <div class="card bg-info">
              <div class="card-header">Daftar Kategori</div>
              <div class="card-body">
                <h5 class="card-title">Info Kategori</h5>
                <p class="card-text">Kategori merupakan penanda artikel ini membahas tentang apa.</p>
                <a href="{{ route('User') }}" class="btn btn-light">Lihat Kategori</a>
              </div>
            </div>
          </div>
          <div class="col-sm-6 mb-3 lg-1 mb-sm-0">
            <div class="card bg-success">
              <div class="card-header">Daftar Artikel</div>
                <div class="card-body">
                  <h5 class="card-title">Info Artikel</h5>
                  <p class="card-text">Artikel merupakan sebuah bacaan yang berisi informasi.</p>
                  <a href="{{ route('Customer') }}" class="btn btn-light">Lihat Artikel</a>
              </div>
            </div>
          </div>
          <div class="col-sm-6 mb-3 lg-1 mb-sm-0">
            <div class="card bg-danger">
              <div class="card-header">Daftar User</div>
                <div class="card-body">
                  <h5 class="card-title">Info User</h5>
                  <p class="card-text">Berkaitan dengan data user.</p>
                  <a href="{{ route('Package') }}" class="btn btn-light">Lihat User</a>
              </div>
            </div>
          </div><!-- /.card -->
        </div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection
