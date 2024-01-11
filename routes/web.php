<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware(['guest'])->group(function(){

    // auth route
    Route::get('/',function(){
        return redirect()->route('login');
    });
    Route::get('/login', function(){
        return view('auth.login');
    })->name('login');

});


Route::middleware(['auth'])->group(function(){

    Route::get('/home', function(){
        return redirect()->route('dashboard');
    });

    Route::get('/logout', function(){
        Auth::logout();
        session()->flash('error',"Anda telah logout!!");
        return redirect()->route('login');
    })->name('logout');

    // dashboard route
    Route::get('/dashboard', function () {
        return view('dashboard.index');
    })->name('dashboard');


    // admin route
    Route::get('/admin', function(){
        return redirect()->route('admin.user');
    })->name('admin')->middleware('userAccess:admin');
    Route::get('/admin/users', function(){
        return view('admin.user');
    })->name('admin.user')->middleware('userAccess:admin');

    // stocks route
    Route::get('/stocks', function(){
        return view('stock.index');
    })->name('stock');


    // categories route
    Route::get('/categories', function(){
        return view('category.index');
    })->name('category');


    // units route
    Route::get('/units', function(){
        return view('unit.index');
    })->name('unit');


});

