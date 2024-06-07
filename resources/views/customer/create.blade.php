@extends('adminlte.layouts.app')
 @section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Tambah Customer</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Tambah Customer</li>
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
                    <form action="{{ route('storeCustomer') }}" method="POST" enctype="multipart/form-data">
    
                        @csrf
                        <div class="form-group">
                            <label for="nama">Nama Customer</label>
                            <input type="text" name="customerName" id="customerName" class="form-control" required="required" placeholder="Masukkan Nama Customer">
                        </div>
                        <div class="form-group">
                            <label for="nama">Nomor Customer</label>
                            <input type="number" name="customerPhoneNumber" id="customerPhoneNumber" class="form-control" required="required" placeholder="Masukkan nomor customer">
                        </div>
                        <div class="form-group">
                            <label for="nama">Alamat</label>
                            <textarea class="form-control @error('customerStreet') is-invalid @enderror" name="customerStreet" rows="5"
                                placeholder="Masukkan Alamat Lengkap">{{ old('customerStreet') }}</textarea>
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
     
@endsection