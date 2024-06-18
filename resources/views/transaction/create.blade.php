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
                <!-- Formulir Transaksi -->
                <div class="col-md-12">
                    <div class="card border-0 shadow-sm rounded">
                        <div class="card-body">
                            <form action="{{ route('storeTransaction') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                
                                <!-- ID Paket -->
                                <div class="form-group">
                                    <label class="font-weight-bold">Nomor Transaksi</label>
                                    <input type="text" class="form-control" value="{{ $transactionNumber }}" readonly>
                                    <!-- Menyimpan nomor urut sebagai nilai default yang tidak bisa diubah oleh pengguna -->
                                    <input type="hidden" name="transactionNumber" value="{{ $transactionNumber }}">
                                </div>

                                <!-- Tanggal Waktu Transaksi -->
                                <div class="form-group">
                                    <label class="font-weight-bold">Tanggal Waktu Transaksi</label>
                                    <input type="datetime-local" class="form-control @error('transactionDateTime') is-invalid @enderror" name="transactionDateTime" value="{{ old('transactionDateTime', now()->format('Y-m-d\TH:i')) }}" readonly>
                                    @error('transactionDateTime')
                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="font-weight-bold">Paket & Harga</label>
                                            <select class="form-control @error('package_id') is-invalid @enderror" name="package_id" id="package_id">
                                                <option value="">Pilih Paket - Harga</option>
                                                @foreach ($packages as $package)
                                                    <option value="{{ $package->id }}" data-price="{{ $package->packagePrice }}">{{ $package->packageName }} - {{ $package->packagePrice }}</option>
                                                @endforeach
                                            </select>
                                            @error('package_id')
                                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="font-weight-bold">Berat</label>
                                            <input type="text" class="form-control @error('amount') is-invalid @enderror" 
                                                placeholder="Masukkan Berat" name="amount" id="amount" value="{{ old('amount') }}">
                                            @error('amount')
                                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <!-- Total Transaksi -->
                                <div class="form-group">
                                    <label class="font-weight-bold">Total Transaksi</label>
                                    <input type="text" class="form-control" id="transactionTotal" readonly>
                                </div>

                                <!-- ID Pelanggan -->
                                <div class="form-group">
                                    <label class="font-weight-bold">Nama Pelanggan</label>
                                    <select class="form-control @error('customer_id') is-invalid @enderror" name="customer_id">
                                        <option value="">Pilih Pelanggan</option>
                                        @foreach ($customers as $customer)
                                            <option value="{{ $customer->id }}" {{ old('customer_id') == $customer->id ? 'selected' : '' }}>{{ $customer->customerName }}</option>
                                        @endforeach
                                    </select>
                                    @error('customer_id')
                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Status Transaksi --}}
                                <div class="form-group">
                                    <label class="font-weight-bold">Status Transaksi</label>
                                    <input type="text" class="form-control" value="{{ old('transactionStatus', 'Diterima') }}" readonly>
                                    <!-- Menyimpan nomor urut sebagai nilai default yang tidak bisa diubah oleh pengguna -->
                                    <input type="hidden" name="transactionStatus" value="{{ old('transactionStatus', 'Diterima') }}">
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
                                <div class="form-group">
                                    <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
                                    <button type="reset" class="btn btn-md btn-warning">RESET</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
    </div>

    <!-- Script untuk Menghitung Total Transaksi -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        // Menggunakan jQuery untuk mendengarkan perubahan pada select paket dan input berat
        $(document).ready(function() {
            $('#package_id, #amount').on('change keyup', function() {
                // Ambil harga paket dari data-price attribute pada option yang dipilih
                var packagePrice = parseFloat($('#package_id option:selected').data('price'));
                // Ambil nilai berat dari input amount
                var amount = parseFloat($('#amount').val());

                // Validasi bahwa keduanya bukan NaN atau undefined
                if (!isNaN(packagePrice) && !isNaN(amount)) {
                    // Hitung total transaksi
                    var transactionTotal = packagePrice * amount;
                    // Masukkan hasil perhitungan ke input total transaksi
                    $('#transactionTotal').val(transactionTotal);
                } else {
                    // Jika salah satu atau keduanya tidak valid, kosongkan input total transaksi
                    $('#transactionTotal').val('');
                }
            });
        });
    </script>
@endsection
