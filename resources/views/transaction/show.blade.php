<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <h4>Status Laundry</h4>
                        <hr>
                        <p class="tmt-3">{{ $transaction->transactionNumber }}</p>
                        @foreach ($customers as $customer)
                        @if ($customer->id == $transaction->customer_id)
                        <p class="tmt-3">
                            {{ $customer->customerName }}
                        </p>
                        @endif
                        @endforeach
                        @foreach ($packages as $package)
                        @if ($package->id == $transaction->package_id)
                        <p class="tmt-3">
                            {{ $package->packageName }}
                        </p>
                        @endif
                        @endforeach
                        <p class="tmt-3">{{ $transaction->transactionStatus }}</p>

                        <a href="{{ route('laundry') }}" class="btn btn-primary">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
</div>
</body>
</html>