@extends('adminlte.layouts.app')
 @section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Edit Customer</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit Customer</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container mt-5">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('updateCustomer', ['id' => $customer->id]) }}" method="post">
                        @csrf
            
                        <div class="form-group">
                            <label for="customerName">Nama Customer</label>
                            <input type="text" name="customerName" id="customerName" class="form-control" required="required" value="{{ $customer->customerName }}" placeholder="Masukkan nama customer">
                        </div>
                        <div class="form-group">
                            <label for="customerPhoneNumber">Nomor Phone</label>
                            <input type="text" name="customerPhoneNumber" id="customerPhoneNumber" class="form-control" required="required" value="{{ $customer->customerPhoneNumber }}" placeholder="Masukkan nama customer">
                        </div>
            
                        <div class="form-group">
                            <label for="customerStreet">Alamat</label>
                            <textarea name="customerStreet" id="customerStreet" rows="3" class="form-control" required="required" placeholder="Masukkan Alamat customer">{{ $customer->customerStreet }}</textarea>
                        </div>
                       
                        
            
                        <div class="text-right">
                            <a href="{{ route('daftarCustomer') }}" class="btn btn-outline-secondary mr-2" role="button">Batal</a>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
           
        </div>
   </div>
    
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
     
@endsection