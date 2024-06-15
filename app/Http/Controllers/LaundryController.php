<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\Package;

class LaundryController extends Controller
{
    public function index()
    {
        $packages = Package::all();
        $transactions = Transaction::all();
        // dd($packages);

        return view('laundry', compact('packages', 'transactions'));
    }
}