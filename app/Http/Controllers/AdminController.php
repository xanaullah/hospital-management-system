<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;

class AdminController extends Controller
{
public function addview(){
return view('admin.add_doctor');
}  
public function upload(Request $request){
$validated = $request->validate([
    'name' => 'required|max:255',
     'phone' => 'required',
     'speciality' => 'required',
    'room' => 'required',
]);
$file = $request->file('image');
$extenstion = $file->getClientOriginalExtension();
$filename = time().'.'.$extenstion;
$file->move('uploads/Doctors/', $filename);
$doctor=new Doctor();
$doctor->room=$request->room;
$doctor->image=$filename;
$doctor->name=$request->name;
$doctor->phone=$request->phone;
$doctor->speciality=$request->speciality;
$doctor->save();
return back();
}
}
