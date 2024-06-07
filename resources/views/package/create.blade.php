@extends('adminlte.layouts.app')
 @section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Tambah Package</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Tambah Package</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container mt-5">
            <div class="card border-0 shadow-sm rounded">
                <div class="card-body">
                    <form action="{{ route('storePackage') }}" method="POST" enctype="multipart/form-data">

                
                        @csrf
                        <div class="form-group">
                            <label class="font-weight-bold">Nama Produk / Paket</label>
                            <input type="text" class="form-control @error('packageName') is-invalid @enderror"
                                name="packageName" value="{{ old('packageName') }}" placeholder="Masukkan Nama Product">
    
                            <!-- error message untuk title -->
                            @error('packageName')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label class="font-weight-bold">Gambar</label>
                            <input type="file" class="form-control @error('packageGambar') is-invalid @enderror"
                                name="packageGambar">
    
                            <!-- error message untuk title -->
                            @error('packageGambar')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">Deskripsi</label>
                            <textarea class="form-control @error('packageDeskripsi') is-invalid @enderror" name="packageDeskripsi" rows="5" placeholder="Masukkan package Deskripsi ">{{ old('packageDeskripsi') }}</textarea>
    
                            <!-- error message untuk content -->
                            @error('packageDeskripsi')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
    
                        <div class="form-group">
                            <label class="font-weight-bold">Harga</label>
                            <input type="number" class="form-control @error('packagePrice') is-invalid @enderror"
                                   name="packagePrice" value="{{ old('packagePrice') }}" placeholder="Masukkan packagePrice">
                            
                            <!-- error message untuk title -->
                            @error('packagePrice')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
                        <button type="reset" class="btn btn-md btn-warning">RESET</button>
    
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'packageDeskripsi' );
    </script>
     
@endsection