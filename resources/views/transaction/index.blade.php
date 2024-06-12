@extends('adminlte.layouts.app')

@section('addJavascript')
    <script src="{{ asset('js/sweetalert.min.js') }}"></script>
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.bootstrap4.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#article-table').DataTable();
        });

        function confirmDelete(button) {
            var url = $(button).data('url');
            console.log("URL Penghapusan:", url); // Membantu dalam pemecahan masalah
            swal({
                title: 'Konfirmasi Hapus',
                text: 'Apakah Anda yakin ingin menghapus data ini?',
                icon: 'warning',
                dangerMode: true,
                buttons: true,
            }).then(function(willDelete) {
                if (willDelete) {
                    window.location = url;
                }
            });
        }
    </script>
@endsection

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
                    <table class="table table-bordered" id="article-table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>No.Transaksi</th>
                                <th>Tanggal Waktu Transaksi</th>
                                <th>Status Transaksi</th>
                                <th>Pembayaran Transaksi</th>
                                <th>Nama Pengguna</th>
                                <th>Nama Pelanggan</th>
                                <th>Nama Paket</th>
                                <th>Harga Paket</th>
                                <th>Jumlah</th>
                                <th>Total Harga</th>
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
                                    
                                    @if ($transaction->transactionPaymentMethod == '1')
                                        <td>Cash</td>
                                    @elseif ($transaction->transactionPaymentMethod == '2')
                                        <td>Transfer</td>
                                    @endif
                                    
                                    @foreach ($users as $user)
                                    @if ($transaction->userEmail == $user->userEmail)
                                        <td>{{ $user->userFullName }}</td>
                                    @endif
                                    @endforeach
                                    
                                    @foreach ($customers as $customer)
                                    @if ($transaction->customer_id == $customer->id)
                                        <td>{{ $customer->customerName }}</td>
                                    @endif
                                    @endforeach

                                    @foreach ($packages as $package)
                                    @if ($transaction->package_id == $package->id)
                                    <td>{{ $package->packageName }}</td>
                                    <td>{{ $package->packagePrice }}</td>
                                    @endif
                                    @endforeach

                                    <td>{{ $transaction->amount}}</td>
                                    <td>{{ $transaction->transactionTotal }}</td>
                                    <td>
                                        <a href="{{ route('editTransaction', $transaction->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                        <a onclick="confirmDelete(this)" data-url="{{ route('deleteTransaction', ['id' => $transaction->id]) }}" class="btn btn-danger btn-sm" role="button">Hapus</a>
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
