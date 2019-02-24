<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Gargabe Segregation System | Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{ asset('vendors/iconfonts/mdi/css/materialdesignicons.min.css') }}">
  <link rel="stylesheet" href="{{ asset('vendors/css/vendor.bundle.base.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('css/dataTables.bootstrap4.min.css') }}">
  <!-- endinject -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" />
</head>
<body>
  
      <div class="container-scroller">
        <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo" href="http://127.0.0.1:8000" style="color: skyblue; font-weight: bold;">WLMS</a>
        <a class="navbar-brand brand-logo-mini" href="index.html"><img src="images/logo-mini.svg" alt="logo"/></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-stretch">
        @if(Auth::check())
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
              <div class="nav-profile-img">
                <img src="Storage::url({{ Auth::user()->avatar }})" alt="image">
                <span class="availability-status online"></span>             
              </div>
              <div class="nav-profile-text">
                <p class="mb-1 text-black">{{ Auth::user()->name }}</p>
              </div>
            </a>
            <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
              <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ url('logout') }}"
                  onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                    <i class="mdi mdi-logout mr-2 text-primary"></i>
                    Logout
                </a>
                <form id="logout-form" action="{{ url('logout') }}" method="POST" style="display: none;">
                     {{ csrf_field() }}            
                </form>
            </div>
          </li>
        </ul>
        @else
         <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
             
              <div class="nav-profile-text">
                <p class="mb-1 text-black">Login</p>
              </div>
            </a>
            <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
              <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ url('login') }}"
                  >
                    <i class="mdi mdi-login mr-2 text-primary"></i>
                    Login
                </a>
                
            </div>
          </li>
        </ul>
        @endif
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </nav>        <div class="container-fluid page-body-wrapper">
                     <div class="main-panel" style="width: 100%;">
                <div class="content-wrapper">
                    <div class="row">
                        <div class="col-md-4 stretch-card grid-margin">
                          <div class="card bg-gradient-danger card-img-holder text-white">
                            <div class="card-body">
                              <h4 class="font-weight-normal mb-3">Current Level
                                <i class="mdi mdi-chart-line mdi-24px float-right"></i>
                              </h4>
                              <h2 class="mb-5">34.00 Centimeters</h2>
                              <h6 class="card-text">Decreased by -26.47 %</h6>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-4 stretch-card grid-margin">
                          <div class="card bg-gradient-info card-img-holder text-white">
                            <div class="card-body">                  
                              <h4 class="font-weight-normal mb-3">Daily Average Level
                                <i class="mdi mdi-chart-line mdi-24px float-right"></i>
                              </h4>
                              <h2 class="mb-5">
                                @if($current != null)
                                  {{ number_format($current->centimeter, 2) }} Centimeters
                                @endif
                              </h2>
                              <h6 class="card-text">{{ $current_label . ' by '. number_format($current_avg, 2) }} %</h6>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-4 stretch-card grid-margin">
                          <div class="card bg-gradient-success card-img-holder text-white">
                            <div class="card-body">                                    
                              <h4 class="font-weight-normal mb-3">Water Level
                                <i class="mdi mdi-chart-line mdi-24px float-right"></i>
                              </h4>
                              <h2 class="mb-5">Level {{$current->number}}</h2>
                            </div>
                          </div>
                        </div>
                      </div>
                    <div class="row">
                        <div class="col-lg-12 grid-margin stretch-card">
                          <div class="card">
                            <div class="card-body">
                              <h4 class="card-title">Water Level Chart</h4>
                              <canvas id="areaChart" style="height:250px"></canvas>
                            </div>
                          </div>
                        </div>
                    </div>
                </div>
                <footer class="footer">
                  <div class="d-sm-flex justify-content-center justify-content-sm-between">
                    <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2018 <a href="https://www.bootstrapdash.com/" target="_blank">Water Level Monitoring</a>. All rights reserved.</span>
                    <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="mdi mdi-heart text-danger"></i></span>
                  </div>
                </footer>
              </div>
        </div>
    </div>

  <!-- container-scroller -->

  <!-- plugins:js -->


  <script src="{{ asset('vendors/js/vendor.bundle.base.js') }}"></script>

  <script src="{{ asset('vendors/js/vendor.bundle.addons.js') }}"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="{{ asset('js/off-canvas.js') }}"></script>
  <script src="{{ asset('js/misc.js') }}"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="{{ asset('js/dashboard.js') }}"></script>
  <script src="{{ asset('js/chart.js') }}"></script>
   <script type="text/javascript" src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/dataTables.bootstrap.min.js') }}"></script>
  <!-- End custom js for this page-->
      
   <script type="text/javascript">
      var areaData = {
        labels: {!! json_encode($labels) !!},
        datasets: [{
          label: 'Centimeters',
          data: {{ json_encode($values) }},
          backgroundColor: [
            'rgba(255, 99, 132, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(255, 206, 86, 0.2)',
            'rgba(75, 192, 192, 0.2)',
            'rgba(153, 102, 255, 0.2)',
            'rgba(255, 159, 64, 0.2)'
          ],
          borderColor: [
            'rgba(255,99,132,1)',
            'rgba(54, 162, 235, 1)',
            'rgba(255, 206, 86, 1)',
            'rgba(75, 192, 192, 1)',
            'rgba(153, 102, 255, 1)',
            'rgba(255, 159, 64, 1)'
          ],
          borderWidth: 1,
          fill: true, // 3: no fill
        }]
      };

      var areaOptions = {
        plugins: {
          filler: {
            propagate: true
          }
        }
      }

      var areaChartCanvas = $("#areaChart").get(0).getContext("2d");
        var areaChart = new Chart(areaChartCanvas, {
          type: 'line',
          data: areaData,
          options: areaOptions
        });

    </script>

 
</body>

</html>
