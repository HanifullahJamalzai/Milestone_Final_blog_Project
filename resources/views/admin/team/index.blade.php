@extends('admin.layouts.app')
@section('title', 'Team')
@section('contents')
  
@if ($errors->any())
<div class="text-center">
    @foreach ($errors->all() as $error)
        <span class="text-danger"> {{ $error }} </span><br>
    @endforeach
</div>
@endif

  <div class="card p-3">
    <form action="{{ isset($team) ? route('team.update', $team) : route('team.store') }}" method="post" enctype="multipart/form-data">
      @csrf
      @if(isset($team)) @method('put') @endif
      
      <div class="row gy-2">

        <div class="col-md-4">
          <input type="text" name="name" class="form-control" placeholder="Name" value={{isset($team) ? $team->name : old('name')}}>
        </div>

        <div class="col-md-4 ">
          <input type="text" class="form-control" name="position" placeholder="Position" value={{isset($team) ? $team->position : old('position')}}>
        </div>

        <div class="col-md-4">
          <input type="file" class="form-control" name="photo" placeholder="Photo">
        </div>

        <div class="col-md-12">
          <textarea class="form-control" name="bio" rows="2" placeholder="Message" >{{isset($team) ? $team->bio : old('bio')}}</textarea>
        </div>

        <div class="col-md-12 text-center">
          <button type="submit"  class="col-md-2 btn {{isset($team) ? 'btn-info' : 'btn-primary' }} w-100"> {{isset($team) ? 'Update' : 'Save' }}</button>
        </div>

      </div>
    </form>
  </div>


  @include('common.alert')

  <section class="section">

    <div class="row gy-4">

      <div class="col-xl-12">

        <div class="row">
          @foreach ($teams as $team)
            <div class="col-lg-6">
              
              <div class="card mb-3">
                <div class="row g-0">
                  <div class="col-md-3">
                    <img src="{{$team->photo}}" class="img-fluid rounded-start" alt="...">
                  </div>
                  <div class="col-md-9">
                    <div class="card-body">
                      <div class="d-flex flex-end">
                        <h5 class="card-title">{{$team->name}} | {{$team->position}}</h5>
                        
                        <div class="icon">
                          <a href="{{route('team.edit', $team)}}">
                            <i class="bi bi-pencil-square"></i>
                          </a>
                        </div>
                      </div>
                      
                      <p class="card-text">{{$team->bio}}</p>
                    </div>
                  </div>
                </div>
              </div>

            </div>

          @endforeach

        </div>

      </div>
      </div>

    </div>

  </section>




@endsection