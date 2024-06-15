<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback Form</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        .jumbotron {
            background-color: #92CAF1;
            padding: 3rem;
            border-radius: 10px;
        }
        .jumbotron h1 {
            color: #343a40;
            text-align: center;
        }
        .form-group {
            margin-bottom: 1.5rem; /* Membuat sedikit ruang di bawah setiap form group */
        }
    </style>
</head>
<body style="background-color: #DDDFE3;">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="jumbotron">
                    <h1 class="display-4">Submit Your Feedback</h1>
                    <p class="lead" style="text-align: center">Kami menghargai pendapat Anda. Sampaikan pendapat Anda kepada kami!</p>
                </div>
                @if(session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('storeReport') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="email"><i class="fas fa-envelope"></i>No.Laporan :</label>
                        <input type="text" class="form-control" value="{{ $reportNumber }}" readonly>
                        <input type="hidden" name="reportNumber" value="{{ $reportNumber }}">
                    </div>
                    <div class="form-group">
                        <label for="id_transaksi">No.Transaksi :</label>
                        <input type="text" class="form-control @error('transaction_id') is-invalid @enderror" value="{{ old('transaction_id') }}" name="transaction_id">
                    
                        @error('transaction_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>



                    <div class="form-group">
                        <label for="name"><i class="fas fa-user"></i>  Nama :</label>
                        <input type="text" class="form-control @error('customerName') is-invalid @enderror" value="{{ old('customerName') }}" name="customerName">
                    
                        @error('customerName')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>



                    <div class="form-group">
                        <label for="gambar"><i class="fas fa-image"></i>  Gambar :</label>
                        <input type="file" class="form-control @error('reportImage') is-invalid @enderror" name="reportImage">
                    
                        @error('reportImage')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>



                    <div class="form-group">
                        <label for="message"><i class="fas fa-comment"></i>  Pesan:</label>
                        <textarea class="form-control @error('reportText') is-invalid @enderror" value="{{ old('reportText') }}" name="reportText" rows="5"></textarea>
                    
                        @error('reportText')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>



                    <button type="submit" class="btn btn-primary"><i class="fas fa-paper-plane"></i> Submit Feedback</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>
    <script src="{{ asset('js/sweetalert.js') }}"></script>
</body>
</html>
