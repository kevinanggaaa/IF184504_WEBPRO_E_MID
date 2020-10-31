<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Regna Bootstrap Template</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('/regna/assets/img/favicon.png')}}" rel="icon">
  <link href="{{ asset('/regna/assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https:/fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Poppins:300,400,500,700" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('/regna/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{ asset('/regna/assets/vendor/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
  <link href="{{ asset('/regna/assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{ asset('/regna/assets/vendor/owl.carousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
  <link href="{{ asset('/regna/assets/vendor/venobox/venobox.css')}}" rel="stylesheet">
  <link href="{{ asset('/regna/assets/vendor/aos/aos.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('/regna/assets/css/style.css')}}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Regna - v2.1.0
  * Template URL: https://bootstrapmade.com/regna-bootstrap-onepage-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header-transparent">
    <div class="container">

      <div id="logo" class="pull-left">
        <a href="index.html"><img src="{{ asset('/regna/assets/img/logo.png')}}" alt=""></a>
        <!-- Uncomment below if you prefer to use a text logo -->
        <!--<h1><a href="#hero">Regna</a></h1>-->
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          @if (Route::has('login'))
          <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
            @auth
            <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 underline">Dashboard</a>
            @else
            <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Login</a>

            @if (Route::has('register'))
            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
            @endif
            @endif
          </div>
          @endif
        </ul>
      </nav><!-- #nav-menu-container -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div class="hero-container" data-aos="zoom-in" data-aos-delay="100">
      <h1>Library</h1>
      <h2>Library Website for Future Generations</h2>
    </div>
  </section><!-- End Hero Section -->


  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <!-- End Footer -->

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('/regna/assets/vendor/jquery/jquery.min.js')}} "></script>
  <script src="{{ asset('/regna/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{ asset('/regna/assets/vendor/jquery.easing/jquery.easing.min.js')}}"></script>
  <script src="{{ asset('/regna/assets/vendor/php-email-form/validate.js')}}"></script>
  <script src="{{ asset('/regna/assets/vendor/counterup/counterup.min.js')}}"></script>
  <script src="{{ asset('/regna/assets/vendor/waypoints/jquery.waypoints.min.js')}}"></script>
  <script src="{{ asset('/regna/assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
  <script src="{{ asset('/regna/assets/vendor/superfish/superfish.min.js')}}"></script>
  <script src="{{ asset('/regna/assets/vendor/hoverIntent/hoverIntent.js')}}"></script>
  <script src="{{ asset('/regna/assets/vendor/owl.carousel/owl.carousel.min.js')}}"></script>
  <script src="{{ asset('/regna/assets/vendor/venobox/venobox.min.js')}}"></script>
  <script src="{{ asset('/regna/assets/vendor/aos/aos.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('/regna/assets/js/main.js')}}"></script>

</body>

</html>