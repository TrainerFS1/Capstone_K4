@extends('adminlte.layouts.app')

@section('addCss')
    <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap4.min.css') }}">
@endsection

@section('addJavascript')
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('js/sweetalert.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#data-table').DataTable({
                "searching": true 
            });

            window.confirmDelete = function(button) {
                var url = $(button).data('url');
                console.log("URL Penghapusan:", url); 
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
        });
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
                        <h1 class="m-0">Daftar Customer</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Daftar Customer</li>
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
                    <div class="card-header text-right">
                        <a href="{{ route('createCustomer') }}" class="btn btn-primary" role="button">Tambah Customer</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover table-bordered mb-2" id="data-table">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama Customer</th>
                                    <th>Nomor Phone</th>
                                    <th>Alamat</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($customers as $customer)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $customer->customerName }}</td>
                                        <td>{{ $customer->customerPhoneNumber }}</td>
                                        <td>{{ $customer->customerStreet }}</td>
                                        <td>
                                            <a href="{{ route('editCustomer', ['id' => $customer->id]) }}" class="btn btn-warning btn-sm" role="button">Edit</a>
                                            <a onclick="confirmDelete(this)" data-url="{{ route('deleteCustomer', ['id' => $customer->id]) }}" class="btn btn-danger btn-sm" role="button">Hapus</a>
                                        </td>
                                    </tr>
                                @endforeach
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