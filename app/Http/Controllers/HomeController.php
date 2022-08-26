<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class HomeController extends Controller
{
    public function redirect()
    {
        if (auth::id()) {
            $doctors = Doctor::all();

            if (auth::user()->usertype == '0') {
                
                return view('user.home'  , compact('doctors'));
            } else {
                return view('admin.home');
            }
        }
    }
    public function index()
    {
        if(Auth::id()){
            return redirect('home');
        }
        else{}
        $doctors = Doctor::all();

        return view('user.home', compact('doctors'));
    }

    public function login()
    {
        return view('auth.login');
    }
    public function register()
    {
        return view('auth.register');
    }
}
