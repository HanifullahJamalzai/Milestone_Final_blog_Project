<?php

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Landing\LandingController;

// Admin Related Routes 
Route::group(['prefix' => 'admin', 'middleware'=>'auth'], function(){
    Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');
    Route::put('/register/{user}/update', [RegisterController::class, 'update'])->name('register.update');
    Route::put('/register/{user}/password', [RegisterController::class, 'UpdatePassword'])->name('user.password');
    
    Route::get('/', [DashboardController::class, 'index'])->name('admin');
    Route::resource('about', AboutController::class);
    // Route::resource('category', CategoryController::class);
    Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
    Route::post('/category', [CategoryController::class, 'store'])->name('category.store');
    Route::get('/category/{category}/edit', [CategoryController::class, 'edit'])->name('category.edit');
    Route::put('/category/{category}/update', [CategoryController::class, 'update'])->name('category.update');
    Route::get('/category/{category}/destroy', [CategoryController::class, 'destroy'])->name('category.destroy');
    
    Route::resource('message', MessageController::class);
    Route::resource('post', PostController::class);
    Route::resource('setting', SettingController::class);
    Route::resource('tag', TagController::class);
    Route::resource('team', TeamController::class);
    Route::resource('user', UserController::class);
    Route::resource('profile', ProfileController::class);
});

// Route::prefix('admin')->group(function () {
//     Route::middleware(['auth'])->group(function(){
        
//     });
// });



// Guest Related Routes
Route::middleware(['guest'])->group(function(){
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('login');

    Route::get('/register', [RegisterController::class, 'index'])->name('register');
    Route::post('/register', [RegisterController::class, 'store'])->name('register.store');
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
