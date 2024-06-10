@extends('adminlte.layouts.app')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Daftar Transaksi</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Daftar Transaksi</li>
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
                    <a href="{{ route('createTransaction') }}" class="btn btn-md btn-success mb-3">TAMBAH TRANSAKSI</a>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nomor Transaksi</th>
                                <th>Tanggal Waktu Transaksi</th>
                                <th>Status Transaksi</th>
                                <th>Pembayaran Transaksi</th>
                                <th>Email Pengguna</th>
                                <th>ID Pelanggan</th>
                                <th>ID Paket</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($transactions as $transaction)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $transaction->transactionNumber }}</td>
                                    <td>{{ $transaction->transactionDateTime }}</td>
                                    <td>{{ $transaction->transactionStatus }}</td>
                                    <td>{{ $transaction->transactionPayment }}</td>
                                    <td>{{ $transaction->user_id }}</td>
                                    <td>{{ $transaction->customer_id }}</td>
                                    <td>{{ $transaction->package_id }}</td>
                                    <td>
                                        <a href="{{ route('transactions.edit', $transaction->transactionNumber) }}" class="btn btn-sm btn-primary">EDIT</a>
                                        <form action="{{ route('transactions.destroy', $transaction->transactionNumber) }}" method="POST" style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="9" class="text-center">Tidak ada data transaksi</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
