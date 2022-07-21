@extends('admin.layouts.app')
@section('title', 'User')
@section('contents')

  <div class="pagetitle">
    <h1>Users Page</h1>
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
          <div class="col-md-12" >
            <form action="{{ isset($user) ? route('user.update', $user) : route('user.store') }}" method="post">
              @csrf
              @if(isset($user)) @method('put') @endif
  
              @error('name')
                <span class="text-danger text-sm">{{$message}}</span>
              @enderror

              <div class="form-floating d-flex justify-content-center">

                <div class="col-md-4">
                    <input type="text" name="name" class="form-control" id="floatingName" placeholder="Selected User Name" value="{{ isset($user) ? $user->name : '' }}" readonly>
                </div>
                <div class="col-md-4">
                    <select name="role" id="" class="form-control">

                        <option value="0" class="">Choose Role</option>
                        <option value="1"
                          @if(isset($user))
                            @if ($user->role === 1)
                                @selected(true)
                            @endif
                          @endif  
                        >Admin</option>

                        <option value="2"
                          @if(isset($user))
                            @if ($user->role === 2)
                                @selected(true)
                            @endif
                          @endif  
                        >Editor</option>
                        <option value="3"
                          @if(isset($user))
                            @if ($user->role === 3)
                                @selected(true)
                            @endif
                          @endif  
                        >User</option>

                      {{--
                        <option value="1" @if(isset($user))   {{ $user->role === 1 && @selected(true) }} @endif  class="">Admin</option>
                        <option value="2" @if(isset($user))   {{ $user->role === 2 && @selected(true) }} @endif class="">Editor</option>
                        <option value="3" @if(isset($user))   {{ $user->role === 3 && @selected(true) }} @endif class="">User</option> --}}

                    </select>
                </div>
                  <button type="submit"  class="col-md-2 btn {{isset($user) ? 'btn-info' : 'btn-primary'}}">Update Role</button>
                {{-- </div> --}}
              </div>
            </form>

        <div class="card mt-3">
           @include('common.alert')

            {{-- <div class="card"> --}}
              <div class="card-body">
                <h5 class="card-title">Users</h5>
  
                <!-- Table with hoverable rows -->
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Name</th>
                      <th scope="col">Email</th>
                      <th scope="col">Phone</th>
                      <th scope="col">Role</th>
                      <th scope="col">Created_at</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                        $number = 0;
                    @endphp
                    @foreach ($users as $user )
                      <tr>
                        <th scope="row">{{++$number}}</th>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->phone}}</td>
                        <td>@if($user->role === 1)  Admin @elseif($user->role === 2) Editor @else User @endif</td>
                        <td>{{$user->created_at}}</td>

                        <td class="d-flex"> 
                           <a href="{{ route('user.edit', $user) }}" class="btn btn-info">Change Role</a> 
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
                <!-- End Table with hoverable rows -->
  
              </div>
            </div>

            
        </div>

      </div>

    </div>
  </section>

  


@endsection