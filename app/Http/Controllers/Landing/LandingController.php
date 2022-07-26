<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class LandingController extends Controller
{
    public function index(){
        return view('landing.index')
                    ->with('trends',    Post::orderBy('visitor', 'desc')->with('user')->limit(5)->get())
                    ->with('business',  Post::orderBy('visitor', 'desc')->where('category_id', 1)->with('category','user')->limit(7)->get())
                    ->with('culture',   Post::orderBy('visitor', 'desc')->where('category_id', 2)->with('category','user')->limit(10)->get())
                    ->with('lifestyle', Post::orderBy('visitor', 'desc')->where('category_id', 3)->with('category','user')->limit(10)->get());
    } //End Method
    
    public function contact(){
        
        return view('landing.contact')
                    ->with('categories', Category::all());
    } //End Method

    public function post($post){
        dd($post);
        return view('landing.contact')
                ->with('categories', Category::all());
    } //End Method

    public function posts($post){
        dd($post);
        return view('landing.contact')
                ->with('categories', Category::all());
    } // End Method

}
