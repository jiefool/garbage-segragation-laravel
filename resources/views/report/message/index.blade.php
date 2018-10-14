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
                          <h4 class="card-title mb-4">Message Sent Report</h4>
                            <form class="row mb-4" method="get" action="{{ url('report/message') }}">
                            	@csrf
                              <div class="col-lg-4">
                               	<input class="form-control" name="date" type="date" value="{{ request('date')}}"></input>
                              </div>
                              
                              <div class="col-lg-4">
                                <button type="submit" class="btn btn-gradient-primary" name="action" value="go">Go</button>
                                <button type="submit" class="btn btn-gradient-danger" name="print" value="print">Print</button>
                              </div>
                            </form>
                            

                          <table class="table table-bordered">
                            <thead>
                              <tr>
                                <th>Fullname</th>
                                <th>Contact Number</th>
                                <th>Message</th>
                                <th>Date/Time</th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach($sents as $sent)
                                <tr>
                                  <td>{{ $sent->contact->fullname }}</td>
                                  <td>{{ $sent->contact->contact }}</td>
                                  <td>{{ $sent->message }}</td>
                                  <td>{{ $sent->created_at->format('F j, Y') }}</td>
                                </tr>
                              @endforeach
                            </tbody>
                          </table>
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
