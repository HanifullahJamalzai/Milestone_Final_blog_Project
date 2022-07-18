@extends('admin.layouts.app')
@section('title', 'Team')
@section('contents')
  
  <div class="card p-3">
    <form action="forms/contact.php" method="post" class="php-email-form">
      <div class="row gy-2">

        <div class="col-md-4">
          <input type="text" name="name" class="form-control" placeholder="Name" required>
        </div>

        <div class="col-md-4 ">
          <input type="email" class="form-control" name="email" placeholder="Position" required>
        </div>

        <div class="col-md-4">
          <input type="file" class="form-control" name="subject" placeholder="Photo" required>
        </div>

        <div class="col-md-12">
          <textarea class="form-control" name="message" rows="2" placeholder="Message" required></textarea>
        </div>

        <div class="col-md-12 text-center">
          <button type="submit" class="btn btn-primary w-100">Save</button>
        </div>

      </div>
    </form>
  </div>


  <section class="section contact">

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
                          <a href="#">
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