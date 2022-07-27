@extends('landing.layouts.app')
@section('title', 'Home')

@section('contents')

    <!-- ======= Hero Slider Section ======= -->
    <section id="hero-slider" class="hero-slider">
        <div class="container-md" data-aos="fade-in">
          <div class="row">
            <div class="col-12">
              <div class="swiper sliderFeaturedPosts">
                <div class="swiper-wrapper">
                  @foreach ($trends as $trend)
                    <div class="swiper-slide">
                      <a href="{{ route('post', ['post' => $trend->id, 'slug' => Str::slug($trend->title, '-')]) }}" class="img-bg d-flex align-items-end" style="background-image: url('{{$trend->thumbnail_el}}');">
                        <div class="img-bg-inner">
                          <h2>{{ $trend->title }}</h2>
                          <p>{!! Str::limit($trend->description, 150) !!}</p>
                        </div>
                      </a>
                    </div>
                  @endforeach
  
                </div>

                <div class="custom-swiper-button-next">
                  <span class="bi-chevron-right"></span>
                </div>
                <div class="custom-swiper-button-prev">
                  <span class="bi-chevron-left"></span>
                </div>
  
                <div class="swiper-pagination"></div>
              </div>
            </div>
          </div>
        </div>
    </section>
    <!-- End Hero Slider Section -->
  



      <!-- ======= Post Grid Section ======= -->
      <section id="posts" class="posts">
        <div class="container" data-aos="fade-up">
          
          <div class="row g-5">
            <div class="col-lg-4">
              @if (isset($business[6]))
                <div class="post-entry-1 lg">
                  <a href="{{ route('post', ['post' => $business[6]->id , 'slug' => Str::slug($business[6]->title, '-') ]) }}"><img src="{{$business[6]->thumbnail_l}}" alt="{{$business[6]->title}}" class="img-fluid"></a>
                  <div class="post-meta"><span class="date">{{$business[6]->category->name}}</span> <span class="mx-1">&bullet;</span> <span>{{$business[6]->created_at->diffForhumans()}}</span></div>
                  <h2><a href="single-post.html">{{$business[6]->title}}</a></h2>
                  <p class="mb-4 d-block">{!! Str::limit($business[6]->description, 500) !!}</p>
    
                  <div class="d-flex align-items-center author">
                    <div class="photo"><img src="{{$business[6]->user->photo}}" alt="" class="img-fluid"></div>
                    <div class="name">
                      <h3 class="m-0 p-0">{{$business[6]->user->name}}</h3>
                    </div>
                  </div>
                </div>
              @endif
  
            </div>
  
            <div class="col-lg-8">
              <div class="row g-5">
                <div class="col-lg-4 border-start custom-border">
                  @if (isset($business[0]))
                  <div class="post-entry-1">
                    <a href="single-post.html"><img src="{{ $business[0]->thumbnail_m }}" alt="" class="img-fluid"></a>
                    <div class="post-meta"><span class="date">{{ $business[0]->category->name }}</span> <span class="mx-1">&bullet;</span> <span>{{ $business[0]->created_at->diffForHumans() }}</span></div>
                    <h2><a href="single-post.html">{{ $business[0]->title }}</a></h2>
                  </div>
                  @endif

                  @if (isset($business[1]))
                  <div class="post-entry-1">
                    <a href="single-post.html"><img src="{{ $business[1]->thumbnail_m }}" alt="" class="img-fluid"></a>
                    <div class="post-meta"><span class="date">{{ $business[1]->category->name }}</span> <span class="mx-1">&bullet;</span> <span>{{ $business[1]->created_at->diffForHumans() }}</span></div>
                    <h2><a href="single-post.html">{{ $business[1]->title }}</a></h2>
                  </div>
                  @endif

                  @if (isset($business[2]))
                  <div class="post-entry-1">
                    <a href="single-post.html"><img src="{{ $business[2]->thumbnail_m }}" alt="" class="img-fluid"></a>
                    <div class="post-meta"><span class="date">{{ $business[2]->category->name }}</span> <span class="mx-1">&bullet;</span> <span>{{ $business[2]->created_at->diffForHumans() }}</span></div>
                    <h2><a href="single-post.html">{{ $business[2]->title }}</a></h2>
                  </div>
                  @endif
                </div>

                <div class="col-lg-4 border-start custom-border">
                  @if (isset($business[3]))
                  <div class="post-entry-1">
                    <a href="single-post.html"><img src="{{ $business[3]->thumbnail_m }}" alt="" class="img-fluid"></a>
                    <div class="post-meta"><span class="date">{{ $business[3]->category->name }}</span> <span class="mx-1">&bullet;</span> <span>{{ $business[3]->created_at->diffForHumans() }}</span></div>
                    <h2><a href="single-post.html">{{ $business[3]->title }}</a></h2>
                  </div>
                  @endif
                  
                  @if (isset($business[4]))
                  <div class="post-entry-1">
                    <a href="single-post.html"><img src="{{ $business[4]->thumbnail_m }}" alt="" class="img-fluid"></a>
                    <div class="post-meta"><span class="date">{{ $business[4]->category->name }}</span> <span class="mx-1">&bullet;</span> <span>{{ $business[4]->created_at->diffForHumans() }}</span></div>
                    <h2><a href="single-post.html">{{ $business[4]->title }}</a></h2>
                  </div>
                  @endif

                  @if (isset($business[5]))
                  <div class="post-entry-1">
                    <a href="single-post.html"><img src="{{ $business[5]->thumbnail_m }}" alt="" class="img-fluid"></a>
                    <div class="post-meta"><span class="date">{{ $business[5]->category->name }}</span> <span class="mx-1">&bullet;</span> <span>{{ $business[5]->created_at->diffForHumans() }}</span></div>
                    <h2><a href="single-post.html">{{ $business[5]->title }}</a></h2>
                  </div>
                  @endif
                </div>
  
                <!-- Trending Section -->
                <div class="col-lg-4">
  
                  <div class="trending">
                    <h3>Trending</h3>
                    <ul class="trending-post">


                      @php $n=0; @endphp
                      @foreach ($trends as $trend)
                        <li>
                          <a href="single-post.html">
                            <span class="number">{{ ++$n}}</span>
                            <h3>{{ $trend->title }}</h3>
                            <span class="author"> {{ $trend->user->name }}</span>
                          </a>
                        </li>
                      @endforeach
                    </ul>
                  </div>
  
                </div> <!-- End Trending Section -->
              </div>
            </div>
  
          </div> <!-- End .row -->
        </div>
      </section> <!-- End Post Grid Section -->
  
      
      @if (isset($culture))
      <!-- ======= Culture Category Section ======= -->
      <section class="category-section">
        <div class="container" data-aos="fade-up">
  
          <div class="section-header d-flex justify-content-between align-items-center mb-5">
            <h2>Culture</h2>
            <div><a href="{{route('category', ['category' => $culture[0]->category->id, 'slug' => Str::slug($culture[0]->category->name, '-') ])}}" class="more">See All Culture</a></div>
          </div>
  
          <div class="row">
            <div class="col-md-9">

                <div class="d-lg-flex post-entry-2">
                  <a href="single-post.html" class="me-4 thumbnail mb-4 mb-lg-0 d-inline-block">
                    <img src="{{$culture[0]->thumbnail_l}}" alt="{{$culture[0]->title}}" class="img-fluid">
                  </a>
                  <div>
                    <div class="post-meta"><span class="date">{{$culture[0]->category->name}}</span> <span class="mx-1">&bullet;</span> <span>{{$culture[0]->created_at->diffForhumans()}}</span></div>
                    <h3><a href="single-post.html">{{$culture[0]->title}}</a></h3>
                    <p>{!! Str::limit($culture[0]->description, 200)!!}</p>
                    <div class="d-flex align-items-center author">
                      <div class="photo"><img src="{{$culture[0]->user->photo}}" alt="" class="img-fluid"></div>
                      <div class="name">
                        <h3 class="m-0 p-0">{{$culture[0]->user->name}}</h3>
                      </div>
                    </div>
                  </div>
                </div>
              
  
              <div class="row">
                <div class="col-lg-4">
                  <div class="post-entry-1 border-bottom">
                    <a href="single-post.html"><img src="{{$culture[1]->thumbnail_l}}" alt="" class="img-fluid"></a>
                    <div class="post-meta"><span class="date">{{$culture[1]->category->name}}</span> <span class="mx-1">&bullet;</span> <span>{{$culture[1]->created_at->diffForhumans()}}</span></div>
                    <h2 class="mb-2"><a href="single-post.html">{{$culture[1]->title}}</a></h2>
                    <span class="author mb-3 d-block">{{$culture[1]->user->name}}</span>
                    <p class="mb-4 d-block">{!! Str::limit($culture[1]->description, 150) !!}</p>
                  </div>
  
                  <div class="post-entry-1">
                    <div class="post-meta"><span class="date">{{$culture[2]->category->name}}</span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
                    <h2 class="mb-2"><a href="single-post.html">{{$culture[2]->title}}</a></h2>
                    <span class="author mb-3 d-block">{{$culture[2]->user->name}}</span>
                  </div>
                </div>
                <div class="col-lg-8">
                  <div class="post-entry-1">
                    <a href="single-post.html"><img src="{{$culture[3]->thumbnail_l}}" alt="{{$culture[3]->title}}" class="img-fluid"></a>
                    <div class="post-meta"><span class="date">{{$culture[3]->category->name}}</span> <span class="mx-1">&bullet;</span> <span>{{$culture[3]->created_at->diffForhumans()}}</span></div>
                    <h2 class="mb-2"><a href="single-post.html">{{$culture[3]->title}}</a></h2>
                    <span class="author mb-3 d-block">{{$culture[3]->user->name}}</span>
                    <p class="mb-4 d-block">{!! Str::limit($culture[3]->description, 300) !!}</p>
                  </div>
                </div>
              </div>
            </div>
  
            <div class="col-md-3">
              <div class="post-entry-1 border-bottom">
                <div class="post-meta"><span class="date">{{$culture[4]->category->name}}</span> <span class="mx-1">&bullet;</span> <span>{{$culture[4]->created_at->diffForhumans()}}</span></div>
                <h2 class="mb-2"><a href="single-post.html">{{$culture[4]->title}}</a></h2>
                <span class="author mb-3 d-block">{{$culture[4]->user->name}}</span>
              </div>
  
              <div class="post-entry-1 border-bottom">
                <div class="post-meta"><span class="date">{{$culture[5]->category->name}}</span> <span class="mx-1">&bullet;</span> <span>{{$culture[5]->created_at->diffForhumans()}}</span></div>
                <h2 class="mb-2"><a href="single-post.html">{{$culture[5]->title}}</a></h2>
                <span class="author mb-3 d-block">{{$culture[5]->user->name}}</span>
              </div>
  
              <div class="post-entry-1 border-bottom">
                <div class="post-meta"><span class="date">{{$culture[6]->category->name}}</span> <span class="mx-1">&bullet;</span> <span>{{$culture[6]->created_at->diffForhumans()}}</span></div>
                <h2 class="mb-2"><a href="single-post.html">{{$culture[6]->title}}</a></h2>
                <span class="author mb-3 d-block">{{$culture[6]->user->name}}</span>
              </div>
  
              <div class="post-entry-1 border-bottom">
                <div class="post-meta"><span class="date">{{$culture[7]->category->name}}</span> <span class="mx-1">&bullet;</span> <span>{{$culture[7]->created_at->diffForhumans()}}</span></div>
                <h2 class="mb-2"><a href="single-post.html">{{$culture[7]->title}}</a></h2>
                <span class="author mb-3 d-block">{{$culture[7]->user->name}}</span>
              </div>
  
              <div class="post-entry-1 border-bottom">
                <div class="post-meta"><span class="date">{{$culture[8]->category->name}}</span> <span class="mx-1">&bullet;</span> <span>{{$culture[8]->created_at->diffForhumans()}}</span></div>
                <h2 class="mb-2"><a href="single-post.html">{{$culture[8]->title}}</a></h2>
                <span class="author mb-3 d-block">{{$culture[8]->user->name}}</span>
              </div>
  
              <div class="post-entry-1 border-bottom">
                <div class="post-meta"><span class="date">{{$culture[9]->category->name}}</span> <span class="mx-1">&bullet;</span> <span>{{$culture[9]->created_at->diffForhumans()}}</span></div>
                <h2 class="mb-2"><a href="single-post.html">{{$culture[9]->title}}</a></h2>
                <span class="author mb-3 d-block">{{$culture[9]->user->name}}</span>
              </div>
            </div>
          </div>
        </div>
      </section><!-- End Culture Category Section -->
      @endif

      @if(isset($lifestyle))
      <!-- ======= Lifestyle Category Section ======= -->
      <section class="category-section">
        <div class="container" data-aos="fade-up">
  
          <div class="section-header d-flex justify-content-between align-items-center mb-5">
            <h2>Life Style</h2>
            <div><a href="{{ route('category', ['category' => $lifestyle[0]->category->id, 'slug' => Str::slug($lifestyle[0]->title, '-')]) }}" class="more">See All Life Style</a></div>
          </div>
  
          <div class="row">
            <div class="col-md-9 order-md-2">
  
              <div class="d-lg-flex post-entry-2">
                <a href="single-post.html" class="me-4 thumbnail d-inline-block mb-4 mb-lg-0">
                  <img src="{{$lifestyle[0]->thumbnail_l}}" alt="{{$lifestyle[0]->title}}" class="img-fluid">
                </a>
                <div>
                  <div class="post-meta"><span class="date">{{$lifestyle[0]->category->name}}</span> <span class="mx-1">&bullet;</span> <span>{{$lifestyle[0]->created_at->diffForhumans()}}</span></div>
                  <h3><a href="single-post.html">{{$lifestyle[0]->title}}</a></h3>
                  <p>{!! Str::limit($lifestyle[0]->description, 250) !!}</p>
                  <div class="d-flex align-items-center author">
                    <div class="photo"><img src="{{$lifestyle[0]->user->photo}}" alt="" class="img-fluid"></div>
                    <div class="name">
                      <h3 class="m-0 p-0">{{$lifestyle[0]->user->name}}</h3>
                    </div>
                  </div>
                </div>
              </div>
  
              <div class="row">
                <div class="col-lg-4">
                  <div class="post-entry-1 border-bottom">
                    <a href="single-post.html"><img src="{{$lifestyle[1]->thumbnail_m}}" alt="" class="img-fluid"></a>
                    <div class="post-meta"><span class="date">{{$lifestyle[1]->category->name}}</span> <span class="mx-1">&bullet;</span> <span>{{$lifestyle[1]->created_at->diffForhumans()}}</span></div>
                    <h2 class="mb-2"><a href="single-post.html">{{$lifestyle[1]->title}}</a></h2>
                    <span class="author mb-3 d-block">{{$lifestyle[1]->user->name}}</span>
                    <p class="mb-4 d-block">{!! Str::limit($lifestyle[1]->description, 100)!!}</p>
                  </div>
  
                  <div class="post-entry-1">
                    <div class="post-meta"><span class="date">{{$lifestyle[2]->category->name}}</span> <span class="mx-1">&bullet;</span> <span>{{$lifestyle[2]->created_at->diffForhumans()}}</span></div>
                    <h2 class="mb-2"><a href="single-post.html">{{$lifestyle[2]->title}}</a></h2>
                    <span class="author mb-3 d-block">{{$lifestyle[2]->user->name}}</span>
                  </div>
                </div>
                <div class="col-lg-8">
                  <div class="post-entry-1">
                    <a href="single-post.html"><img src="{{$lifestyle[3]->thumbnail_l}}" alt="" class="img-fluid"></a>
                    <div class="post-meta"><span class="date">{{$lifestyle[3]->category->name}}</span> <span class="mx-1">&bullet;</span> <span>{{$lifestyle[3]->created_at->diffForhumans()}}</span></div>
                    <h2 class="mb-2"><a href="single-post.html">{{$lifestyle[3]->title}}</a></h2>
                    <span class="author mb-3 d-block">{{$lifestyle[3]->user->name}}</span>
                    <p class="mb-4 d-block">{!! Str::limit($lifestyle[3]->description, 300) !!}</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="post-entry-1 border-bottom">
                <div class="post-meta"><span class="date">{{$lifestyle[4]->category->name}}</span> <span class="mx-1">&bullet;</span> <span>{{$lifestyle[4]->created_at->diffForhumans()}}</span></div>
                <h2 class="mb-2"><a href="single-post.html">{{$lifestyle[4]->title}}</a></h2>
                <span class="author mb-3 d-block">{{$lifestyle[4]->user->name}}</span>
              </div>
  
              <div class="post-entry-1 border-bottom">
                <div class="post-meta"><span class="date">{{$lifestyle[5]->category->name}}</span> <span class="mx-1">&bullet;</span> <span>{{$lifestyle[5]->created_at->diffForhumans()}}</span></div>
                <h2 class="mb-2"><a href="single-post.html">{{$lifestyle[5]->title}}</a></h2>
                <span class="author mb-3 d-block">{{$lifestyle[5]->user->name}}</span>
              </div>
  
              <div class="post-entry-1 border-bottom">
                <div class="post-meta"><span class="date">{{$lifestyle[6]->category->name}}</span> <span class="mx-1">&bullet;</span> <span>{{$lifestyle[6]->created_at->diffForhumans()}}</span></div>
                <h2 class="mb-2"><a href="single-post.html">{{$lifestyle[6]->title}}</a></h2>
                <span class="author mb-3 d-block">{{$lifestyle[6]->user->name}}</span>
              </div>
  
              <div class="post-entry-1 border-bottom">
                <div class="post-meta"><span class="date">{{$lifestyle[7]->category->name}}</span> <span class="mx-1">&bullet;</span> <span>{{$lifestyle[7]->created_at->diffForhumans()}}</span></div>
                <h2 class="mb-2"><a href="single-post.html">{{$lifestyle[7]->title}}</a></h2>
                <span class="author mb-3 d-block">{{$lifestyle[7]->user->name}}</span>
              </div>
  
              <div class="post-entry-1 border-bottom">
                <div class="post-meta"><span class="date">{{$lifestyle[8]->category->name}}</span> <span class="mx-1">&bullet;</span> <span>{{$lifestyle[8]->created_at->diffForhumans()}}</span></div>
                <h2 class="mb-2"><a href="single-post.html">{{$lifestyle[8]->title}}</a></h2>
                <span class="author mb-3 d-block">{{$lifestyle[8]->user->name}}</span>
              </div>
  
              <div class="post-entry-1 border-bottom">
                <div class="post-meta"><span class="date">{{$lifestyle[9]->category->name}}</span> <span class="mx-1">&bullet;</span> <span>{{$lifestyle[9]->created_at->diffForhumans()}}</span></div>
                <h2 class="mb-2"><a href="single-post.html">{{$lifestyle[9]->title}}</a></h2>
                <span class="author mb-3 d-block">{{$lifestyle[9]->user->name}}</span>
              </div>
            </div>
          </div>
        </div>
      </section><!-- End Lifestyle Category Section -->
      @endif
@endsection