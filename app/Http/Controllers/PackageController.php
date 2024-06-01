<?php

namespace App\Http\Controllers;

use App\Models\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PackageController extends Controller
{
    public function index()
    {
        $Package = Package::all();
        return view('Package.index', [
            'Package' => $Package
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
        ]);

        $Package = Package::create($validator->validated());
        $Package->save();
        return redirect('/Package');
    }

    public function edit($id)
    {
        $Package = Package::findOrFail($id);
        return view('Package.edit', [
            'Package' => $Package
        ]);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
        ])->validate();

        $Package = Package::findOrFail($id);
        $Package->update($validator);

        return redirect('/Package');
    }

    public function destroy($id)
    {
        $Package = Package::findOrFail($id);
        $Package->delete();
        return redirect('/Package');
    }

}