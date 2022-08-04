<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Blog - @yield('title')</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:wght@400;500&family=Inter:wght@400;500&family=Playfair+Display:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('landing_assets/vendor/bootstrap/css/bootstrap.min.css') }} " rel="stylesheet">
  <link href="{{ asset('landing_assets/vendor/bootstrap-icons/bootstrap-icons.css') }} " rel="stylesheet">
  <link href="{{ asset('landing_assets/vendor/swiper/swiper-bundle.min.css') }} " rel="stylesheet">
  <link href="{{ asset('landing_assets/vendor/glightbox/css/glightbox.min.css') }} " rel="stylesheet">
  <link href="{{ asset('landing_assets/vendor/aos/aos.css') }} " rel="stylesheet">

  <!-- Template Main CSS Files -->
  <link href="{{ asset('landing_assets/css/variables.css') }} " rel="stylesheet">
  <link href="{{ asset('landing_assets/css/main.css') }} " rel="stylesheet">
  @vite('resources/js/app.js')
  <style>
    .en:hover{
      background: black;
      color: white;
    }
    .fa:hover{
      color: white;
      background: green;
    }
    .pa:hover{
      color: white;
      background: red;
    }
    #login:hover{
      border-bottom: 2px solid black;
      color: rgb(53, 53, 154);
    }
  </style>

  <!-- =======================================================
  * Template Name: ZenBlog - v1.0.0
  * Template URL: https://bootstrapmade.com/zenblog-bootstrap-blog-template/
  * Author: BootstrapMade.com
  * License: https:///bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
  
  
  <!-- ======= Header ======= -->
  @include('landing.layouts.partials.header')
  <!-- End Header -->
  
  <div class="align-items-center text-center fixed-top">
    @include('common.alert')
  </div>
  
  <main id="main">
        @yield('contents')
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  @include('landing.layouts.partials.footer')
  <!-- ======= End Footer ======= -->
  
  
  <!-- Vendor JS Files -->
  <script src="{{ asset('landing_assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }} "></script>
  <script src="{{ asset('landing_assets/vendor/swiper/swiper-bundle.min.js') }} "></script>
  <script src="{{ asset('landing_assets/vendor/glightbox/js/glightbox.min.js') }} "></script>
  <script src="{{ asset('landing_assets/vendor/aos/aos.js') }} "></script>
  {{-- <script src="{{ asset('landing_assets/vendor/php-email-form/validate.js') }} "></script> --}}

  <!-- Template Main JS File -->
  <script src="{{ asset('landing_assets/js/main.js') }} "></script>

</body>

</html>