@extends('adminlte.layouts.app')
<!-- @section('content') -->
<div class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm rounded p-3" style="background-color: #343A40; margin-left: 220px ;">
                    <div class="card-body">
                        <img src="{{ asset('storage/reports/'.$report->reportImage) }}" class="w-100 rounded">
                        <p style="color: white">________________________________________________________________________</p>
                        <h4 style="color: white">No.Laporan : {{ $report->reportNumber }}</h4>
                        <h4 style="color: white">No.Transaksi : {{ $report->transaction_id }}</h4>
                        <p style="color: white">________________________________________________________________________</p>
                        <p class="tmt-3" style="color: white">
                            {!! $report->reportText !!}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection