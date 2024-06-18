<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Transaction;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */


     public function index()
     {
         $totalCustomers = Customer::count(); 
         $totalTransactions = Transaction::count();
         $transactionTotal = Transaction::sum('transactionTotal');
 
         return view('home', [
             'totalCustomers' => $totalCustomers,
             'totalTransactions' => $totalTransactions,
             'transactionTotal' => Transaction::sum('transactionTotal'),
         ]);
     }
    public function indexstaff()
    {
        return view('homestaff');
    }
}