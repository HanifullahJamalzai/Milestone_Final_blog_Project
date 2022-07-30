<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class GoogleLoginController extends Controller
{
    public function handleRedirect(){
        return Socialite::driver('google')->redirect();
    }

    public function handleCallback(){
        $user = Socialite::driver('google')->user();
        dd('hello');


        $ifExist = User::where('oauth_id', $user->id)->where('oauth_type', 'google')->first();
       
        if($ifExist){
            auth()->login($ifExist);
       }
       else{
        $fetched_user = User::create([
            'name' => $user->name,
            'email' => $user->email,
            'password' => bcrypt($user->id),
            'oauth_id' => $user->id,
            'oauth_type' => 'google',
            'photo' => $user->avatar,
        ]);
        auth()->login($fetched_user);
       }

       return redirect()->route('home')->with('success', 'Welcome to our blog');
    }
}
