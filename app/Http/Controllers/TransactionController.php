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
        $transactionTotal = Transaction::sum('transactionTotal');
        $totalTransactions = $transactions->count();
        
        return view('transaction.index', [
            'transactions' => $transactions,
            'users' => $users,
            'customers' => $customers,
            'packages' => $packages,
            'totalTransactions' => $totalTransactions,
            'transactionTotal' => $transactionTotal,
        ]);
    }

    public function create()
    {
        $currentDate = Carbon::now();
        $yearMonth = $currentDate->format('ymdhi');

        // Mendapatkan nomor urut terakhir untuk bulan ini
        $lastTransaction = Transaction::where('transactionNumber', 'like', 'LA' . $yearMonth . '%')->latest()->first();
        $sequence = $lastTransaction ? intval(substr($lastTransaction->transactionNumber, -5)) + 1 : 1;
        $transactionNumber = 'LA' . $yearMonth . sprintf('%03d', $sequence);

        $packages = Package::all();
        $customers = Customer::all();
        $users = User::all();
        
        return view('transaction.create', compact('transactionNumber', 'packages', 'customers', 'users',));  
    }

    public function store(Request $request)
    {
        // Validasi data yang diterima dari form
        $validatedData = $request->validate([
            'transactionNumber' => 'required|string|max:255',
            'transactionDateTime' => 'required|date',
            'amount' => 'required|integer',
            'transactionStatus' => 'required|string|max:255',
            'transactionPaymentMethod' => 'required|integer',
            'customer_id' => 'required|integer',
            'package_id' => 'required|integer',
        ]);
        
        $userEmail = auth()->user()->userEmail;
        $package_id = $request->input('package_id');
        $price = Package::find($package_id)->packagePrice;
        $amount = $request->input('amount');
        $transactionTotal = $amount * $price;

        // Dapatkan nama pelanggan berdasarkan customer_id
        $customerName = Customer::findOrFail($request->input('customer_id'))->customerName;

        // Simpan data transaksi baru
        Transaction::create([
            'transactionNumber' => $request->input('transactionNumber'),
            'transactionDateTime' => $request->input('transactionDateTime'),
            'transactionStatus' => $request->input('transactionStatus'),
            'transactionTotal' => $transactionTotal,
            'amount' => $amount,
            'transactionPaymentMethod' => $request->input('transactionPaymentMethod'),
            'userEmail' => $userEmail,
            'customer_id' => $request->input('customer_id'),
            'package_id' => $package_id,
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
        // Validate the incoming data
        $validatedData = $request->validate([
            'transactionDateTime' => 'required|date',
            'package_id' => 'required|integer',
            'amount' => 'required|integer',
            'customer_id' => 'required|integer',
            'transactionStatus' => 'required|string|max:255',
            'transactionPaymentMethod' => 'required|integer',
        ]);
    
        // Find the transaction by ID
        $transaction = Transaction::findOrFail($id);
    
        // Update the transaction with validated data
        $transaction->update($validatedData);
    
        // Redirect back with a success message
        return redirect()->route('daftarTransaction')->with('success', 'Transaction updated successfully.');
    }
    


    public function destroy($id)
    {
        $transaction = Transaction::findOrFail($id);
        $transaction->delete();
        return redirect()->route('daftarTransaction')->with('success', 'Transaksi berhasil dihapus.');
    }

    public function show($id)
    {
        $customers = Customer::all();
        $packages = Package::all();
        $transaction = Transaction::findOrFail($id);
        return view('transaction.show', compact('transaction', 'customers', 'packages'));
    }

    public function search(Request $request)
    {
        $keyword = $request->input('keyword');
        $transactions = Transaction::where('transactionNumber', 'like', '%' . $keyword . '%')->get();

        return view('transaction.search', compact('transactions'));
    }

    public function printReceipt($id)
    {
        // Logika untuk mengambil data transaksi berdasarkan $id
        $transaction = Transaction::findOrFail($id);

        // Lakukan proses pencetakan struk di sini

        // Redirect atau kembalikan view untuk menampilkan struk
        return view('transaction.print-receipt', compact('transaction'));
    }


}