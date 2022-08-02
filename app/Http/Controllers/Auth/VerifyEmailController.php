<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\VerifyUser;
use Carbon\Carbon;
use Illuminate\Http\Request;

class VerifyEmailController extends Controller
{
    public function index(){
        return view('auth.verify');
    }

    public function verifyToken($token){
        $isVerifyToken = VerifyUser::where('token', $token)->first();
        
        if(isset($isVerifyToken)){
            $userId = $isVerifyToken->user_id;
            $user= User::findOrFail($userId);
            $user->email_verified_at = Carbon::now();
            $user->save();
            session()->flash('success', 'You have successfully verified, please Login to proceed!');
            return view('auth.login');
        }else{
            dd('view');
            return view('auth.login')->with('error', 'token mismatch');
        }
    }
}
