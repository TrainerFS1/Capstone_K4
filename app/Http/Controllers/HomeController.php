<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

    public function admin() 
    {
        // if (Auth::user()->UserType == 'Admin') {
        //     return redirect('/admin');
        // } else {
        //     return redirect('/homestaff');
        // }

        return view('home');
    }

    public function index()
    {
        return view('homestaff');
    }

}
