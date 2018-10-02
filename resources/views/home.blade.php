@extends('templates.master')

@section('content')
    <div class="container-scroller">
        @include('.templates.header')
        <div class="container-fluid page-body-wrapper">
            @include('.templates.sidebar')
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">
                        <div class="col-md-4 stretch-card grid-margin">
                          <div class="card bg-gradient-danger card-img-holder text-white">
                            <div class="card-body">
                              <h4 class="font-weight-normal mb-3">Current Level
                                <i class="mdi mdi-chart-line mdi-24px float-right"></i>
                              </h4>
                              <h2 class="mb-5">20 Meters</h2>
                              <h6 class="card-text">Increased by 60%</h6>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-4 stretch-card grid-margin">
                          <div class="card bg-gradient-info card-img-holder text-white">
                            <div class="card-body">                  
                              <h4 class="font-weight-normal mb-3">Daily Average Level
                                <i class="mdi mdi-chart-line mdi-24px float-right"></i>
                              </h4>
                              <h2 class="mb-5">15 Meters</h2>
                              <h6 class="card-text">Decreased by 10%</h6>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-4 stretch-card grid-margin">
                          <div class="card bg-gradient-success card-img-holder text-white">
                            <div class="card-body">                                    
                              <h4 class="font-weight-normal mb-3">Few Hours Ago
                                <i class="mdi mdi-chart-line mdi-24px float-right"></i>
                              </h4>
                              <h2 class="mb-5">15.7 Meters</h2>
                              <h6 class="card-text">Increased by 5%</h6>
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
@endsection
