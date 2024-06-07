@extends('adminlte.layouts.app')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit Transaksi</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Edit Transaksi</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container">
            <div class="card border-0 shadow-sm rounded">
                <div class="card-body">
                    <form action="{{ route('transactions.update', $transaction->transactionNumber) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label class="font-weight-bold">Tanggal Waktu Transaksi</label>
                            <input type="datetime-local" class="form-control @error('transactionDateTime') is-invalid @enderror" name="transactionDateTime" value="{{ old('transactionDateTime', $transaction->transactionDateTime) }}">
                            @error('transactionDateTime')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">Status Transaksi</label>
                            <input type="text" class="form-control @error('transactionStatus') is-invalid @enderror" name="transactionStatus" value="{{ old('transactionStatus', $transaction->transactionStatus) }}" placeholder="Masukkan Status Transaksi">
                            @error('transactionStatus')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">Pembayaran Transaksi</label>
                            <input type="number" class="form-control @error('transactionPayment') is-invalid @enderror" name="transactionPayment" value="{{ old('transactionPayment', $transaction->transactionPayment) }}" placeholder="Masukkan Pembayaran Transaksi">
                            @error('transactionPayment')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">Email Pengguna</label>
                            <input type="email" class="form-control @error('userEmail') is-invalid @enderror" name="userEmail" value="{{ old('userEmail', $transaction->userEmail) }}" placeholder="Masukkan Email Pengguna">
                            @error('userEmail')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">ID Pelanggan</label>
                            <input type="number" class="form-control @error('customer_id') is-invalid @enderror" name="customer_id" value="{{ old('customer_id', $transaction->customer_id) }}" placeholder="Masukkan ID Pelanggan">
                            @error('customer_id')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">ID Paket</label>
                            <input type="number" class="form-control @error('package_id') is-invalid @enderror" name="package_id" value="{{ old('package_id', $transaction->package_id) }}" placeholder="Masukkan ID Paket">
                            @error('package_id')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
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
