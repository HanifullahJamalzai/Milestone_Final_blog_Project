<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(){
        return view('auth.login');
    }

    public function login(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6|max:255'
        ]);

        // exit();
        if(!auth()->attempt($request->only('email', 'password'))){
            return redirect()->back()->with('invalid', 'Invalid Login details');
        }
        else{
            auth()->attempt($request->only('email', 'password'), $request->remember);

            // One Way to display Flash message
            // session()->flash('success', 'Welcome Back'. auth()->user()->name);

            return redirect()->route('admin')->with('success', 'Welcome back Mr.'.auth()->user()->name);
        }
    }
}
