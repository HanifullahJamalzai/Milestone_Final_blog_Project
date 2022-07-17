<?php

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Landing\LandingController;

// Admin Related Routes 
Route::group(['prefix' => 'admin', 'middleware'=>'auth'], function(){
    Route::get('/', [DashboardController::class, 'index'])->name('admin');
    Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');
    Route::resource('about', AboutController::class);
    Route::resource('category', AboutController::class);
    Route::resource('message', AboutController::class);
    Route::resource('post', AboutController::class);
    Route::resource('setting', AboutController::class);
    Route::resource('tag', AboutController::class);
    Route::resource('team', AboutController::class);
    Route::resource('user', AboutController::class);
});

// Route::prefix('admin')->group(function () {
//     Route::middleware(['auth'])->group(function(){
        
//     });
// });



// Guest Related Routes
Route::middleware(['guest'])->group(function(){
    Route::get('/login', [LoginController::class, 'login'])->name('login');
    Route::post('/login', [LoginController::class, 'store'])->name('login');

    Route::get('/register', [RegisterController::class, 'register'])->name('register');
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
