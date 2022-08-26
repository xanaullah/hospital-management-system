<?php

namespace App\Http\Controllers;

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
    'room' => 'required|max:100',
]);
dd($request->all());

}
}
