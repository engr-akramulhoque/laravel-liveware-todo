<?php

use App\Livewire\Auth\Signin;
use App\Livewire\Auth\Signup;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('sign-in', Signin::class)->name('sign-in');

Route::get('sign-up', Signup::class)->name('sign-up');

Route::middleware('auth')->group(function(){
    Route::get('/', function () {
        return view('welcome');
    })->name('home');

    Route::get('logout', function () {
        Auth::logout();
        return redirect()->route('sign-in');
    })->name('logout');
});