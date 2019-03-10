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
                          <h4 class="card-title mb-4">List of Contacts</h4>


                          @if(session()->has('success'))

                              <p class="alert alert-success">
                                  {{ session('success') }}
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                              </p>

                          @endif

                          @if(session()->has('delete'))

                              <p class="alert alert-success">
                                  {{ session('delete') }}
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                              </p>

                          @endif

                          @if(session()->has('update'))

                              <p class="alert alert-success">
                                  {{ session('update') }}
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                              </p>

                          @endif

                          <table class="table table-bordered" id="usertable">
                            <thead>
                              <tr>
                                <th>
                                  ID
                                </th>
                                <th>
                                  Name
                                </th>
                                <th>
                                  Address
                                </th>
                                <th>
                                  Contact
                                </th>
                                <th>
                                  Added On
                                </th>

                                <!--
                                <th>
                                  Area
                                </th>
                                -->

                                <th>
                                  Actions
                                </th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach($contacts as $contact)
                                <tr>
                                  <td>{{ $contact->id }}</td>
                                  <td>{{ $contact->firstname . ' ' . $contact->lastname }}</td>
                                  <td>{{ $contact->address }}</td>
                                  <td>{{ $contact->contact }}</td>
                                  <td>{{ $contact->created_at->format('M d, Y H:i:s A') }}</td>

                                  <!--
                                  <td>{{ $contact->area->area }}</td>
                                  -->

                                  <td style="width: 180px;text-align: center">
                                    <a class="btn btn-sm btn-primary" href="{{ url('contact/edit', $contact->id) }}">Edit</a>
                                    <button class="btn btn-sm btn-danger btn-delete" data-id="{{ $contact->id }}" data-token="{{ csrf_token() }}" type="button">Delete</button>
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


        $('#usertable').on('click','.btn-delete',function(){
            var r = confirm("Are you sure you want to delete this contact?");
            if (r == true) {
                  
                  var id = $(this).data('id');
                  var token = $(this).data("token");

                  $.ajax({

                      url: 'delete/'+ id,
                      type: 'POST',
                      data: {_method: 'delete', _token:token},
                      success: function(){
                            alert('Contact deleted successfully.');
                            location.reload();

                      },
                  });
            }
        });

    </script>

    <script type="text/javascript">$('#usertable').DataTable();</script>

@endsection