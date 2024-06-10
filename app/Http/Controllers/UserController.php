<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

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
        // Validasi data yang diterima dari form
        $validatedData = $request->validate([
            'userFullName' => 'required|string|max:255',
            'userEmail' => 'required|email|unique:users|max:255',
            'password' => 'required|string|min:6',
            'userType' => 'required|in:1,2',
        ]);

        $user = new User();
        $user->userFullName = $request->userFullName;
        $user->userEmail = $request->userEmail;
        $user->password = bcrypt($request->password); // Jangan lupa untuk mengenkripsi password
        $user->userType = $request->userType;
        $user->save();

        return redirect()->route('daftarUser')->with('success', 'User berhasil ditambahkan.');
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
            $user->password = bcrypt($request->password);
        }
        $user->userType = $request->userType;
        $user->save();

        return redirect()->route('daftarUser')->with('success', 'User berhasil diperbarui.');
    }


}