@extends('templates.master')

@section('content')
    <div class="container-scroller">
        @include('.templates.header')
        <div class="container-fluid page-body-wrapper">
            @include('.templates.sidebar')
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row"> 
                      <div class="col col-md-2">                      
                        <select class="form-control" id="area-select">
                          <option value="a">Area A</option>
                          <option value="b">Area B</option>
                        </select>
                       </div>
                    </div>
                    <hr>  
                    <div id="a">
                    <h1>Area A</h1>
                    <div class="row">
                        <div class="col-md-4 stretch-card grid-margin">
                          <div class="card bg-gradient-danger card-img-holder text-white">
                            <div class="card-body">
                              <h4 class="font-weight-normal mb-3">Current Level
                                <i class="mdi mdi-chart-line mdi-24px float-right"></i>
                              </h4>
                              <h2 class="mb-5">{{ number_format($currentA->centimeter, 2) }} Centimeters</h2>
                              <h6 class="card-text">{{ $current_labelA . ' by '. number_format($current_avgA, 2) }} %</h6>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-4 stretch-card grid-margin">
                          <div class="card bg-gradient-info card-img-holder text-white">
                            <div class="card-body">                  
                              <h4 class="font-weight-normal mb-3">Daily Average Level
                                <i class="mdi mdi-chart-line mdi-24px float-right"></i>
                              </h4>
                              <h2 class="mb-5">{{ number_format($daily_avgA, 2) }} Centimeters</h2>
                              <h6 class="card-text">{{ $daily_labelA . ' by ' . number_format( $day_avgA,2) }} %</h6>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-4 stretch-card grid-margin">
                          <div class="card bg-gradient-success card-img-holder text-white">
                            <div class="card-body">                                    
                              <h4 class="font-weight-normal mb-3">Water Level
                                <i class="mdi mdi-chart-line mdi-24px float-right"></i>
                              </h4>
                              <h2 class="mb-5">Level {{$currentA->number}}</h2>
                            </div>
                          </div>
                        </div>
                      </div>
                    <div class="row">
                        <div class="col-lg-12 grid-margin stretch-card">
                          <div class="card">
                            <div class="card-body">
                              <h4 class="card-title">Water Level Chart</h4>
                              <canvas class="areaChart" style="height:250px"></canvas>
                            </div>
                          </div>
                        </div>
                    </div>
                      </div>

                      <!---B -->
                <div id="b" style="display: none;">
                  <h1>  Area B</h1>
                    <div class="row">
                        <div class="col-md-4 stretch-card grid-margin">
                          <div class="card bg-gradient-danger card-img-holder text-white">
                            <div class="card-body">
                              <h4 class="font-weight-normal mb-3">Current Level
                                <i class="mdi mdi-chart-line mdi-24px float-right"></i>
                              </h4>
                              <h2 class="mb-5">{{ number_format($currentB->centimeter, 2) }} Centimeters</h2>
                              <h6 class="card-text">{{ $current_labelB . ' by '. number_format($current_avgB, 2) }} %</h6>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-4 stretch-card grid-margin">
                          <div class="card bg-gradient-info card-img-holder text-white">
                            <div class="card-body">                  
                              <h4 class="font-weight-normal mb-3">Daily Average Level
                                <i class="mdi mdi-chart-line mdi-24px float-right"></i>
                              </h4>
                              <h2 class="mb-5">{{ number_format($daily_avgB, 2) }} Centimeters</h2>
                              <h6 class="card-text">{{ $daily_labelB . ' by ' . number_format( $day_avgB,2) }} %</h6>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-4 stretch-card grid-margin">
                          <div class="card bg-gradient-success card-img-holder text-white">
                            <div class="card-body">                                    
                              <h4 class="font-weight-normal mb-3">Water Level
                                <i class="mdi mdi-chart-line mdi-24px float-right"></i>
                              </h4>
                              <h2 class="mb-5">Level {{$currentB->number}}</h2>
                            </div>
                          </div>
                        </div>
                      </div>
                    <div class="row">
                        <div class="col-lg-12 grid-margin stretch-card">
                          <div class="card">
                            <div class="card-body">
                              <h4 class="card-title">Water Level Chart</h4>
                              <canvas class="areaChart" style="height:250px"></canvas>
                            </div>
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
@endsection

@section('scripts')
    
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

      var areaChartCanvas = $(".areaChart").get(0).getContext("2d");
        var areaChart = new Chart(areaChartCanvas, {
          type: 'line',
          data: areaData,
          options: areaOptions
        });
      var areaChartCanvas = $(".areaChart").get(1).getContext("2d");
        var areaChart = new Chart(areaChartCanvas, {
          type: 'line',
          data: areaData,
          options: areaOptions
        });

    </script>
    <script type="text/javascript">
      $(document).ready(function(){
        $('#area-select').change(function(){
          if($(this).val() == "a"){
            $('#b').hide();
            $('#a').show();
          }else if($(this).val() == "b"){
            $('#a').hide();
            $('#b').show();
          }
        });
      });
    </script>

@endsection