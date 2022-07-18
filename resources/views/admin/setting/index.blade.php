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

  <div class="card p-3">
    <form action="forms/contact.php" method="post" class="php-email-form">
      <div class="row gy-2">

        <div class="col-md-6">
          <input type="text" name="name" class="form-control" placeholder="Facebook URL" required>
        </div>

        <div class="col-md-6">
          <input type="email" class="form-control" name="email" placeholder="Twitter URL" required>
        </div>

        <div class="col-md-6">
          <input type="email" class="form-control" name="email" placeholder="Instagram URL" required>
        </div>
        
        <div class="col-md-6">
          <input type="text" class="form-control" name="subject" placeholder="Address" required>
        </div>

        <div class="col-md-6">
          <input type="text" class="form-control" name="subject" placeholder="Phone" required>
        </div>

        <div class="col-md-6">
          <input type="email" class="form-control" name="subject" placeholder="Email" required>
        </div>

        <div class="col-md-12">
          <textarea class="form-control" name="message" rows="7" placeholder="Footer Description" required></textarea>
        </div>

        <div class="col-md-12 text-center">
          <button type="submit" class="btn btn-primary w-100">Save</button>
        </div>

      </div>
    </form>
  </div>

  
@endsection