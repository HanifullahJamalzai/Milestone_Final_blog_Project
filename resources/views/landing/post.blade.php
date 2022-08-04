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
            @include('landing.layouts.partials.comment')
          <!-- End Comments -->


          <!-- ======= Comments Form ======= -->
          <div class="row justify-content-center mt-5">
            
            <div class="col-lg-12">
              <h5 class="comment-title">Leave a Comment</h5>
              <div class="row">
                

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
                      {{-- <a href="{{ route('linkedin.redirect') }}" class="btn btn-danger text-white">Login with Linkedin</a> --}}
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