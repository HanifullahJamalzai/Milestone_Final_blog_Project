<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function register(){
        return view('auth.register');
    }

    public function EditorRegister(Request $request){
        // dd($request->all());
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:6|max:10',
            'phone' => 'required|min:9|max:12',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->role = $request->role ? $request->role : 3;
        $user->password = bcrypt($request->password);

        if($request->hasFile('photo')){
            $fileName = date('YmdHis').'_'.$request->name.'_'.rand(10,10000).'.'.$request->photo->extension();
            $request->photo->storeAs('images', $fileName, 'public');
            $user->photo = 'storage/images/'.$fileName;
        }

        $user->save();
        auth()->attempt($request->only('email', 'password'));

        return redirect()->route('home');
    }

    public function UserRegister(Request $request){
        return 'socialite';
    }
}
