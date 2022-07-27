@extends('landing.layouts.app')
@section('title', 'about')
@section('contents')

<section>
    <div class="container" data-aos="fade-up">
      <div class="row">
        <div class="col-lg-12 text-center mb-5">
          <h1 class="page-title">About us</h1>
        </div>
      </div>

      <div class="row mb-5">

        <div class="d-md-flex post-entry-2 half">
          <a href="#" class="me-4 thumbnail">
            <img src="{{ $about->history_photo }}" alt="" class="img-fluid">
          </a>
          <div class="ps-md-5 mt-4 mt-md-0">
            <div class="post-meta mt-4">About us</div>
            <h2 class="mb-4 display-4">Company History</h2>
            <p>{{$about->history_description}}</p>
          </div>
        </div>

        <div class="d-md-flex post-entry-2 half mt-5">
          <a href="#" class="me-4 thumbnail order-2">
            <img src="{{ $about->mv_photo }}" alt="" class="img-fluid">
          </a>
          <div class="pe-md-5 mt-4 mt-md-0">
            <div class="post-meta mt-4">Mission &amp; Vision</div>
            <h2 class="mb-4 display-4">Mission &amp; Vision</h2>
            <p>{{ $about->mv_description }}</p>
          </div>
        </div>

      </div>

    </div>
  </section>

  <section>
    <div class="container" data-aos="fade-up">
      <div class="row">
        <div class="col-12 text-center mb-5">
          <div class="row justify-content-center">
            <div class="col-lg-6">
              <h2 class="display-4">Our Team</h2>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil sint sed, fugit distinctio ad eius itaque deserunt doloribus harum excepturi laudantium sit officiis et eaque blanditiis. Dolore natus excepturi recusandae.</p>
            </div>
          </div>
        </div>

        @foreach ($team as $member)
          <div class="col-lg-4 text-center mb-5">
            <img src="{{ $member->photo}}" alt="" class="img-fluid rounded-circle w-50 mb-4" style="margin: 0 auto;">
            <h4>{{ $member->name }}</h4>
            <span class="d-block mb-3 text-uppercase">{{ $member->position }}</span>
            <p>{{ $member->bio }}</p>
          </div>
        @endforeach

        
      </div>
    </div>
  </section>

  
@endsection