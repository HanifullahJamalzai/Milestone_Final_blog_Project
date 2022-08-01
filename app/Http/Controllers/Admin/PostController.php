<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostStoreRequest;
use App\Http\Requests\PostUpdateRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Intervention\Image\ImageManagerStatic as Image;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.post.index')
                    ->with('posts', Post::where('user_id', auth()->user()->id)->orderBy('id', 'desc')->paginate(10));
                    // ->with('posts', Post::orderBy('id', 'desc')->withTrashed()->paginate(10));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.post.form')
                    ->with('categories', Category::all())
                    ->with('tags', Tag::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostStoreRequest $request)
    {
        if($request->hasFile('photo')){
            $fileName = date('YmdHis').'_'.$request->title.'_'.rand(10,10000).'.'.$request->photo->extension();
            
            $img = Image::make($request->file('photo'));
            $img->resize(1947, 843);
            $img->save('storage/images/posts/thumbnail_el/'.$fileName);
            $thumbnail_el = '/storage/images/posts/thumbnail_el/'.$fileName;
            
            $img->resize(512, 334);
            $img->save('storage/images/posts/thumbnail_l/'.$fileName);
            $thumbnail_l = '/storage/images/posts/thumbnail_l/'.$fileName;

            $img->resize(320, 210);
            $img->save('storage/images/posts/thumbnail_m/'.$fileName);
            $thumbnail_m = '/storage/images/posts/thumbnail_m/'.$fileName;

            $img->resize(100, 100);
            $img->save('storage/images/posts/thumbnail_s/'.$fileName);
            $thumbnail_s = '/storage/images/posts/thumbnail_s/'.$fileName;
        }

        // Post::create([
        //     'user_id'     => auth()->user()->id,
        //     'title'       => $request->title,
        //     'description' => $request->description,
        //     'category_id' => $request->category,
        //     'thumbnail_el'=> $thumbnail_el,
        //     'thumbnail_l' => $thumbnail_l,
        //     'thumbnail_m' => $thumbnail_m,
        //     'thumbnail_s' => $thumbnail_s,
        // ]);

        $post = auth()->user()->posts()->create([
            'title'       => $request->title,
            'description' => $request->description,
            'category_id' => $request->category,
            'thumbnail_el'=> $thumbnail_el,
            'thumbnail_l' => $thumbnail_l,
            'thumbnail_m' => $thumbnail_m,
            'thumbnail_s' => $thumbnail_s,
        ]);

        $post->tags()->attach($request->tag);
        

        session()->flash('success', 'Post has been created successfully!');
        return redirect()->route('post.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        Gate::authorize('update', $post);

        $categories = Category::all();
        $tags = Tag::all();
        $selected_tags = [];
        foreach($post->tags as $tag){
            array_push($selected_tags, $tag->pivot->tag_id);
        }
        
        return view('admin.post.form', compact('post', 'categories', 'tags', 'selected_tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostUpdateRequest $request, Post $post)
    {
        Gate::authorize('update', $post);

        if($request->hasFile('photo')){
            @unlink(public_path().'/'.$post->thumbnail_s);
            @unlink(public_path().'/'.$post->thumbnail_m);
            @unlink(public_path().'/'.$post->thumbnail_l);
            @unlink(public_path().'/'.$post->thumbnail_el);
            
            $fileName = date('YmdHis').'_'.$request->title.'_'.rand(10,10000).'.'.$request->photo->extension();
            
            $img = Image::make($request->file('photo'));
            $img->resize(1947, 843);
            $img->save('storage/images/posts/thumbnail_el/'.$fileName);
            $thumbnail_el = '/storage/images/posts/thumbnail_el/'.$fileName;
            $post->thumbnail_el = $thumbnail_el;
            
            $img->resize(512, 334);
            $img->save('storage/images/posts/thumbnail_l/'.$fileName);
            $thumbnail_l = '/storage/images/posts/thumbnail_l/'.$fileName;
            $post->thumbnail_l = $thumbnail_l;
            
            $img->resize(320, 210);
            $img->save('storage/images/posts/thumbnail_m/'.$fileName);
            $thumbnail_m = '/storage/images/posts/thumbnail_m/'.$fileName;
            $post->thumbnail_m = $thumbnail_m;
            
            $img->resize(100, 100);
            $img->save('storage/images/posts/thumbnail_s/'.$fileName);
            $thumbnail_s = '/storage/images/posts/thumbnail_s/'.$fileName;
            $post->thumbnail_s = $thumbnail_s;
        }

        $post->title       = $request->title;
        $post->description = $request->description;
        $post->category_id = $request->category;
        
        if($request->tag){
            $post->tags()->detach();
            $post->tags()->attach($request->tag);
        }

        $post->save();

        session()->flash('success', 'Post has been updated successfully!');
        return redirect()->route('post.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        Gate::authorize('delete', $post);

        $post->delete();
        // $post->forceDelete();
        // $post->restore();
        return back()->with('success', 'Post has been deleted');
    }
}
