@extends('admin.layouts.app')
@section('title', 'Messages')
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
                    <h5 class="card-title">Messages</h5>
                  </div>

                  <!-- Table with hoverable rows -->
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">name</th>
                        <th scope="col">email</th>
                        <th scope="col">Subject</th>
                        <th scope="col">Message</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @php
                          $count = 1;
                      @endphp
                      @foreach ($messages as $message)
                        <tr>
                          <th scope="row">{{$count++}}</th>
                          <td>{{$message->name}}</td>
                          <td>{{ $message->email }}</td>
                          <td>{{ $message->subject }}</td>
                          <td>
                            <textarea name="" id="" cols="25" rows="5">{{ $message->msg }}</textarea>
                          </td>
                          <td class="d-flex"> 
                            <form action="{{route('message.destroy', $message)}}" method="post">
                              @method('delete')
                              @csrf
                              <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
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