<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin 2 - Dashboard</title>

  <!-- Custom fonts for this template-->
  <link href="{{ asset('/starbtrap/vendor/fontawesome-free/css/all.min.css')}} " rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="{{ asset('/starbtrap/css/sb-admin-2.min.css') }}" rel="stylesheet">


</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    @include('starbootstrap.layout.sidebar')

    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        @include('starbootstrap.layout.navbar')
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->

          <!-- Content Row -->
          <div class="row">

            <!-- Earnings (Monthly) Card Example -->

          </div>

                @yield('content')

          <!-- Content Row -->

          <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-8 col-lg-15">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">@yield('title')</h6>


                </div>
                <!-- Card Body -->
                <div class="card-body">

                </div>
              </div>
            </div>

            <!-- Pie Chart -->

          </div>


          <!-- Content Row -->

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->

      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="{{ asset('/starbtrap/vendor/jquery/jquery.min.js')}} "></script>
  <script src="{{ asset('/starbtrap/vendor/bootstrap/js/bootstrap.bundle.min.js')}} "></script>

  <!-- Core plugin JavaScript-->
  <script src="{{ asset('/starbtrap/vendor/jquery-easing/jquery.easing.min.js')}} "></script>

  <!-- Custom scripts for all pages-->
  <script src="{{ asset('/starbtrap/js/sb-admin-2.min.js')}} "></script>

  <!-- Page level plugins -->
  <script src="{{ asset('/starbtrap/vendor/chart.js/Chart.min.js')}} "></script>

  <!-- Page level custom scripts -->
  <script src="{{ asset('/starbtrap/js/demo/chart-area-demo.js')}} "></script>
  <script src="{{ asset('/starbtrap/js/demo/chart-pie-demo.js')}} "></script>
</body>

</html>
