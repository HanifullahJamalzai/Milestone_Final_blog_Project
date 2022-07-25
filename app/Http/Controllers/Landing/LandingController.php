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
        $trends = Post::orderBy('visitor', 'desc')->limit(5)->get();
        return view('landing.index')
                    ->with('trends', $trends->only(['title','description','thumbnail_el']))    //Using only method we prevented n+1 query problem of eloquent Moreover, we declared that we don't need more data to be loaded in trends variable
                    ->with('business', Post::orderBy('visitor', 'desc')->where('category_id', 1)->limit(7)->get())
                    ->with('culture', Post::orderBy('visitor', 'desc')->where('category_id', 2)->limit(7)->get())
                    ->with('categories', Category::all());
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
