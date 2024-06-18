<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{   

    public function index()
    {
        $users = User::all();
        return view('user.index', compact('users'));
    }
        
    public function create()
    {
        return view('user.create');
    }     

    public function store(Request $request)
    {
        $request->validate([
            'userFullName' => 'required|string|max:255',
            'userEmail' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'userType' => 'required|in:1,2',
        ]);

        User::create([
            'userFullName' => $request->userFullName,
            'userEmail' => $request->userEmail,
            'password' => Hash::make($request->password), // Hash the password
            'userType' => $request->userType,
        ]);

        return redirect()->route('indexUser')->with('success', 'User berhasil ditambahkan');
    }


    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('user.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'userFullName' => 'required|string|max:255',
            'userEmail' => 'required|email|max:255|unique:users,userEmail,' . $id,
            'password' => 'nullable|string|min:6',
            'userType' => 'required|in:1,2',
        ]);

        $user = User::findOrFail($id);
        $user->userFullName = $request->userFullName;
        $user->userEmail = $request->userEmail;
        if ($request->password) {
            $user->password = Hash::make($request->password); // Hash the password if it's present
        }
        $user->userType = $request->userType;
        $user->save();

        return redirect()->route('daftarUser')->with('success', 'User berhasil diperbarui.');
    }


    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('daftarUser')->with('success', 'User berhasil dihapus.');
    }

}