<!-- resources/views/transactions/print-receipt.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Struk Transaksi</title>
    <!-- Include CSS styling for receipt -->
    <link rel="stylesheet" href="{{ asset('css/print-receipt.css') }}">
</head>
<body>
    <div class="receipt-container">
        <h2>Struk Transaksi</h2>
        <p><strong>No. Transaksi:</strong> {{ $transaction->transactionNumber }}</p>
        <p><strong>Tanggal Waktu Transaksi:</strong> {{ $transaction->transactionDateTime }}</p>
        <p><strong>Status Transaksi:</strong> {{ $transaction->transactionStatus }}</p>
        <p><strong>Pembayaran Transaksi:</strong> {{ $transaction->transactionPaymentMethod == '1' ? 'Cash' : 'Transfer' }}</p>
        <p><strong>Nama Pelanggan:</strong> {{ $transaction->customer->customerName }}</p>
        <p><strong>Nama Paket:</strong> {{ $transaction->package->packageName }}</p>
        <p><strong>Harga Paket:</strong> {{ $transaction->package->packagePrice }}</p>
        <p><strong>Berat:</strong> {{ $transaction->amount }}</p>
        <p><strong>Total Harga:</strong> {{ $transaction->transactionTotal }}</p>
    </div>

    <!-- Include JavaScript for print functionality -->
    <script>
        window.onload = function() {
            window.print();
        }
    </script>
</body>
</html>
