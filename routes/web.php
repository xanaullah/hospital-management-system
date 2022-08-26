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
Route::get('/' , [AdminController::class  , 'addview'])->name('add_doctor_view');

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
