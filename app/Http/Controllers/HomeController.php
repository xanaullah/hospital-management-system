<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Appoinment;
use PDO;

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
    public function appoinment(Request $request){
        $request->validate([
        'name'=>'required',
        'phone'=>'required',
        'date'=>'required',
        'doctor'=>'required',
        'email'=>'required',
        'phone'=>'required',

    ]);
$appoinment= new appoinment();
$appoinment->doctor=$request->doctor;
$appoinment->name=$request->name;
$appoinment->message=$request->message;
$appoinment->phone=$request->phone;
$appoinment->date=$request->date;
$appoinment->email=$request->email;
$appoinment->phone=$request->phone;
$appoinment->status='In Progress';

if(Auth::id()){
    $appoinment->user_id=Auth::user()->id;
}
$appoinment->save();
return redirect()->back();
}

public function myappoinment(){ 
    if(Auth::id()){
        $userid=Auth::user()->id;
$appoinments=Appoinment::where('user_id' , $userid)->get();
    return view('user.myappoinment' ,  compact('appoinments'));
    }
    else{
        return redirect()->back();
    }
}
public function cancle_appionment($id){
    $appoinment=Appoinment::find($id);
    $appoinment->delete();
    return redirect()->back();

}
}
