@extends('adminlte.layouts.app')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit Package</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Edit Package</li>
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
                    <form action="{{ route('updatePackage', ['id' => $package->id]) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label class="font-weight-bold">Package Name</label>
                            <input type="text" class="form-control @error('packageName') is-invalid @enderror"
                                name="packageName" value="{{ old('packageName', $package->packageName) }}"
                                placeholder="Enter Package Name">
                            
                            @error('packageName')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label class="font-weight-bold">Package Image</label>
                            <input type="file" class="form-control @error('packageGambar') is-invalid @enderror"
                                name="packageGambar">
                            
                            @error('packageGambar')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                            
                            @if ($package->packageGambar)
                                <div class="mt-2">
                                    <img src="{{ Storage::url('packages/' . $package->packageGambar) }}" alt="{{ $package->packageName }}" width="150">
                                </div>
                            @endif
                        </div>
                        
                        <div class="form-group">
                            <label class="font-weight-bold">Package Description</label>
                            <textarea class="form-control @error('packageDeskripsi') is-invalid @enderror"
                                name="packageDeskripsi" rows="5" placeholder="Enter Package Description">{{ old('packageDeskripsi', $package->packageDeskripsi) }}</textarea>
                            
                            @error('packageDeskripsi')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label class="font-weight-bold">Package Price</label>
                            <input type="number" class="form-control @error('packagePrice') is-invalid @enderror"
                                name="packagePrice" value="{{ old('packagePrice', $package->packagePrice) }}"
                                placeholder="Enter Package Price">
                            
                            @error('packagePrice')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        
                        <a href="{{ route('daftarPackage') }}" class="btn btn-outline-secondary mr-2"
                            role="button">Cancel</a>
                        <button type="submit" class="btn btn-md btn-primary">Save</button>

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
    CKEDITOR.replace('packageDeskripsi');
</script>

@endsection
