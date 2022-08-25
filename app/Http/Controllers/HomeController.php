<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class HomeController extends Controller
{
    public function redirect(){
        if(auth::id()){
            if(auth::user()->usertype=='0'){
                return view('user.home');
            }
            else{
                return view('admin.home');
            }
        }
    }
    public function index(){
        return view('user.home');
    }
    public function login(){
        return view('auth.login');
    }
    public function register(){
        return view('auth.register');
    }
}
