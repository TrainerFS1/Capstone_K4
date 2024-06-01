<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TransactionController extends Controller
{
    public function index()
    {
        $Transaction = Transaction::all();
        return view('Transaction.index', [
            'Transaction' => $Transaction
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'courier' => 'required',
            'payment' => 'required',
            'total_price' => 'required',
        ])->validate();

        $Transaction = Transaction::create($validator);
        $Transaction->save();

        return redirect('/Transaction');
    }

    public function edit($id)
    {
        $Transaction = Transaction::findOrFail($id);
        return view('Transaction.edit', [
            'Transaction' => $Transaction
        ]);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'courier' => 'required',
            'payment' => 'required',
            'total_price' => 'required',
        ])->validate();

        $Transaction = Transaction::findOrFail($id);
        $Transaction->update($validator);

        return redirect('/Transaction');
    }

    public function destroy($id)
    {
        $Transaction = Transaction::findOrFail($id);
        $Transaction->delete();
        return redirect('/Transaction');
    }
}