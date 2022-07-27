@extends('landing.layouts.app')
@section('title', 'category')

@section('contents')
<section>
    <div class="container">
      <div class="row">

        <div class="col-md-9" data-aos="fade-up">
          <h3 class="category-title">Category: {{$posts[0]->category->name}}</h3>
          @foreach ($posts as $post)
            <div class="d-md-flex post-entry-2 half">
              <a href="{{ route('post', ['post' => $post, 'slug' => Str::slug($post->title, '-')]) }}" class="me-4 thumbnail">
                <img src="{{$post->thumbnail_l}}" alt="" class="img-fluid">
              </a>
              <div>
                <div class="post-meta"><span class="date">{{$post->category->name}}</span> <span class="mx-1">&bullet;</span> <span>{{$post->created_at->diffForhumans()}}</span></div>
                <h3><a href="{{ route('post', ['post' => $post, 'slug' => Str::slug($post->title, '-')]) }}">{{$post->title}}</a></h3>
                <p>
                  {!! Str::limit($post->description, 220, '...') !!}
                </p>
                <div class="d-flex align-items-center author">
                  <div class="photo"><img src="{{$post->user->photo}}" alt="" class="img-fluid"></div>
                  <div class="name">
                    <h3 class="m-0 p-0">{{$post->user->name}}</h3>
                  </div>
                </div>
              </div>
            </div>
          @endforeach


          {{-- <div class="text-start py-4">
            <div class="custom-pagination">

              <a href="#" class="prev">Prevous</a>
              <a href="#" class="active">1</a>
              <a href="#">2</a>
              <a href="#">3</a>
              <a href="#">4</a>
              <a href="#">5</a>
              <a href="#" class="next">Next</a>
            </div>
          </div> --}}
          {{$posts}}
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
                  <h2 class="mb-2"><a href="#">{{ $trend->title }}</a></h2>
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