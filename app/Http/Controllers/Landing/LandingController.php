<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Category;
use App\Models\Message;
use App\Models\Post;
use App\Models\Setting;
use Illuminate\Http\Request;
use App\Models\Tag;
use App\Models\Team;
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
        
        return view('landing.contact');
    } //End Method
    
    public function about(){
        
        return view('landing.about')
                    ->with('about', About::first())
                    ->with('team', Team::all());
    } //End Method

    public function post(Post $post, $slug = null){
        $tagElements = DB::table('post_tag')->select('tag_id')->distinct()->get();

        $selected_tags = [];
        foreach($tagElements as $tag){
            array_push($selected_tags, $tag->tag_id);
        }
        $tags = Tag::whereIn('id', $selected_tags)->get();
        

        return view('landing.posts')
                ->with('post', $post)
                ->with('posts',  Post::orderByDesc('id')->with('user', 'category')->paginate(10))
                ->with('trends', Post::orderBy('visitor', 'desc')->with('user', 'category')->limit(6)->get())
                ->with('tags', $tags);
    } //End Method

    public function category($id, $category = null){
        $tagElements = DB::table('post_tag')->select('tag_id')->distinct()->get();
        $selected_tags = [];
        foreach($tagElements as $tag){
            array_push($selected_tags, $tag->tag_id);
        }
        $tags = Tag::whereIn('id', $selected_tags)->get();
        
        return view('landing.posts')
                ->with('posts',  Post::where('category_id', $id)->paginate(10))
                ->with('trends', Post::orderBy('visitor', 'desc')->with('user', 'category')->limit(6)->get())
                ->with('tags', $tags);
    } //End Method
    
    public function tag(Tag $tag, $slug = null){
        
        $selected_posts = [];
        foreach($tag->posts as $post){
            array_push($selected_posts, $post->pivot->post_id);
        }

        $tagElements = DB::table('post_tag')->select('tag_id')->distinct()->get();

        $selected_tags = [];
        foreach($tagElements as $tag){
            array_push($selected_tags, $tag->tag_id);
        }
        $tags = Tag::whereIn('id', $selected_tags)->get();
        
        return view('landing.posts')
                ->with('posts',  Post::whereIn('id', $selected_posts)->with('user', 'category')->paginate(10))
                ->with('trends', Post::orderBy('visitor', 'desc')->with('user', 'category')->limit(6)->get())
                ->with('tags', $tags);
    } //End Method

    public function latest(){
        $tagElements = DB::table('post_tag')->select('tag_id')->distinct()->get();

        $selected_tags = [];
        foreach($tagElements as $tag){
            array_push($selected_tags, $tag->tag_id);
        }
        $tags = Tag::whereIn('id', $selected_tags)->get();
        
        return view('landing.posts')
                ->with('posts',  Post::orderByDesc('id')->with('user', 'category')->paginate(10))
                ->with('trends', Post::orderBy('visitor', 'desc')->with('user', 'category')->limit(6)->get())
                ->with('tags', $tags);
    } // End Method

    public function messageToAdmin(Request $request){
       $msg =  $request->validate([
            'name' => 'required|min:8|max:255',
            'email' => 'required|email|min:8|max:255',
            'subject' => 'required|min:8|max:255',
            'msg' => 'required|min:8',
        ]);
        
        Message::create($msg);
        return back()->with('success', 'We have successfully received  your message ASAP will respond to you, Thank You!');
    } // End Method

    public function search(Request $request)
    {
        $posts = Post::where('title', 'LIKE', "%$request->search%")
                    ->orWhere('description', 'LIKE', "%$request->search%")
                    ->paginate(10);

        $tagElements = DB::table('post_tag')->select('tag_id')->distinct()->get();

        $selected_tags = [];
        foreach($tagElements as $tag){
            array_push($selected_tags, $tag->tag_id);
        }
        $tags = Tag::whereIn('id', $selected_tags)->get();
        
        return view('landing.posts')
                ->with('posts',  $posts)
                ->with('trends', Post::orderBy('visitor', 'desc')->with('user', 'category')->limit(6)->get())
                ->with('tags', $tags);
    } // End Method

    // public function searchWithAlgolia(Request $request){
    //     // valiation
    //     $searchResult = Post::search($request->search);


    // }


}
