@extends('.templates.master')

@section('content')
    <div class="container-scroller">
        @include('.templates.header')
        <div class="container-fluid page-body-wrapper">
            @include('.templates.sidebar')
            <div class="main-panel">
                <div class="content-wrapper">
                  <div class="row">
                    <div class="col-lg-12 grid-margin stretch-card">
                      <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-5">About WLMS (Water Level Monitoring System)</h4>
                            <p style="text-indent: 50px; text-align: justify;">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

                            <h4 class="card-title mb-5 mt-5">The Developers</h4>
                            <div class="row">
                              <div class="col-md-3">
                                <img src="{{ asset('images/faces/face12.jpg') }}" class="rounded-circle" height="180">
                              </div>
                              <div class="col-md-9 mt-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                              tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                              quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                              consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                              cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                              proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div>
                            </div>
                            <div class="row mt-5">
                                <div class="col-md-9 mt-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                              </div>
                              <div class="col-md-3">
                                <img src="{{ asset('images/faces/face13.jpg') }}" class="rounded-circle" height="180">
                              </div>
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
