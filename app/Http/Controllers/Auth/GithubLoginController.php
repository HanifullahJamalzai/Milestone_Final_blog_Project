<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class GithubLoginController extends Controller
{
    public function handleRedirect(){
        return Socialite::driver('github')->redirect();
    }

    public function handleCallback(){
        $user = Socialite::driver('github')->stateless()->user();
        // $user = Socialite::driver('github')->user();
        // dd($user);
        $ifUserExist = User::where('oauth_id', $user->id)->where('oauth_type', 'github')->first();
       
        if($ifUserExist){
            auth()->login($ifUserExist);
            return redirect()->route('home')->with('success', 'Welcome Back to our blog Mr.'.$user->name);
       }
       else{
        $newUser = User::create([
            'name' => $user->name,
            'email' => $user->email,
            'password' => bcrypt($user->id),
            'photo' => $user->avatar,
            'phone' => '1234567890',
            'role' => 3,
            'oauth_id' => $user->id,
            'oauth_type' => 'github',
        ]);
        auth()->login($newUser);
        return redirect()->route('home')->with('success', 'Welcome to our blog Mr.'.$user->name);
       }

    }
}
