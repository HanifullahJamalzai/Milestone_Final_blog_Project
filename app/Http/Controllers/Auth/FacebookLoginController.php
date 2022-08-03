<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class FacebookLoginController extends Controller
{
    public function handleRedirect(){
        return Socialite::driver('facebook')->redirect();
    }

    public function handleCallback(){
        // $user = Socialite::driver('google')->stateless()->user();
        $user = Socialite::driver('facebook')->user();
        // dd($user);
        $ifUserExist = User::where('oauth_id', $user->id)->where('oauth_type', 'facebook')->first();
       
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
            'oauth_type' => 'facebook',
        ]);
        auth()->login($newUser);
        return redirect()->route('home')->with('success', 'Welcome to our blog Mr.'.$user->name);
       }

    }
}
