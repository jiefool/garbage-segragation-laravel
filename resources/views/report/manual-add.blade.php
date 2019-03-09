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
                          <h4 class="card-title mb-4">Manual Add</h4>

                        <div class="row">
                            <div class="col-md-4">
                                <h4>Add Type:</h4>
                                <form class="row mb-12" method="post" action="{{ url('report/add-type') }}">
                                    @csrf
                                    <div class="col-lg-12">
                                        {{Form::text('name', '', ['class' => 'form-control', 'placeholder'=>'Type'])}}
                                    </div>
                                    <div class="col-lg-12">
                                        <br/>
                                        <button type="submit" class="btn btn-gradient-primary btn-block" name="action" value="go">Submit</button>
                                    </div>
                                </form>
                            </div>

                            <div class="col-md-4">
                                <h4>Select Types:</h4>
                                @foreach($types as $type)
                                    <li><a href="{{ url('report/manual-add', ['type'=>$type->id]) }}">{{$type->name}}</a></li>
                                @endforeach
                            </div>

                            @if($selectedType)
                                <div class="col-md-4">
                                    <h4>Add Garbage Collection:</h4>
                                    <form class="row mb-12" method="post" action="{{ url('report/add-collection') }}">
                                        @csrf
                                        <div class="col-lg-12">
                                            {{Form::hidden('type_id', $selectedType->id)}}
                                        </div>

                                        <div class="col-lg-12">
                                            {{Form::text('weight', $selectedType->name, ['class' => 'form-control', 'placeholder'=>'Weight', 'disabled'=>'disabled'])}}
                                        </div>

                                        <div class="col-lg-12">
                                            {{Form::number('weight', '', ['class' => 'form-control', 'placeholder'=>'Weight'])}}
                                        </div>

                                        <div class="col-lg-12">
                                            {{Form::date('collect_date', '', ['class' => 'form-control', 'placeholder'=>'Date'])}}
                                        </div>

                                        <div class="col-lg-12">
                                            <br/>
                                            <button type="submit" class="btn btn-gradient-primary btn-block" name="action" value="go">Submit</button>
                                        </div>
                                    </form>
                                </div>

                                <div class="col-md-4" id="print-div">
                                    <h4>Garbage Collected ({{$selectedType->name}}):</h4>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Weight</th>
                                                <th>Data</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($garbageBags as $gb)
                                                <tr>
                                                    <th>{{$gb->weight}}</th>
                                                    <th>{{$gb->collect_date}}</th>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    
                                    <button type="button" class="btn btn-gradient-primary btn-block" onclick="PrintElem('print-div')">Print</button>
                                </div>
                            @endif
                        </div>

                       

                          @if(isset($levels))
                          <table class="table table-bordered">
                            <thead>
                              <tr>
                                <th>
                                  Day
                                </th>
                                <th>
                                  Trash Level Average
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
                          @endif
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

    <script>
        function PrintElem(elem){
                var mywindow = window.open('', 'PRINT', 'height=400,width=600');

                mywindow.document.write('<html><head><title>' + document.title  + '</title>');
                mywindow.document.write('</head><body >');
                mywindow.document.write('<h1>' + document.title  + '</h1>');
                mywindow.document.write(document.getElementById(elem).innerHTML);
                mywindow.document.write('</body></html>');

                mywindow.document.close(); // necessary for IE >= 10
                mywindow.focus(); // necessary for IE >= 10*/

                mywindow.print();
                mywindow.close();

                return true;
            }
    </script>
@endsection
