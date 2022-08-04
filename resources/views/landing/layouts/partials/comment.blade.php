<div class="comments">
    <h5 class="comment-title py-4">{{$post->comments->count()}} Comments</h5>
    @if ($post->comments->count())
      
    @foreach ($post->comments as $comment)
    <div class="comment d-flex mb-4">
          
      <div class="flex-shrink-0">
        <div class="avatar avatar-sm rounded-circle">
          <img class="avatar-img" src="{{$comment->user->photo}}" alt="" class="img-fluid">
        </div>
      </div>
      <div class="flex-grow-1 ms-2 ms-sm-3">
        <div class="comment-meta d-flex align-items-baseline">
          <h6 class="me-2">{{$comment->user->name}}</h6>
          <span class="text-muted">{{ $comment->created_at->diffForhumans() }}</span>
          
          @auth

              @can('edit-comment', $comment)
                
              {{-- @if(auth()->user()->id === $comment->user_id) --}}

              &nbsp;
              &nbsp;
              <span class="text-primary"><a href="{{ route('comment.edit', $comment) }}">edit</a></span>
              &nbsp;
              &nbsp;
              &nbsp;
              <span class="text-danger">
                <form action="{{ route('comment.destroy', $comment)}}" method="post">
                  @csrf
                  @method('delete')
                  <button type="submit" class="text-danger">delete</button>
                </form>
              </span>
            {{-- @endif --}}

            @endcan

          @endauth

        </div>
        <div class="comment-body">
          {{$comment->comment_description}}
        </div>
        

        <div class="comment-replies bg-light p-3 mt-3 rounded">
          <h6 class="comment-replies-title mb-4 text-muted text-uppercase">{{$comment->replies->count()}} Replies</h6>
          
          {{-- <div class="reply d-flex mb-4"> --}}
            @auth
              <div class="flex-shrink-0">
                <div class="avatar avatar-sm rounded-circle">
                  <img class="avatar-img" src="{{ auth()->user()->photo }}" alt="" class="img-fluid">
                </div>
              </div>
              <div class="flex-grow-1 ms-2 ms-sm-3">
                <div class="reply-meta d-flex align-items-baseline">
                  <h6 class="mb-0 me-2">{{ auth()->user()->name }}</h6>
                  <span class="text-muted">now</span>
                </div>
            @endauth

            @auth
              <form
              @if (isset($isReplyForEdit) && $isReplyForEdit->comment_id === $comment->id)
                  action="{{ route('reply.update', ['reply' => $isReplyForEdit]) }}"
              @else
                action="{{ route('reply.store',['comment' => $comment]) }}"
              @endif
              method="post">
                
              @if (isset($isReplyForEdit) && $isReplyForEdit->comment_id === $comment->id)
                  @method('put')
              @else
                  @method('post')
              @endif
              
                  @csrf

                  <div class="reply-body mb-4">
                    <textarea type="text" name="reply_description" placeholder="Reply.." rows="2" cols="100%">@if (isset($isReplyForEdit) && $isReplyForEdit->comment_id === $comment->id){{ $isReplyForEdit->reply_description }}@endif</textarea>
                    @if(isset($isReplyForEdit) && $isReplyForEdit->comment_id === $comment->id)
                        <button type="submit" class="btn btn-dark bg-primary text-white text-sm">Update Reply</button>
                    @else
                      <button type="submit" class="btn btn-dark bg-dark text-white text-sm">Add Reply</button>
                    @endif
                  </div>
                </form>
                
              </div>
            @endauth

          {{-- </div> --}}

          @if ($comment->replies)
            @foreach ($comment->replies as $reply)

            <div class="reply d-flex mb-4">
              <div class="flex-shrink-0">
                <div class="avatar avatar-sm rounded-circle">
                  <img class="avatar-img" src="{{ $reply->user->photo }}" alt="" class="img-fluid">
                </div>
              </div>
              <div class="flex-grow-1 ms-2 ms-sm-3">
                <div class="reply-meta d-flex align-items-baseline">
                  <h6 class="mb-0 me-2">{{ $reply->user->name }}</h6>
                  <span class="text-muted">{{  $reply->created_at->diffForhumans() }}</span>
                  @auth

              @can('edit-reply', $reply)
                
              {{-- @if(auth()->user()->id === $comment->user_id) --}}

              &nbsp;
              &nbsp;
              <span class="text-primary"><a href="{{ route('reply.edit', $reply) }}">edit</a></span>
              &nbsp;
              &nbsp;
              &nbsp;
              <span class="text-danger">
                <form action="{{ route('reply.destroy', $reply)}}" method="post">
                  @csrf
                  @method('delete')
                  <button type="submit" class="text-danger">delete</button>
                </form>
              </span>
            {{-- @endif --}}

            @endcan

          @endauth
                </div>
                <div class="reply-body">
                  {{$reply->reply_description}}
                </div>
              </div>
            </div>
            
            @endforeach

          @endif

          
          
        </div>
      </div>
    </div>
    
    @endforeach
    @endif
  </div>