<?php

namespace App\Http\Controllers;

use App\Models\Appoinment;
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
public function showappoinments(){
    $data=Appoinment::all();
    $data=Appoinment::all();
    $data=Appoinment::all();
    return view('admin.showappoinments' , compact('data'));
}
public function approve($id){
$data=appoinment::find($id);
$data->status='Approve';
$data->save();
return redirect()->back();
}

    public function cancalled($id){
        $data=appoinment::find($id);
        $data->status='cancalled';
        $data->save();
        return redirect()->back();  
    }
    public function showdoctors(){
        $doctors=Doctor::all();
        return view('admin.showdoctors' , compact('doctors'));
    }
    public function deletedoctor($id){
        $doctor=Doctor::find($id);
        $doctor->delete();
        return redirect()->back();
        
    }
    public function updatedoctor($id){
        $data=Doctor::find($id);
        return vi
    }

}
