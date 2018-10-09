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
                          <h4 class="card-title mb-4">List of Administrators</h4>


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

                          @if(session()->has('reset'))

                              <p class="alert alert-success">
                                  {{ session('reset') }}
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
                                  Avatar
                                </th>
                                <th>
                                  Name
                                </th>
                                <th>
                                  Email
                                </th>
                                <th>
                                  Added On
                                </th>
                                <th>
                                  Actions
                                </th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach($users as $user)
                                <tr>
                                  <td>{{ $user->id }}</td>
                                  <td class="py-1">
                                    <img src="{{ Storage::url($user->avatar) }}" alt="image"/>
                                  </td>
                                  <td>{{ $user->firstname . ' ' . $user->lastname }}</td>
                                  <td>{{ $user->email }}</td>
                                  <td>{{ $user->created_at->format('M d, Y H:i:s A') }}</td>
                                  <td style="width: 300px;">
                                    <a class="btn btn-sm btn-success" href="{{ url('administrator/password/reset', $user->id) }}">Reset Password</a>
                                    <a class="btn btn-sm btn-primary" href="{{ url('administrator/edit', $user->id) }}">Edit</a>
                                    @if( $user->id == Auth::user()->id)
                                    <button class="btn btn-sm btn-danger btn-delete" data-id="{{ $user->id }}" data-token="{{ csrf_token() }}" type="button" disabled title="This is your account. You can't delete this." style="cursor: not-allowed;">Delete</button>
                                    @else
                                    <button class="btn btn-sm btn-danger btn-delete" data-id="{{ $user->id }}" data-token="{{ csrf_token() }}" type="button">Delete</button>
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


        $('#usertable').on('click','.btn-delete',function(){
            var r = confirm("Are you sure you want to delete this administrator?");
            if (r == true) {
                  
                  var id = $(this).data('id');
                  var token = $(this).data("token");

                  $.ajax({

                      url: 'delete/'+ id,
                      type: 'POST',
                      data: {_method: 'delete', _token:token},
                      success: function(){
                            alert('Administrator deleted successfully.');
                            location.reload();

                      },
                  });
            }
        });

    </script>

    <script type="text/javascript">$('#usertable').DataTable();</script>

@endsection