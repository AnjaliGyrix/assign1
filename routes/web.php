<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
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

Route::get('/', function () {
    if (Auth::check()) {
        // The user is logged in...
        return redirect('home');
    }else{
        return view('auth/login');
    }
});

Auth::routes();



Route::group(['middleware' => ['auth']], function() {
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::get('/home/add',[HomeController::class, 'addUser']);

    Route::post('signup',[HomeController::class,'userSignup']);

    Route::get('delete/{id}',[HomeController::class,'delete']);

    Route::get('update/{id}',[HomeController::class,'updateData']);

    Route::post('update',[HomeController::class,'updateUser']);
});