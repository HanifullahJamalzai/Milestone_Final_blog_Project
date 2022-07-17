@extends('admin.layouts.app')
@section('title', 'About')
@section('contents')

<div class="pagetitle">
    <h1>About Page</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item">Pages</li>
        <li class="breadcrumb-item active">Blank</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  
  <section class="section">
    <div class="row">

      <div class="col-lg-12">
    
        <div class="card pt-3">
          <div class="card-body">
            <!-- Vertical Form -->
            <form class="row g-3" method="POST" enctype="multipart/form-data" @if(isset($about)) action="{{route('about.update', $about)}}" @else action="{{route('about.store')}}" @endif >
              @csrf
              @if(isset($about))
              @method('PUT')
              @endif

              <label for="title" class="form-label fw-bold">Description1:</label>
              <span class="text-danger text-sm error-text">{{$errors->first('description1')}}</span>
              <div class="col-12">
                <textarea type="text" name="description1" class="form-control ckeditor" id="title">
                  {{$about->description1 ?? ''}}
                </textarea>
              </div>
              

              <label for="subtitle" class="form-label fw-bold">Description2:</label>
              <div class="col-12 ">
                <span class="text-danger text-sm error-text">{{$errors->first('description2')}}</span>
                <textarea type="text" name="description2" class="form-control ckeditor"  id="subtitle">
                  {{$about->description2 ?? ''}}
                </textarea>
              </div>
              
              @cannot('isGuest')
                <div class="col-12">
                  <button type="submit" class="btn btn-primary">
                    @if(isset($about))
                      Update
                    @else
                      Submit
                    @endif
                  </button>
                </div>
              @endcannot
            </form><!-- Vertical Form -->
    
          </div>
        </div>
    
      </div>

    </div>
  </section>


@endsection