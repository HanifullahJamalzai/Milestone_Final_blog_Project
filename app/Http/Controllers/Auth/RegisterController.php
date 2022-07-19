<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;

class RegisterController extends Controller
{
    public function index(){
        return view('auth.register');
    }

    public function store(Request $request){
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
        $user->role = 2;
        $user->password = bcrypt($request->password);

        if($request->hasFile('photo')){
            $fileName = date('YmdHis').'_'.$request->name.'_'.rand(10,10000).'.'.$request->photo->extension();
            
            $img = Image::make($request->file('photo'));
            $img->resize(300, 300);
            $img->save('storage/images/users/'.$fileName);
            // $request->photo->storeAs('images', $fileName, 'public');
            $user->photo = '/storage/images/users/'.$fileName;
        }

        $user->save();
        auth()->attempt($request->only('email', 'password'));

        return redirect()->route('admin');
    }

    public function update(Request $request, User $user){
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|min:9|max:12',
        ]);
        
        dd($request->all());

        if($request->hasFile('photo')){
            if(file_exists(public_path().'/'.$user->photo)){
                @unlink(public_path().'/'.$user->photo);
            }
            $fileName = date('YmdHis').'_'.$request->name.'_'.rand(10,10000).'.'.$request->photo->extension();
            $img = Image::make($request->file('photo'));
            $img->resize(300, 300);
            $img->save('storage/images/users/'.$fileName);
            $photo = '/storage/images/users/'.$fileName;
        }


        $user->update([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'photo' => $photo,
        ]);

        return back();

    }
}
