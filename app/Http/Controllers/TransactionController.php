<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Customer;
use App\Models\Package;
use App\Models\User;
use Carbon\Carbon;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::all();
        return view('transaction.index', compact('transactions'));  
    }

    public function create()
    {
        $currentDate = Carbon::now();
        $yearMonth = $currentDate->format('ym');

        // Mendapatkan nomor urut terakhir untuk bulan ini
        $lastTransaction = Transaction::where('transactionNumber', 'like', 'LA' . $yearMonth . '%')->latest()->first();

        // Jika ada transaksi sebelumnya, tambahkan 1 ke nomor urutnya, jika tidak, mulai dari 1
        $sequence = $lastTransaction ? intval(substr($lastTransaction->transactionNumber, -5)) + 1 : 1;

        // Format nomor urut
        $transactionNumber = 'LA' . $yearMonth . sprintf('%05d', $sequence);

        $packages = Package::all();
        $customers = Customer::all();
        $users = User::all();
        return view('transaction.create', compact('transactionNumber', 'packages', 'customers'));  
    }

    public function store(Request $request)
    {
        // Validasi data yang diterima dari form
        $validatedData = $request->validate([
            'transactionDateTime' => 'required|date',
            'transactionStatus' => 'required|string|max:255',
            'transactionPayment' => 'required|numeric',
            'userEmail' => 'required|email',
            'customer_id' => 'required|integer',
            'package_id' => 'required|integer',
        ]);

        // Simpan data transaksi baru
        Transaction::create($validatedData);

        return redirect()->route('transactions.index')->with('success', 'Transaksi berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        // Validasi data yang diterima dari form
        $validatedData = $request->validate([
            'transactionDateTime' => 'required|date',
            'transactionStatus' => 'required|string|max:255',
            'transactionPayment' => 'required|numeric',
            'userEmail' => 'required|email',
            'customer_id' => 'required|integer',
            'package_id' => 'required|integer',
        ]);

        // Dapatkan transaksi yang akan diperbarui
        $transaction = Transaction::findOrFail($id);

        // Update data transaksi
        $transaction->update($validatedData);

        return redirect()->route('transactions.index')->with('success', 'Transaksi berhasil diperbarui.');
    }
}