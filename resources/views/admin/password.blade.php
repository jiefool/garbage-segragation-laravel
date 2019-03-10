@extends('.templates.master')

@section('content')
    <div class="container-scroller">
        @include('.templates.header')
        <div class="container-fluid page-body-wrapper">
            @include('.templates.sidebar')
            <div class="main-panel">
                <div class="content-wrapper">
                  <div class="row">
                    <div class="col-12 grid-margin stretch-card">
                      <div class="card">
                        <div class="card-body">
                          <h4 class="card-title">Password Reset Form</h4>

                          <form class="forms-sample mt-4" method="POST" action="{{ url('administrator/password/update') }}">
                            @csrf

                            <div class="form-group">
                              <label for="exampleInputName1">Name</label>
                              <input type="hidden" name="id" value="{{ $user->id }}">
                              <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" placeholder="Name" required autofocus value="{{ old('name', $user->name)  }}" disabled>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif

                            </div>
                            <div class="form-group">
                              <label for="exampleInputEmail3">Email address</label>
                             
                              <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email', $user->email ) }}" placeholder="Email Address" required disabled>

                              @if ($errors->has('email'))
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $errors->first('email') }}</strong>
                                  </span>
                              @endif

                            </div>

                            <div class="form-group">
                              <label for="exampleInputPassword4">Current Password</label>
                              
                              <input id="curpassword" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Current Password" name="curpassword" required>

                               @if ($errors->has('curpassword'))
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $errors->first('curpassword') }}</strong>
                                  </span>
                              @endif

                            </div>

                            <div class="form-group">
                              <label for="exampleInputPassword4">New Password</label>
                              
                              <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="New Password" name="password" required>

                              @if ($errors->has('password'))
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $errors->first('password') }}</strong>
                                  </span>
                              @endif

                            </div>
                            <div class="form-group">
                              <label for="exampleInputPassword4">Confirm New Password</label>
                              
                              <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm New Password" required>

                            </div>

                            <button type="submit" class="btn btn-gradient-primary mr-2">Reset</button>
                            <a href="{{ url('administrator/list') }}" class="btn btn-gradient-danger mr-2">Cancel</a>
                          </form>
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
