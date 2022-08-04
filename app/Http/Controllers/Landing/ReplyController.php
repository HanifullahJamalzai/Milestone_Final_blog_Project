<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Reply;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class ReplyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $comment)
    {
        $data = $request->validate([
            'reply_description' => 'required|min:4'
        ]);

        Reply::create([
            'user_id' => auth()->user()->id,
            'comment_id' => $comment,
            'reply_description' => $data['reply_description'],
        ]);
        session()->flash('success', 'Congrats! Reply shared!');
        
        return back();

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
    public function edit(Reply $reply)
    {
        Gate::authorize('edit-reply', $reply);

        // dd($comment);
        return view('landing.post')
                ->with('post', Post::where('id', $reply->comment->post_id)->first())
                ->with('posts',  Post::orderByDesc('id')->with('user', 'category')->paginate(10))
                ->with('trends', Post::orderBy('visitor', 'desc')->with('user', 'category')->limit(6)->get())
                ->with('tags', $this->selected_tags())
                ->with('isReplyForEdit', $reply);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reply $reply)
    {
        Gate::authorize('IsReplyOwner', $reply);
        $data = $request->validate([
            'reply_description' => 'required|min:4'
        ]);

        $reply->update([
            'reply_description' => $data['reply_description'],
        ]);

        session()->flash('success', 'Congrats! Reply has successfully updated!');
        
        return redirect()->route('post', ['post' => $reply->comment->post_id, 'slug' => str()->slug($reply->comment->post->title, '-')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reply $reply)
    {
        Gate::authorize('IsReplyOwner', $reply);

        $reply->delete();
        session()->flash('success', 'Reply has been removed!');
        
        return back();
    }

    public function selected_tags(){
        $selected_tags = [];
        $tagElements = DB::table('post_tag')->select('tag_id')->distinct()->get();
        foreach($tagElements as $tag){
            array_push($selected_tags, $tag->tag_id);
        }
        $tags = Tag::whereIn('id', $selected_tags)->get();
        
      return $tags;
    } // End Method
}
