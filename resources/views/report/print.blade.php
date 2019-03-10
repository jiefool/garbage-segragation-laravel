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
                          <h4 class="card-title mb-4 text-center">Water Level Report</h4>
                          <h5 class="mb-4 text-center">For month of {{ date('F', strtotime('2018-'.request('month').'-01')) . ' , ' . request('year') }}</h5>
                          <table class="table table-bordered">
                            <thead>
                              <tr>
                                <th>
                                  Day
                                </th>
                                <th>
                                  Water Level Average
                                </th>
                                <th class="text-center">Status</th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach($levels as $key => $level)
                                <tr>
                                  <td>{{ $key }}</td>
                                  <td>{{ round($level->avg('centimeter'),3) }} cm</td>
                                  @php $temp = round($level->avg('centimeter'),3) @endphp
                                  <td class="text-center">
                                    @if($temp <= 14)
                                    <span class="badge badge-success">Normal</span>
                                    @elseif($temp >= 15 && $temp <= 19)
                                    <span class="badge badge-warning">Not Normal</span>
                                    @elseif($temp >= 20 && $temp <= 24)
                                    <span class="badge badge-danger">Danger</span>
                                    @elseif($temp >= 25)
                                    <span class="badge badge-danger">Critical</span>
                                    @endif
                                  </td>
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