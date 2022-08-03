@extends('landing.layouts.app')
@section('title', 'Post')
@section('contents')
    
<section class="single-post-content">
    <div class="container">
      <div class="row">
        <div class="col-md-9 post-content" data-aos="fade-up">

          <!-- ======= Single Post Content ======= -->
          <div class="single-post">
            <div class="post-meta"><span class="date">{{ $post->category->name }}</span> <span class="mx-1">&bullet;</span> <span>{{ $post->created_at->diffForhumans() }}</span></div>
            <h1 class="mb-5"> {{ $post->title }} </h1>
            <figure class="my-4">
              <img src="{{ $post->thumbnail_el }}" alt="" class="img-fluid" style="width: 90%">
            </figure>
            <p><span class="firstcharacter">{!! Str::substr($post->description, 0, 1)  !!}</span> {!! $post->description !!}</p>
          </div>
          <!-- End Single Post Content -->

          <!-- ======= Comments ======= -->
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
                      @if (isset($isReplyForEdit))
                        @can ('update-reply', $isReplyForEdit, $comment)
                          action="{{ route('reply.update', ['reply' => $isReplyForEdit]) }}"
                        @endcan
                      @else
                        action="{{ route('reply.store',['comment' => $comment]) }}"
                      @endif
                      method="post">
                        
                      @if (isset($isReplyForEdit))
                        @can ('update-reply', $isReplyForEdit, $comment)
                          @method('put')
                        @endcan
                      @else
                          @method('post')
                      @endif
                      
                          @csrf

                          <div class="reply-body mb-4">
                            <textarea type="text" name="reply_description" placeholder="Reply.." rows="2" cols="100%">@if (isset($isReplyForEdit))
                                @can ('update-reply', $isReplyForEdit, $comment) {{ $isReplyForEdit->reply_description }}@endcan
                              @endif</textarea>
                            @if(isset($isReplyForEdit))
                              @can ('update-reply', $isReplyForEdit, $comment) 
                                <button type="submit" class="btn btn-dark bg-primary text-white text-sm">Update Reply</button>
                              @endcan
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
          <!-- End Comments -->


          <!-- ======= Comments Form ======= -->
          <div class="row justify-content-center mt-5">
            
            <div class="col-lg-12">
              <h5 class="comment-title">Leave a Comment</h5>
              <div class="row">
                
                {{-- @php dd($isCommentForEdit) @endphp --}}

                <form 
                  @if(isset($isCommentForEdit))
                    action="{{ route('comment.update', ['comment' => $isCommentForEdit]) }}"
                  @else
                    action="{{ route('comment.store', ['post' => $post]) }}"
                  @endif

                  method="post">

                  @if(isset($isCommentForEdit))
                    @method('put')
                  @else
                    @method('post')
                  @endif

                  @csrf

                  <div class="col-12 mb-3">
                    <textarea class="form-control" id="comment-message" name="comment_description" placeholder="Enter your comment here..." cols="30" rows="4"> @if(isset($isCommentForEdit)) {{ $isCommentForEdit->comment_description }} @endif</textarea>
                  </div>
  
                    @auth
                      <div class="col-12">
                        @if(isset($isCommentForEdit))
                          <input type="submit" class="btn btn-success bg-success" value="Update Comment">
                        @else
                          <input type="submit" class="btn btn-primary" value="Post comment">
                        @endif
                      </div>
                    @endauth
                </form>

                  @guest
                    <div class="col-12">
                      <a href="{{ route('google.redirect') }}" class="btn btn-danger text-white">Login with Google</a>
                      <a href="{{ route('github.redirect') }}" class="btn btn-dark text-white">Login with Github</a>
                      <a href="{{ route('facebook.redirect') }}" class="btn btn-primary text-white">Login with Facebook</a>
                      {{-- <a href="{{ route('google.redirect') }}" class="btn btn-danger text-white">Login with Google</a> --}}
                    </div>
                  @endguest
                  
              </div>
              </div>


          </div>
          <!-- End Comments Form -->

        </div>


        <div class="col-md-3">
          <!-- ======= Sidebar ======= -->
          <div class="aside-block">

            <ul class="nav nav-pills custom-tab-nav mb-4" id="pills-tab" role="tablist">
              <li class="nav-item" role="presentation">
                <button class="nav-link active" id="pills-popular-tab" data-bs-toggle="pill" data-bs-target="#pills-popular" type="button" role="tab" aria-controls="pills-popular" aria-selected="true">Popular</button>
              </li>
            </ul>

            <div class="tab-content" id="pills-tabContent">

              <!-- Popular -->
              <div class="tab-pane fade show active" id="pills-popular" role="tabpanel" aria-labelledby="pills-popular-tab">
                @foreach ($trends as $trend)
                    
                <div class="post-entry-1 border-bottom">
                  <div class="post-meta"><span class="date">{{$trend->category->name}}</span> <span class="mx-1">&bullet;</span> <span>{{$trend->created_at->diffForhumans()}}</span></div>
                  <h2 class="mb-2"><a href="{{route('post', ['post' => $trend, 'slug' => Str::slug($trend->title, '-') ]) }}">{{ $trend->title }}</a></h2>
                  <span class="author mb-3 d-block">{{ $trend->user->name }}</span>
                </div>
                
                @endforeach
              </div> <!-- End Popular -->

            </div>
          </div>
          
          <div class="aside-block">
            <h3 class="aside-title">Categories</h3>
            <ul class="aside-links list-unstyled">
              @foreach ($categories as $category)
                <li><a href="{{ route('category', ['category' => $category, 'slug' => Str::slug($category->name, '-')]) }}"><i class="bi bi-chevron-right"></i>{{ $category->name }}</a></li>
              @endforeach
            </ul>
          </div><!-- End Categories -->

          <div class="aside-block">
            <h3 class="aside-title">Tags</h3>
            <ul class="aside-tags list-unstyled">
              @foreach ($tags as $tag)
                <li><a href="{{  route('tag', ['tag' => $tag, 'slug' => Str::slug($tag->name, '-')]) }}">{{$tag->name}}</a></li>
              @endforeach
            </ul>
          </div><!-- End Tags -->

        </div>
      </div>
    </div>
  </section>
@endsection