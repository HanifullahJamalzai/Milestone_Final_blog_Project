<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>@yield('title')</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('admin_asset/img/favicon.png')  }}" rel="icon">
  <link href="{{ asset('admin_asset/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('admin_assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('admin_assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('admin_assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
  <link href="{{ asset('admin_assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('admin_assets/vendor/quill/quill.snow.css')  }}" rel="stylesheet">
  <link href="{{ asset('admin_assets/vendor/quill/quill.bubble.css')  }}" rel="stylesheet">
  <link href="{{ asset('admin_assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('admin_assets/css/style.css')  }}" rel="stylesheet">


</head>

<body>


    <main>
        <div class="container">
    
          <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
            <div class="container">
              <div class="row justify-content-center">
                <div class="col-lg-6 col-md-8 d-flex flex-column align-items-center justify-content-center">
    
                  <div class="d-flex justify-content-center py-4">
                    <a href="index.html" class="logo d-flex align-items-center w-auto">
                      <img src="assets/img/logo.png" alt="">
                      <span class="d-none d-lg-block">We have sent you a verification token! Please Verify Your Email to Continue</span>
                    </a>
                  </div><!-- End Logo -->
    
                </div>
              </div>
            </div>
    
          </section>
    
        </div>
      </main><!-- End #main -->
    

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('admin_assets/vendor/bootstrap/js/bootstrap.bundle.js') }}"></script>
  <script src="{{ asset('admin_assets/vendor/php-email-form/validate.js') }}"></script>
  <script src="{{ asset('admin_assets/vendor/quill/quill.min.js') }}"></script>
  <script src="{{ asset('admin_assets/vendor/tinymce/tinymce.min.js') }}"></script>
  <script src="{{ asset('admin_assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
  <script src="{{ asset('admin_assets/vendor/chart.js/chart.min.js')  }}"></script>
  <script src="{{ asset('admin_assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
  <script src="{{ asset('admin_assets/vendor/echarts/echarts.min.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('admin_assets/js/main.js')  }}"></script>

</body>

</html>