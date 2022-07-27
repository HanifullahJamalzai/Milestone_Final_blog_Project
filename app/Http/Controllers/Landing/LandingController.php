<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Category;
use App\Models\Post;
use App\Models\Setting;
use Illuminate\Http\Request;
use App\Models\Tag;
use App\Models\Team;

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
        
        return view('landing.contact');
    } //End Method
    
    public function about(){
        
        return view('landing.about')
                    ->with('about', About::first())
                    ->with('team', Team::all());
    } //End Method

    public function post(Post $post, $slug = null){
        return view('landing.post', compact('post'));
                // ->with('post', Post::where('id', $id)->first());
    } //End Method

    public function category($id, $category = null){
        return view('landing.posts')
                ->with('posts',  Post::where('category_id', $id)->paginate(10))
                ->with('trends', Post::orderBy('visitor', 'desc')->with('user', 'category')->limit(6)->get())
                ->with('tags', Tag::take(50)->get());
    } //End Method
    
    public function tag(Tag $tag, $slug = null){
        $selected_posts = [];
        foreach($tag->posts as $post){
            array_push($selected_posts, $post->pivot->post_id);
        }

        return view('landing.posts')
                ->with('posts',  Post::whereIn('id',$selected_posts)->paginate(10))
                ->with('trends', Post::orderBy('visitor', 'desc')->with('user', 'category')->limit(6)->get())
                ->with('tags', Tag::take(50)->get());
    } //End Method

    public function posts($post){
        dd($post);
        return view('landing.contact')
                ->with('categories', Category::all());
    } // End Method

}
