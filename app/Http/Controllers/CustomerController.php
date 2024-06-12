<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::all();
        $totalCustomers = $customers->count();
        return view('customer.index', ['customers' => $customers, 'totalCustomers' => $totalCustomers]);
    }

    public function create()
    {
        $customers = \App\Models\Customer::all();
        return view('customer.create', [
        'customers' => $customers
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = validator($request->all(), [
            'customerName' => 'required|string|max:255',
            'customerPhoneNumber' => 'required|string',
            'customerStreet' => 'required|string',
        ])->validate();
    
        $customer = new Customer($validatedData);
        $customer->save();
    
        return redirect(route('daftarCustomer'))->with('success', 'Data Berhasil Disimpan');
    }

    public function show(Customer $customer)
    {
        //
    }

    public function edit(string $id)
    {
        $customer = Customer::findOrFail($id); 
        return view('customer.edit', [
        'customer' => $customer
        ]);
    }

    public function update(Request $request, $id)
    {
        $validatedData = validator($request->all(), [
            'customerName' => 'required|string|max:255',
            'customerPhoneNumber' => 'required|string',
            'customerStreet' => 'required|string',
            ])->validate();
    
            $customer = Customer::findOrFail($id); 
    
            $customer->update([
            'customerName'            => $request->customerName,
            'customerPhoneNumber'     => $request->customerPhoneNumber,
            'customerStreet'          => $request->customerStreet,
            ]);
    

        return redirect(route('daftarCustomer'))->with('success', 'Data Berhasil Disimpan');
    }
    
    public function destroy($id)
    {
        $customer = Customer::findOrFail($id);
        $customer->delete();
        return redirect()->route('daftarCustomer')->with('success', 'Data berhasil dihapus.');
    }

    
}