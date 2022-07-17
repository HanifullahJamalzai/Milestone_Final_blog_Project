@extends('admin.layouts.app')
@section('title', 'Category')
@section('contents')

  <section class="section">
    <div class="row">
      <div class="col-lg-12">
          <div class="col-md-12" >
            <form action="{{ route('category.store') }}" method="post">
              @csrf
              @error('name')
                <span class="text-danger text-sm">{{$message}}</span>
              @enderror

              <div class="form-floating d-flex" >

                <div class="col-md-10">
                  <input type="text" name="name" class="form-control" id="floatingName" placeholder="Your Name">
                </div>
                  <button type="submit"  class="col-md-2 btn btn-primary">Save</button>
                </div>
              </div>
            </form>

        <div class="card mt-3">
            @if(session()->has('success'))
              <span class="bg-success text-black">
                  {{session('success')}}
              </span>
            @endif
          <div class="card-body">
            <h5 class="card-title">Categories</h5>
            
            <p>This is an examle page with no contrnt. You can use it as a starter for your custom pages.</p>
          
          </div>
        </div>

      </div>

    </div>
  </section>
@endsection