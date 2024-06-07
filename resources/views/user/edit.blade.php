@extends('adminlte.layouts.app')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit User</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Edit User</li>
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
                    <form action="{{ route('updateUser', $user->id) }}" method="POST" enctype="multipart/form-data">

                        @csrf
                        @method('PUT')
                        
                        <div class="form-group">
                            <label class="font-weight-bold">Nama Lengkap</label>
                            <input type="text" class="form-control @error('userFullName') is-invalid @enderror"
                                name="userFullName" value="{{ old('userFullName', $user->userFullName) }}" placeholder="Masukkan Nama Lengkap">
                            @error('userFullName')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">Email</label>
                            <input type="email" class="form-control @error('userEmail') is-invalid @enderror"
                                name="userEmail" value="{{ old('userEmail', $user->userEmail) }}" placeholder="Masukkan Email">
                            @error('userEmail')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                name="password" placeholder="Masukkan Password">
                            @error('password')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">Tipe User</label>
                            <select class="form-control @error('userType') is-invalid @enderror" name="userType">
                                <option value="super admin" {{ old('userType', $user->userType) == 'super admin' ? 'selected' : '' }}>Super Admin</option>
                                <option value="staff admin" {{ old('userType', $user->userType) == 'staff admin' ? 'selected' : '' }}>Staff Admin</option>
                            </select>
                            @error('userType')
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
@endsection
