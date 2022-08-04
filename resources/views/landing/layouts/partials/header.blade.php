
<header id="header" class="header d-flex align-items-center fixed-top">
  
  
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
     
    
      <a href="{{route('home')}}" class="logo d-flex align-items-center">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <h1>Laravel Blog</h1>
      </a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="{{route('home')}}">{{  __('index.home') }}</a></li>
          <li><a href="{{ route('latest') }}">{{ __('index.latest blog') }}</a></li>
          <li class="dropdown"><a href="#"><span>{{ __('index.categories') }}</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
            <ul>
              @foreach ($categories as $category)
                <li><a href="{{ route('category', ['category' => $category, 'slug' => Str::slug($category->name,)]) }}">{{$category->name}}</a></li>
              @endforeach
            </ul>
          </li>

          <li><a href="{{ route('about') }}">{{ __('index.about') }}</a></li>
          <li><a href="{{ route('contact') }}">{{ __('index.contact') }}</a></li>
        </ul>
      </nav><!-- .navbar -->

      <div class="position-relative">
        <a href="{{ $setting->fb_url }}" class="mx-2"><span class="bi-facebook"></span></a>
        <a href="{{ $setting->twitter_url }}" class="mx-2"><span class="bi-twitter"></span></a>
        <a href="{{ $setting->instagram_url }}" class="mx-2"><span class="bi-instagram"></span></a>
        
        <a href="#" class="mx-2 js-search-open"><span class="bi-search"></span></a>
        <i class="bi bi-list mobile-nav-toggle"></i>
        
        <!-- ======= Search Form ======= -->
        <div class="search-form-wrap js-search-form-wrap">
          <form action="{{route('search')}}" class="search-form">
            @csrf
            @method('GET')

            <span class="icon bi-search"></span>
            <input type="text" name="search" placeholder="Search" class="form-control">
            <input type="hidden" name="" class="js-search-close">
            <button type="submit" class="btn text-sm" style="border: 1px solid black;">
              search
            </button>
          </form>
        </div><!-- End Search Form -->
        <a class="en" href="{{ route('language.switcher', ['language'=> 'en']) }}" style="border: 1px solid black; padding: 0.2em 0.4em; border-radius: 5px; color: black; font-weight: bold; @if(app()->getlocale() == 'en') background: black; color: white; @endif ">EN</a>
        <a class="fa" href="{{ route('language.switcher', ['language'=> 'fa']) }}" style="border: 1px solid green; padding: 0.2em 0.4em; border-radius: 5px; color: green; font-weight: bold; @if(app()->getlocale() == 'fa') background: green; color: white; @endif">FA</a>
        <a class="pa" href="{{ route('language.switcher', ['language'=> 'pa']) }}" style="border: 1px solid red; padding: 0.2em 0.4em; border-radius: 5px; color: red; font-weight: bold; @if(app()->getlocale() == 'pa') background: red; color: white; @endif ">PA</a>
          
        </div>
        @if (auth()->check())
        <span class="text-black" style="font: bold; cursor: pointer;">{{ auth()->user()->name }}</span>
        <a href="{{ route(Route::currentRouteName()) }}">
          <img src="{{auth()->user()->photo}}" alt="" width="40px" class="rounded-50" style="border-radius: 50%">
        </a>
        @else
        <a href="{{ route('login') }}" id="login">LOGIN</a>
        @endif


    </div>

  </header>