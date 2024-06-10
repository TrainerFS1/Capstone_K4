<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Package;

class LaundryController extends Controller
{
    public function index()
    {
        $packages = Package::all();
        // dd($packages);

        return view('laundry', compact('packages'));
    }
}