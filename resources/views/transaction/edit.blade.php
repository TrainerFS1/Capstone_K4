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
            <div class="row">
                <div class="col-md-12">
                    <div class="card border-0 shadow-sm rounded">
                        <div class="card-body">
                            <form action="{{ route('transaction.update', ['id' => $transaction->id]) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT') <!-- Gunakan method PUT untuk update -->

                                <div class="row">
                                    <!-- Kolom Kiri -->
                                    <div class="col-md-6">
                                        <!-- Nomor Transaksi -->
                                        <div class="form-group">
                                            <label class="font-weight-bold">Nomor Transaksi</label>
                                            <input type="text" class="form-control" value="{{ $transaction->transactionNumber }}" readonly>
                                        </div>

                                        <!-- Tanggal Waktu Transaksi -->
                                        <div class="form-group">
                                            <label class="font-weight-bold">Tanggal Waktu Transaksi</label>
                                            <input type="datetime-local" class="form-control @error('transactionDateTime') is-invalid @enderror" name="transactionDateTime" value="{{ old('transactionDateTime', $transaction->transactionDateTime) }}">
                                            @error('transactionDateTime')
                                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- Paket & Harga -->
                                        <div class="form-group">
                                            <label class="font-weight-bold">Paket & Harga</label>
                                            <select class="form-control @error('package_id') is-invalid @enderror" name="package_id">
                                                <option value="">Pilih Paket - Harga</option>
                                                @foreach ($packages as $package)
                                                    <option value="{{ $package->id }}" {{ old('package_id', $transaction->package_id) == $package->id ? 'selected' : '' }}>{{ $package->packageName }} - Rp. {{ number_format($package->packagePrice, 0, ',', '.') }}</option>
                                                @endforeach
                                            </select>
                                            @error('package_id')
                                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Kolom Kanan -->
                                    <div class="col-md-6">
                                        <!-- Nama Pelanggan -->
                                        <div class="form-group">
                                            <label class="font-weight-bold">Nama Pelanggan</label>
                                            <select class="form-control @error('customer_id') is-invalid @enderror" name="customer_id">
                                                <option value="">Pilih Pelanggan</option>
                                                @foreach ($customers as $customer)
                                                    <option value="{{ $customer->id }}" {{ old('customer_id', $transaction->customer_id) == $customer->id ? 'selected' : '' }}>{{ $customer->customerName }}</option>
                                                @endforeach
                                            </select>
                                            @error('customer_id')
                                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- Status Transaksi -->
                                        <div class="form-group">
                                            <label class="font-weight-bold">Status Transaksi</label>
                                            <select class="form-control @error('transactionStatus') is-invalid @enderror" name="transactionStatus">
                                                <option value="diterima" {{ old('transactionStatus', $transaction->transactionStatus) == 'diterima' ? 'selected' : '' }}>Diterima</option>
                                                <option value="diproses" {{ old('transactionStatus', $transaction->transactionStatus) == 'diproses' ? 'selected' : '' }}>Diproses</option>
                                                <option value="selesai" {{ old('transactionStatus', $transaction->transactionStatus) == 'selesai' ? 'selected' : '' }}>Selesai</option>
                                            </select>
                                            @error('transactionStatus')
                                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- Pembayaran Transaksi -->
                                        <div class="form-group">
                                            <label class="font-weight-bold">Pembayaran Transaksi</label>
                                            <select class="form-control @error('transactionPaymentMethod') is-invalid @enderror" name="transactionPaymentMethod">
                                                <option value="">Pilih Metode Pembayaran</option>
                                                <option value="1" {{ old('transactionPaymentMethod', $transaction->transactionPaymentMethod) == '1' ? 'selected' : '' }}>Cash</option>
                                                <option value="2" {{ old('transactionPaymentMethod', $transaction->transactionPaymentMethod) == '2' ? 'selected' : '' }}>Transfer</option>
                                            </select>
                                            @error('transactionPaymentMethod')
                                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <!-- Tombol Simpan dan Reset -->
                                <div class="form-group">
                                    <button type="submit" class="btn btn-md btn-primary">Simpan</button>
                                    <button type="reset" class="btn btn-md btn-warning">Reset</button>
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
