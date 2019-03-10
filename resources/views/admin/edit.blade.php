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
                          <h4 class="card-title">Edit Administrator Form</h4>
                          <form class="forms-sample mt-4" method="POST" action="{{ url('administrator/update') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                              <label for="firstname">First Name</label>

                              <input type="hidden" name="id" value="{{ $user->id }}">
                              <input id="firstname" type="text" class="form-control{{ $errors->has('firstname') ? ' is-invalid' : '' }}" name="firstname" value="{{ old('firstname', $user->firstname) }}" placeholder="First Name" required autofocus>

                                @if ($errors->has('firstname'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('firstname') }}</strong>
                                    </span>
                                @endif

                            </div>

                            <div class="form-group">
                              <label for="lastname">Last Name</label>

                              <input id="lastname" type="text" class="form-control{{ $errors->has('lastname') ? ' is-invalid' : '' }}" name="lastname" value="{{ old('lastname', $user->lastname) }}" placeholder="Last Name" required autofocus>

                                @if ($errors->has('lastname'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('lastname') }}</strong>
                                    </span>
                                @endif

                            </div>

                            <div class="form-group">
                              <label for="gender">Gender</label>

                              <select id="gender" class="form-control{{ $errors->has('gender') ? ' is-invalid' : '' }}" name="gender">
                                @if($user->gender == 'Male')
                                <option value="Male" selected>Male</option>
                                <option value="Female">Female</option>
                                @else
                                <option value="Male">Male</option>
                                <option value="Female" selected>Female</option>
                                @endif
                              </select>

                                @if ($errors->has('gender'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('gender') }}</strong>
                                    </span>
                                @endif

                            </div>

                            <div class="form-group">
                              <label for="address">Address</label>

                              <textarea id="address" type="text" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" placeholder="Address" required rows="2">{{ old('address', $user->address) }}</textarea>

                                @if ($errors->has('address'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif

                            </div>

                            <div class="form-group">
                              <label>Avatar</label><br>

                              <img src="{{ Storage::url($user->avatar) }}" class="mt-3 mb-3" alt="image">

                              <input id="avatar" type="file" class="form-control{{ $errors->has('avatar') ? ' is-invalid' : '' }}" name="avatar" value="{{ old('avatar') }}">

                              @if ($errors->has('avatar'))
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $errors->first('avatar') }}</strong>
                                  </span>
                              @endif

                            </div>

                            <div class="form-group">
                              <label for="exampleInputEmail3">Email Address</label>
                             
                              <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email', $user->email) }}" placeholder="Email Address" required>

                              @if ($errors->has('email'))
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $errors->first('email') }}</strong>
                                  </span>
                              @endif

                            </div>

                            <button type="submit" class="btn btn-gradient-primary mr-2">Update</button>
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
