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
                          <h4 class="card-title">Edit Contact Form</h4>
                          <form class="forms-sample mt-4" method="POST" action="{{ url('contact/update') }}">
                            @csrf

                            <div class="form-group">
                              <label for="firstname">First Name</label>

                              <input type="hidden" name="id" value="{{ $contact->id }}">
                              <input id="firstname" type="text" class="form-control{{ $errors->has('firstname') ? ' is-invalid' : '' }}" name="firstname" value="{{ old('firstname', $contact->firstname) }}" placeholder="First Name" required autofocus>

                                @if ($errors->has('firstname'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('firstname') }}</strong>
                                    </span>
                                @endif

                            </div>

                            <div class="form-group">
                              <label for="lastname">Last Name</label>

                              <input id="lastname" type="text" class="form-control{{ $errors->has('lastname') ? ' is-invalid' : '' }}" name="lastname" value="{{ old('lastname', $contact->lastname) }}" placeholder="Last Name" required>

                                @if ($errors->has('lastname'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('lastname') }}</strong>
                                    </span>
                                @endif

                            </div>

                            <div class="form-group">
                              <label for="address">Address</label>

                              <textarea id="address" type="text" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" placeholder="Address" required rows="2">{{ old('address', $contact->address) }}</textarea>

                                @if ($errors->has('address'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif

                            </div>

                            <div class="form-group">
                              <label for="area">Area</label>

                              {{Form::select('area', App\Area::pluck('area'), old('area', $contact->area->area), array('class' => 'form-control'))}}

                                @if ($errors->has('area'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('area') }}</strong>
                                    </span>
                                @endif

                            </div>

                            <div class="form-group">
                              <label for="contact">Contact Number</label>

                              <input id="contact" type="text" class="form-control{{ $errors->has('contact') ? ' is-invalid' : '' }}" name="contact" value="{{ old('contact', $contact->contact) }}" placeholder="Contact" required>

                                @if ($errors->has('contact'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('contact') }}</strong>
                                    </span>
                                @endif

                            </div>
                            
                            <button type="submit" class="btn btn-gradient-primary mr-2">Update</button>
                            <a href="{{ url('contact/list') }}" class="btn btn-gradient-danger mr-2">Cancel</a>

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
