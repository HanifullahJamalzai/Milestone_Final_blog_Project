<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Landing\LandingController;

// Admin Related Routes 
Route::middleware(['auth'])->group(function(){
    Route::get('/admin', function () {
        return view('admin.index');
    });
    Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');
});


// Guest Related Routes
Route::middleware(['guest'])->group(function(){
    Route::get('/login', [LoginController::class, 'login'])->name('login');
    Route::post('/login', [LoginController::class, 'store'])->name('login');

    Route::get('/register', [RegisterController::class, 'register'])->name('register');
    // Route::post('/register', [RegisterController::class, 'UserRegister'])->name('UserRegister');
    Route::post('/register', [RegisterController::class, 'EditorRegister'])->name('EditorRegister');
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
