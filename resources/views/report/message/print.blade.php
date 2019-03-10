@extends('.templates.master')

@section('content')
    <div class="container-scroller">
        @include('.templates.header')
        <div class="container-fluid page-body-wrapper">
            @include('.templates.sidebar')
            <div class="main-panel">
                <div class="content-wrapper" >
                  <div class="row">
                    <div class="col-lg-12 grid-margin stretch-card">
                      <div class="card">
                        <div class="card-body"  id="reportbody">
                          <h4 class="card-title mb-4 text-center">Message Sent Report</h4>
                          <h5 class="mb-4 text-center">For: {{ $date }}</h5>
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
                    <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2018 <a href="https://www.bootstrapdash.com/" target="_blank">Garbage Segregation</a>. All rights reserved.</span>
                    <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="mdi mdi-heart text-danger"></i></span>
                  </div>
                </footer>
              </div>
        </div>
    </div>
@endsection

@section('scripts')

  <script type="text/javascript">
    $(document).ready(function(){

      

          var printContents = document.getElementById('reportbody').innerHTML;
          var originalContents = document.body.innerHTML;

          document.body.innerHTML = printContents;

          window.print();

          // document.body.innerHTML = originalContents;

      
      history.back();

    });
  </script>

@endsection