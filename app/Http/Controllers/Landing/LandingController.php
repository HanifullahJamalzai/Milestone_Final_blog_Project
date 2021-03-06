<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Setting;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index(){
        
        return view('landing.index')
                    ->with('trends', Post::orderBy('visitor', 'desc')->limit(5)->get())
                    ->with('setting', Setting::first())
                    ->with('categories', Category::all());
    } //End Method
    
    public function contact(){
        
        return view('landing.contact')
                    ->with('setting', Setting::first())
                    ->with('categories', Category::all());
    } //End Method

}
