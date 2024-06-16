<!-- resources/views/transactions/print-receipt.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Struk Transaksi</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Optional: Include custom CSS for additional styling -->
    <link rel="stylesheet" href="{{ asset('css/print-receipt.css') }}">
    <style>
        /* Custom styles for the receipt */
        .receipt-container {
            max-width: 600px;
            margin: auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 10px;
        }
        .receipt-container h2 {
            margin-bottom: 20px;
        }
        .receipt-container p {
            margin-bottom: 10px;
        }
        .receipt-signature {
            margin-top: 30px;
            text-align: right;
        }
        .receipt-signature p {
            margin-bottom: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="receipt-container shadow p-4">
            <h2 class="text-center">Struk Transaksi</h2>
            <p><strong>No. Transaksi:</strong> {{ $transaction->transactionNumber }}</p>
            <p><strong>Tanggal Waktu Transaksi:</strong> {{ $transaction->transactionDateTime }}</p>
            <p><strong>Nama Pelanggan:</strong> {{ $transaction->customer->customerName }}</p>
            <p><strong>Status Transaksi:</strong> {{ $transaction->transactionStatus }}</p>
            <p><strong>Pembayaran Transaksi:</strong> {{ $transaction->transactionPaymentMethod == '1' ? 'Cash' : 'Transfer' }}</p>
            <p><strong>Nama Paket:</strong> {{ $transaction->package->packageName }}</p>
            <p><strong>Harga Paket:</strong> {{ $transaction->package->packagePrice }}</p>
            <p><strong>Berat:</strong> {{ $transaction->amount }}</p>
            <p><strong>Total Harga:</strong> {{ $transaction->transactionTotal }}</p>

            <!-- Signature section -->
            <div class="receipt-signature">
                <p>Diinput oleh,</p>
                <br><br>
                <p><strong>{{ auth()->user()->userFullName }}</strong></p>
            </div>
        </div>
    </div>

    <!-- Include Bootstrap JS and its dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Include JavaScript for print functionality -->
    <script>
        window.onload = function() {
            window.print();
        }
    </script>
</body>
</html>
