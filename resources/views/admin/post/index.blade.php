@extends('admin.layouts.app')
@section('title', 'Post')
@section('contents')

<section class="section">
  <div class="row">
    <div class="col-lg-12">
        <div class="col-md-12" >

          @include('common.alert')
          <div class="card mt-3">
            {{-- alert --}}
              {{-- <div class="card"> --}}
                <div class="card-body">

                  <div class="d-flex justify-content-between">
                    <h5 class="card-title">Posts</h5>

                    <div class="icon card-title">
                      <a href="{{route('post.create')}}">
                        <i class="bi bi-plus-square"></i>
                      </a>
                    </div>
                  </div>

                  <!-- Table with hoverable rows -->
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">photo</th>
                        <th scope="col">Title</th>
                        <th scope="col">Category</th>
                        <th scope="col">views</th>
                        <th scope="col">Comments</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @php
                          $count = 1;
                      @endphp
                      @foreach ($posts as $post)
                        <tr>
                          <th scope="row">{{$count++}}</th>
                          <td><img src="{{ $post->thumbnail_s }}" alt="" width="50"></td>
                          <td>{{ $post->title }}</td>
                          <td>{{ $post->category->name }}</td>
                          <td>{{ $post->visitor }}</td>
                          <td>{{ $post->comments->count() }}</td>
                          <td class="d-flex"> 
                            <form action="{{route('post.destroy', $post)}}" method="post">
                              @method('delete')
                              @csrf
                              <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                            | <a 
                                {{-- href="/category/{{$category->id}}/edit " --}}
                                href="{{ route('post.edit', $post) }}"
                                {{-- href="url('/category/.{{ $category->id }}./edit')" --}}
                            
                              class="btn btn-info">Edit</a>
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