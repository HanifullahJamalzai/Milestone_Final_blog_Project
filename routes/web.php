<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Landing\LandingController;

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
Route::get('/', [LandingController::class, 'index'])->name('home');
Route::get('/contact', [LandingController::class, 'contact'])->name('contact');

Route::get('/about', function () {
    return view('landing.about');
})->name('about');


Route::get('/post', function () {
    return view('landing.post');
});

Route::get('/posts', function () {
    return view('landing.posts');
});
