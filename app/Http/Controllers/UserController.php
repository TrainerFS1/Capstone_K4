<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class UserController extends Controller
{
    public function index()
    {
        $Users = User::all();
        return view('User.index', [
            'User' => $Users]);
    }

    public function create()
    {
        return view('User.create');
    }

    public function store(Request $request)
    {
        $validateData = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ])->validate();

        $User = User::create($validateData);
        $User->save();

        return redirect('/User')->with('success', 'Data Berhasilh');
    }
    
    public function edit($id)
    {
        $User = User::findOrFail($id);
        return view('User.edit', [
            'User' => $User
        ]);
    }

    public function update(Request $request, $id)
    {
        $validateData = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ])->validate();

        $User = User::findOrFail($id);
        $User->update($validateData);

        return redirect('/User')->with('success', 'Data Berhasilh');
    }

    public function destroy($id)
    {
        $User = User::findOrFail($id);
        $User->delete();
        return redirect('/User')->with('success', 'Data Berhasilh');
    }
}