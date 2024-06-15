<!-- @extends('adminlte.layouts.app') -->

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
                    <h1 class="m-0">Daftar Laporan</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Daftar Laporan</li>
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
                    <table class="table table-bordered" id="article-table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>No.Aduan</th>
                                <th>No.Transaksi</th>
                                <th>Bukti Gambar</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($reports as $report)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $report->reportNumber }}</td>
                                    <td>{{ $report->transaction_id }}</td>
                                    <td class="text-center">
                                        <img src="{{ asset('storage/reports/'.$report->reportImage) }}" style="width: 50px;" class="rounded">
                                    </td>
                                    <td>
                                        <a href="{{ route('showReport', $report->id) }}" class="btn btn-sm btn-primary">Lihat</a>
                                        <a onclick="confirmDelete(this)" data-url="{{ route('deleteReport', ['id' => $report->id]) }}" class="btn btn-danger btn-sm" role="button">Hapus</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="9" class="text-center">Tidak ada data laporan</td>
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
