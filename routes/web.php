<?php

use Illuminate\Support\Facades\Route;

// Admin Related Routes 
Route::middleware(['auth'])->group(function(){
    Route::get('/admin', function () {
        return view('admin.index');
    });
});


// Guest Related Routes
Route::middleware(['guest'])->group(function(){
    Route::get('/login', function () {
        return view('auth.login');
    })->name('login');

    Route::get('/register', function () {
        return view('auth.register');
    })->name('register');
});


// Landing Related Routes
Route::get('/', function () {
    return view('landing.index');
});

Route::get('/about', function () {
    return view('landing.about');
});

Route::get('/contact', function () {
    return view('landing.contact');
});

Route::get('/post', function () {
    return view('landing.post');
});

Route::get('/posts', function () {
    return view('landing.posts');
});
