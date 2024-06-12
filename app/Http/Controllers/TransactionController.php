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
        $users = User::all();
        $customers = Customer::all();
        $packages = Package::all();
        $transactions = Transaction::all();
        return view('transaction.index', compact('transactions', 'users', 'customers', 'packages'));  
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
            'transactionNumber' => 'required|string|max:255',
            'transactionDateTime' => 'required|date',
            'transactionStatus' => 'required|string|max:255',
            'transactionPaymentMethod' => 'required|integer',
            'customer_id' => 'required|integer',
            'package_id' => 'required|integer',
        ]);

        $userEmail = auth()->user()->userEmail;

        // Simpan data transaksi baru
        Transaction::create([
            'transactionNumber' => $request->input('transactionNumber'),
            'transactionDateTime' => $request->input('transactionDateTime'),
            'transactionStatus' => $request->input('transactionStatus'),
            'transactionPaymentMethod' => $request->input('transactionPaymentMethod'),
            'userEmail' => $userEmail,
            'customer_id' => $request->input('customer_id'),
            'package_id' => $request->input('package_id'),
        ]);

        return redirect()->route('daftarTransaction')->with('success', 'Transaksi berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $transaction = Transaction::findOrFail($id);
        $customers = Customer::all();
        $packages = Package::all();
        return view('transaction.edit', compact('transaction', 'customers', 'packages'));
    }

    public function update(Request $request, $id)
    {
        // Validasi data yang diterima dari form
        $validatedData = $request->validate([
            'transactionNumber' => 'required|string|max:255',
            'transactionDateTime' => 'required|date',
            'transactionStatus' => 'required|string|max:255',
            'transactionPaymentMethod' => 'required|integer',
            'customer_id' => 'required|integer',
            'package_id' => 'required|integer',
        ]);

        $userEmail = auth()->user()->userEmail;

        // Dapatkan transaksi yang akan diperbarui
        $transaction = Transaction::findOrFail($id);

        // Update data transaksi
        $transaction->update($validatedData);

        return redirect()->route('daftarTransaction')->with('success', 'Transaksi berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $transaction = Transaction::findOrFail($id);
        $transaction->delete();
        return redirect()->route('daftarTransaction')->with('success', 'Transaksi berhasil dihapus.');
    }
}