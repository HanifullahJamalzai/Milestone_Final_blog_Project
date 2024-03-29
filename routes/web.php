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
use App\Http\Controllers\Auth\FacebookLoginController;
use App\Http\Controllers\Auth\GithubLoginController;
use App\Http\Controllers\Auth\GoogleLoginController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\Landing\CommentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Landing\LandingController;
use App\Http\Controllers\Landing\ReplyController;

// Admin Related Routes 
Route::group(['prefix' => 'admin', 'middleware'=>['auth','MessageCountMiddleware', 'IsAccessToDashboard']], function(){
    Route::put('/register/{user}/update', [RegisterController::class, 'update'])->name('register.update');
    Route::put('/register/{user}/password', [RegisterController::class, 'UpdatePassword'])->name('user.password');
    Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');
    
    Route::get('/', [DashboardController::class, 'index'])->name('admin');
    Route::resource('about', AboutController::class);
    // Route::resource('category', CategoryController::class);
    Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
    Route::post('/category', [CategoryController::class, 'store'])->name('category.store');
    Route::get('/category/{category}/edit', [CategoryController::class, 'edit'])->name('category.edit');
    Route::put('/category/{category}/update', [CategoryController::class, 'update'])->name('category.update');
    Route::delete('/category/{category}/destroy', [CategoryController::class, 'destroy'])->name('category.destroy');
    
    Route::resource('message', MessageController::class);
    Route::resource('post', PostController::class);
    Route::resource('setting', SettingController::class);
    Route::resource('tag', TagController::class);
    Route::resource('team', TeamController::class);
    Route::resource('user', UserController::class);
    Route::resource('profile', ProfileController::class);
});


// Guest Related Routes
Route::middleware(['guest'])->group(function(){
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('login');

    Route::get('/register', [RegisterController::class, 'index'])->name('register');
    Route::post('/register', [RegisterController::class, 'store'])->name('register.store');
    Route::get('/verify',  [VerifyEmailController::class, 'index'])->name('verify.index');
    Route::get('/verify/{token}',  [VerifyEmailController::class, 'verifyToken']);
   
    // Google socialite routes 
    Route::get('/auth/google/redirect', [GoogleLoginController::class, 'handleRedirect'])->name('google.redirect');
    Route::get('/auth/google/callback', [GoogleLoginController::class, 'handleCallback'])->name('google.callback');
    
    // Github Socialite Routes
    Route::get('/auth/github/redirect', [GithubLoginController::class, 'handleRedirect'])->name('github.redirect');
    Route::get('/auth/github/callback', [GithubLoginController::class, 'handleCallback'])->name('github.callback');
    
    // Facebook Socialite Routes
    Route::get('/auth/facebook/redirect', [FacebookLoginController::class, 'handleRedirect'])->name('facebook.redirect');
    Route::get('/auth/facebook/callback', [FacebookLoginController::class, 'handleCallback'])->name('facebook.callback');
   
});


// Landing Related Routes
Route::middleware(['SettingMiddleware', 'LanguageSwitcher'])->group(function(){
    Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');

    Route::get('/', [LandingController::class, 'index'])->name('home');
    Route::get('/contact', [LandingController::class, 'contact'])->name('contact');
    Route::get('/about',[LandingController::class, 'about'])->name('about');
    Route::get('/latest',[LandingController::class, 'latest'])->name('latest');

    Route::get('/post/{post}/{slug?}',[LandingController::class, 'post'])->name('post');
    Route::get('/category/{category}/{slug?}',[LandingController::class, 'category'])->name('category');
    Route::get('/tag/{tag}/{slug?}',[LandingController::class, 'tag'])->name('tag');
    Route::get('/search',[LandingController::class, 'search'])->name('search');
    
    Route::get('language/{language}', function($language){
        session(['language' => $language]);
        // dd(session('language'));
        return back();
    })->name('language.switcher');
    
    // Message To Admin
    Route::post('/message',[LandingController::class, 'messageToAdmin'])->name('messageToAdmin');
    
    // Comment Related Routes
    Route::post('/comment/{post}', [CommentController::class, 'store'])->name('comment.store');
    Route::delete('/comment/{comment}', [CommentController::class, 'destroy'])->name('comment.destroy');
    Route::get('/comment/{comment}', [CommentController::class, 'edit'])->name('comment.edit');
    Route::put('/comment/{comment}', [CommentController::class, 'update'])->name('comment.update');

    // Reply Related Routes
    Route::post('/reply/{comment}', [ReplyController::class, 'store'])->name('reply.store');
    Route::delete('/reply/{reply}', [ReplyController::class, 'destroy'])->name('reply.destroy');
    Route::get('/reply/{reply}',    [ReplyController::class, 'edit'])->name('reply.edit');
    Route::put('/reply/{reply}',    [ReplyController::class, 'update'])->name('reply.update');
});
