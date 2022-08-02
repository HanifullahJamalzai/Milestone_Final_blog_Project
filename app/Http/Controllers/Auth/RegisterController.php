<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\VerifyUser as MailVerifyUser;
use App\Models\User;
use App\Models\VerifyUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
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
            'photo' => 'required',
        ]);

        // $user = new User();
        // $user->name = $request->name;
        // $user->email = $request->email;
        // $user->phone = $request->phone;
        // $user->role = 2;
        // $user->password = bcrypt($request->password);

        if($request->hasFile('photo')){
            $fileName = date('YmdHis').'_'.$request->name.'_'.rand(10,10000).'.'.$request->photo->extension();
            
            $img = Image::make($request->file('photo'));
            $img->resize(300, 300);
            $img->save('storage/images/users/'.$fileName);
            // $request->photo->storeAs('images', $fileName, 'public');
            // $user->photo = '/storage/images/users/'.$fileName;
            $photo = '/storage/images/users/'.$fileName;
        }

        // $user = $user->save();

        $user =  User::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'role' => 2,
                'password' => bcrypt($request->password),
                'photo'   => $photo
        ]);

        VerifyUser::create([
            'user_id' => $user->id,
            'token'   => str()->random(60),
        ]);

        Mail::to($user->email)->send(new MailVerifyUser($user));

        // auth()->attempt($request->only('email', 'password'));

        return view('auth.verify');
    }

    public function update(Request $request, User $user){
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            // 'email' => 'required|email|unique:users,email',
            'phone' => 'required|min:9|max:12',
        ]);

        // dd($request->all());
        // $user->name = $data['name'];
        // $user->email = $data['email'];
        // $user->phone = $data['phone'];

        if($request->hasFile('photo')){
            if(file_exists(public_path().'/'.$user->photo)){
                @unlink(public_path().'/'.$user->photo);
            }
            $fileName = date('YmdHis').'_'.$request->name.'_'.rand(10,10000).'.'.$request->photo->extension();
            $img = Image::make($request->file('photo'));
            $img->resize(300, 300);
            $img->save('storage/images/users/'.$fileName);
            $photo = '/storage/images/users/'.$fileName;
            // $user->photo = $photo;
        }

        // $user->save();

        
        $user->update([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'photo' => $request->hasFile('photo') ? $photo : $user->photo
        ]);

        auth()->login($user);
        return back();
    }

    public function UpdatePassword(Request $request, User $user){

        if(Hash::check($request->currentPassword, $user->password)){
            
            $data = $request->validate([
                'password' => 'required|confirmed|min:6|max:255'
            ]);

            $user->update(['password' => bcrypt($data['password'])]);

            auth()->login($user);
            
            return back()->with('success', 'Passwords changed successfully!');
        }else{
            dd('error');
            return back()->with('error', 'Passwords do not match!');
        }
    }
}
