@extends('admin.layouts.app')
@section('title', 'Tag')
@section('contents')

  <section class="section">
    <div class="row">
      <div class="col-lg-12">
          <div class="col-md-12" >
            <form action="{{ isset($tag) ? route('tag.update', $tag) : route('tag.store') }}" method="post">
              @csrf
              @if(isset($tag)) @method('put') @endif

              @error('name')
                <span class="text-danger text-sm">{{$message}}</span>
              @enderror

              <div class="form-floating d-flex" >

                <div class="col-md-10">
                  <input type="text" name="name" class="form-control" id="floatingName" placeholder="Your Name" value="{{isset($tag) ? $tag->name : ''}}">
                </div>
                  <button type="submit"  class="col-md-2 btn {{isset($tag) ? 'btn-info' : 'btn-primary' }}"> {{isset($tag) ? 'Update' : 'Save' }}</button>
                </div>
              </div>
            </form>

        <div class="card mt-3">
           {{-- alert --}}
            @include('common.alert')
            {{-- <div class="card"> --}}
              <div class="card-body">
                <h5 class="card-title">Tags</h5>
  
                <!-- Table with hoverable rows -->
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Name</th>
                      <th scope="col">created_at</th>
                      <th scope="col">updated_at</th>
                      <th scope="col">action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                        $number = 0;
                    @endphp
                    @foreach ($tags as $tag )
                      <tr>
                        <th scope="row">{{++$number}}</th>
                        <td>{{$tag->name}}</td>
                        <td>{{$tag->created_at}}</td>
                        <td>{{$tag->updated_at}}</td>
                        <td class="d-flex"> 
                          <form action="{{route('tag.destroy', $tag)}}" method="post">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-danger">Delete</button>
                          </form>
                           | <a href="{{ route('tag.edit', $tag) }}" class="btn btn-info">Edit</a>
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