<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
    public function index()
    {
        $Customer = Customer::all();
        return view('Customer.index', [
            'Customer' => $Customer
        ]);
    }

    public function create()
    {
        return view('Customer.create'); 
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'phone_no' => 'required',
            'street' => 'required',
        ])->validate();

        $Customer = Customer::create([
            $now = Carbon::now(),
            'name' => $request->name,
            'cust_code' => 'CUST' . $now->format('YmdHis'),
            'phone_no' => $request->phone_no,
            'street' => $request->street
        ]);

        return redirect('Customer');
    }

    public function edit($id)
    {
        $Customer = Customer::findOrFail($id);
        return view('Customer.edit', [
            'Customer' => $Customer
        ]);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'phone' => 'required',
            'street' => 'required',
        ])->validate();

        $Customer = Customer::findOrFail($id);
        $Customer->update($validator);

        return redirect('/Customer');
    }

    public function destroy($id)
    {
        $Customer = Customer::findOrFail($id);
        $Customer->delete();

        return redirect('/Customer');
    }
}