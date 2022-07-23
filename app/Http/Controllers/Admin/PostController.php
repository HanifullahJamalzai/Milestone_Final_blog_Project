<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostStoreRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
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
                    ->with('posts', Post::orderBy('id', 'desc')->paginate(10));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.post.form')
                    ->with('categories', Category::all());
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

        Post::create([
            'user_id' => auth()->user()->id,
            'title'   => $request->title,
            'description' => $request->description,
            'category_id' => $request->category,
            'thumbnail_el' => $thumbnail_el,
            'thumbnail_l' => $thumbnail_l,
            'thumbnail_m' => $thumbnail_m,
            'thumbnail_s' => $thumbnail_s,
        ]);

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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function abc(){
        return 'abc';
    }
}
