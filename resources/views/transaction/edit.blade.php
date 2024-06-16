@extends('adminlte.layouts.app')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Tambah Transaksi</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Tambah Transaksi</li>
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
                <!-- Card Kiri -->
                <div class="col-md-6">
                    <div class="card border-0 shadow-sm rounded">
                        <div class="card-body">
                            <form action="{{ route('updateTransaction' , ['id' => $transaction->id]) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                
                                <!-- ID Paket -->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="font-weight-bold">Nomor Transaksi</label>
                                            <input type="text" class="form-control" value="{{ $transaction->transactionNumber }}" readonly>
                                            <!-- Menyimpan nomor urut sebagai nilai default yang tidak bisa diubah oleh pengguna -->
                                            <input type="hidden" name="transactionNumber" value="{{ $transaction->transactionNumber }}">
                                        </div>
                                        
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="font-weight-bold">Tanggal Waktu Transaksi</label>
                                            <input type="datetime-local" class="form-control @error('transactionDateTime') is-invalid @enderror" name="transactionDateTime" value="{{ old('transactionDateTime', $transaction->transactionDateTime) }}" readonly>
                                            @error('transactionDateTime')
                                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="font-weight-bold">Paket & Harga</label>
                                            <select class="form-control @error('package_id') is-invalid @enderror" name="package_id">
                                            <option value="">Paket - Harga</option>
                                            @foreach ($packages as $package)
                                                <option value="{{ $package->id }}" {{ old('package_id', $transaction->package_id) == $package->id ? 'selected' : '' }}>{{ $package->packageName }} - {{ $package->packagePrice }}</option>
                                            @endforeach
                                            </select>
                                            @error('package_id')
                                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="font-weight-bold">Jumlah</label>
                                            <input type="text" class="form-control" @error('amount') is-invalid @enderror" 
                                            placeholder="Masukkan Jumlah" name="amount" value="{{ old('amount', $transaction->amount) }}">
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="form-group">
                                    <label class="font-weight-bold">ID Paket</label>
                                    <select class="form-control @error('package_id') is-invalid @enderror" name="package_id">
                                        <option value="">Pilih Paket</option>
                                        @foreach ($packages as $package)
                                            <option value="{{ $package->id }}" {{ old('package_id', $transaction->package_id) == $package->id ? 'selected' : '' }}>{{ $package->packageName }}</option>
                                        @endforeach
                                    </select>
                                    @error('package_id')
                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                    @enderror -->
                                    <!-- <input type="number" class="form-control @error('package_id') is-invalid @enderror" name="package_id" value="{{ old('package_id') }}" placeholder="Masukkan ID Paket">
                                    @error('package_id')
                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                    @enderror -->
                                <!-- </div> -->
                                    
                        </div>
                    </div>
                </div>

                <!-- Card Kanan -->
                <div class="col-md-6">
                    <div class="card border-0 shadow-sm rounded">
                        <div class="card-body">
                            <form action="{{ route('updateTransaction', ['id' => $transaction->id]) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                
                                <!-- ID Pelanggan -->
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
                               

                                {{-- Status Transaksi --}}
                                <div class="form-group">
                                    <label class="font-weight-bold">Status Transaksi</label>
                                    <input type="text" class="form-control" value="{{ $transaction->transactionStatus }}" readonly>
                                            <!-- Menyimpan nomor urut sebagai nilai default yang tidak bisa diubah oleh pengguna -->
                                    <input type="hidden" name="transactionStatus" value="{{ $transaction->transactionStatus }}">
                                    <!-- <select class="form-control @error('transactionStatus') is-invalid @enderror" name="transactionStatus">
                                        <option value="diterima" {{ old('transactionStatus', 'diterima') == 'diterima' ? 'selected' : '' }}>Diterima</option>
                                        <option value="diproses" {{ old('transactionStatus') == 'diproses' ? 'selected' : '' }}>Diproses</option>
                                        <option value="selesai" {{ old('transactionStatus') == 'selesai' ? 'selected' : '' }}>Selesai</option>
                                    </select> -->
                                    @error('transactionStatus')
                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                                <!-- Pembayaran Transaksi -->
                                <div class="form-group">
                                    <label class="font-weight-bold">Pembayaran Transaksi</label>
                                    <select class="form-control @error('transactionPaymentMethod') is-invalid @enderror" name="transactionPaymentMethod">
                                        <option value="">Pilih Metode Pembayaran</option>
                                        <option value="1">Cash</option>
                                        <option value="2">Transfer</option>
                                    </select>
                                    @error('transactionPaymentMethod')
                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                                

                                <!-- Tombol Simpan dan Reset -->
                                <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
                                <button type="reset" class="btn btn-md btn-warning">RESET</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection

