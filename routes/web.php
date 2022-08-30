<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/home' , [HomeController::class  , 'redirect']);
Route::get('/' , [HomeController::class  , 'index']);
// Route for Add doctor View
Route::get('/add_doctor' , [AdminController::class  , 'addview'])->name('add_doctor_view');
// Route for upload information doctor
Route::post('/upload_doctor' , [AdminController::class , 'upload'])->name('upload_doctor');
// Route For Booking Appoinment
Route::post('/appoinment' , [HomeController::class , 'appoinment'])->name('appoinment');
//user Appoinment 
Route::get('/muappoinment' , [HomeController::class ,  'myappoinment'])->name('myappoinment');
//cancle appoinment 
Route::get('cancle_appoinment/{id}' , [HomeController::class , 'cancle_appionment'])->name('cancle_appoint');
//show All Appoiments to the Admin
Route::get('/showappoinments' , [AdminController::class ,  'showappoinments'])->name('showappoinments');
//Approve Status
Route::get('approve/{id}' , [AdminController::class , 'approve'])->name('approve');
//cancalled Appoinmet by admin
Route::get('cancalled/{id}' , [AdminController::class , 'cancalled'])->name('cancalled');
//Show aLL Doctor All doctor
Route::get('showdoctors' , [AdminController::class , 'showdoctors'])->name('showdoctors');
//update Single Doctor
route::get('deletedoctor/{id}' , [AdminController::class , 'deletedoctor'])->name('deletedoctor');

route::get('updatedoctor/{id}' , [AdminController::class , 'updatedoctor'])->name('updatedoctor');
Route::get('/login' , [HomeController::class  , 'login'])->name('login');
Route::get('/register' , [HomeController::class  , 'register'])->name('register');
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
