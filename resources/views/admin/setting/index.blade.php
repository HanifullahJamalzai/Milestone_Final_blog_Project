@extends('admin.layouts.app')
@section('title', 'Setting')
@section('contents')

<div class="pagetitle">
    <h1>Setting Page</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item">Pages</li>
        <li class="breadcrumb-item active">Blank</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
  
  @include('common.alert')

  <div class="card p-3">
    <form action="{{ isset($setting) ? route('setting.update', $setting) : route('setting.store') }}" method="post">
      @csrf
      @if(isset($setting)) @method('put') @endif

      <div class="row gy-2">

        <div class="col-md-6">
          <input type="text" name="fb_url" class="form-control" placeholder="Facebook URL" value="{{isset($setting) ? $setting->fb_url : ''}}">
          @error('fb_url')
            <span class="text-danger text-sm">{{$message}}</span>
          @enderror
        </div>

        <div class="col-md-6">
          <input type="text" class="form-control" name="twitter_url" placeholder="Twitter URL" value="{{isset($setting) ? $setting->twitter_url : ''}}"  >
          @error('twitter_url')
            <span class="text-danger text-sm">{{$message}}</span>
          @enderror
        </div>

        <div class="col-md-6">
          <input type="text" class="form-control" name="instagram_url" placeholder="Instagram URL" value="{{isset($setting) ? $setting->instagram_url : ''}}" >
          @error('instagram_url')
            <span class="text-danger text-sm">{{$message}}</span>
          @enderror
        </div>
        
        <div class="col-md-6">
          <input type="text" class="form-control" name="address" placeholder="Address" value="{{isset($setting) ? $setting->address : ''}}" >
          @error('address')
            <span class="text-danger text-sm">{{$message}}</span>
          @enderror
        </div>

        <div class="col-md-6">
          <input type="text" class="form-control" name="phone" placeholder="Phone" value="{{isset($setting) ? $setting->phone : ''}}" >
          @error('phone')
            <span class="text-danger text-sm">{{$message}}</span>
          @enderror
        </div>

        <div class="col-md-6">
          <input type="email" class="form-control" name="email" placeholder="Email" value="{{isset($setting) ? $setting->email : ''}}" >
          @error('email')
            <span class="text-danger text-sm">{{$message}}</span>
          @enderror
        </div>

        <div class="col-md-12">
          <textarea class="form-control" name="footer_description" rows="7" placeholder="Footer Description" >{{isset($setting) ? $setting->fb_url : ''}} </textarea>
        </div>
        @error('footer_description')
          <span class="text-danger text-sm">{{$message}}</span>
        @enderror

        <div class="col-md-12 text-center">
          <button type="submit" class="btn {{isset($setting) ? 'btn-info' : 'btn-primary'}} w-100 ">
            {{isset($setting) ? 'Update' : 'Save'}}
          </button>
        </div>

      </div>
    </form>
  </div>

  
@endsection