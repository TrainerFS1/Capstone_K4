<!-- Modal -->
<div class="modal fade" id="searchModal" tabindex="-1" role="dialog" aria-labelledby="searchModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="searchModalLabel">Detail Transaksi</h5>
                <a href="http://127.0.0.1:8000/laundry" class="close" aria-label="Close">
                    <span aria-hidden="true">&times;</span> Kembali
                </a>
            </div>
            <div class="modal-body">
                @foreach($transactions as $transaction)
                <div>
                    <p>No. Transaksi: {{ $transaction->transactionNumber }}</p>
                    <p>Nama Customer: {{ $transaction->customer->customerName }}</p>
                    <p>Status: {{ $transaction->transactionStatus }}</p>
                    <p>Paket: {{ $transaction->package->packageName }}</p>
                    <p>Berat: {{ $transaction->amount }} KG</p>
                    <p>Price: Rp. {{ $transaction->transactionTotal }}</p>
                </div>
                <hr>
                @endforeach
            </div>
        </div>
    </div>
</div>


<style>
    /* Global Styles */
body {
    font-family: 'Arial', sans-serif;
    background-color: #f8f9fa;
}

/* Modal Styles */
.modal-content {
    background-color: #ffffff;
    border: 1px solid #ced4da;
    border-radius: 0.25rem;
    box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
}

.modal-header {
    border-bottom: 1px solid #ced4da;
    background-color: #f8f9fa;
    color: #343a40;
    padding: 10px 20px;
}

.modal-title {
    font-size: 1.25rem;
}

.modal-body {
    padding: 20px;
}

.modal-footer {
    border-top: 1px solid #ced4da;
    background-color: #f8f9fa;
    padding: 10px 20px;
}

.btn-secondary {
    background-color: #6c757d;
    color: #ffffff;
    border: none;
}

.btn-secondary:hover {
    background-color: #5a6268;
    color: #ffffff;
}

.close {
    color: #000000;
    opacity: 1;
    font-size: 1.5rem;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: #000000;
    text-decoration: none;
    cursor: pointer;
}

/* Transaction Details Styles */
.transaction-details {
    margin-bottom: 10px;
}

.transaction-details p {
    margin-bottom: 5px;
}

.transaction-details strong {
    font-weight: bold;
}

</style>

<script>
    $(document).ready(function() {
        $('#searchModal').modal('show'); // Tampilkan modal ketika halaman selesai dimuat
    });
</script>
