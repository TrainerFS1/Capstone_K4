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
            <h1 class="m-0">Daftar User</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Daftar User</li>
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
                    <a href="{{ route('createUser') }}" class="btn btn-primary" role="button">Tambah Page</a>
                </div>
                <div class="card-body">
                    <table class="table table-hover table-bordered mb-2" id="article-table">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama User</th>
                                <th>Email</th>
                                <th>Type User</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $user->userFullName }}</td>
                                <td>{{ $user->userEmail }}</td>
                                @if ($user->userType == '1')
                                <td>Super Admin</td>
                                @elseif ($user->userType == '2')
                                <td>Staff Admin</td>
                                @endif
                                <td>
                                    <a href="{{route('editUser', ['id' => $user->id])}}" class="btn btn-warning btn-sm" role="button">Edit</a>
                                    <a onclick="confirmDelete(this)" data-url="{{ route('deleteUser', ['id' => $user->id]) }}" class="btn btn-danger btn-sm" role="button">Hapus</a>
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
