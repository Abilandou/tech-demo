@extends('layouts.adminLayout')
@section('title', 'Reset Password')
@section('content')

<div class="app">
  <div class="authentication">
      <div class="sign-in-2">
          <div class="container-fluid no-pdd-horizon bg" style="background-image: url('public/assets/images/others/img-30.jpg')">
              <div class="row">
                  <div class="col-md-10 mr-auto ml-auto">
                      <div class="row">
                          <div class="mr-auto ml-auto full-height height-100 d-flex align-items-center">
                              <div class="vertical-align full-height">
                                  <div class="table-cell">
                                      <div class="card">
                                          <div class="card-body">
                                              <div class="pdd-horizon-30 pdd-vertical-30">
                                                <div class="mrg-btm-30">
                                                    <img class="img-responsive inline-block" src="{{ asset('public/assets/images/techfavicon.jpg')}}" width="50px" height="50px" alt="">
                                                    <h2 class="inline-block pull-right no-mrg-vertical pdd-top-15 text-uppercase">Reset Password</h2>
                                                </div>
                                                <h4 class="mrg-btm-15 font-size-13">Create a new password below</h4>
                                                @if(Session::has('link-sent'))
                                                    <div class="alert alert-info alert-block">
                                                        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button>
                                                            <p>{!! session('link-sent') !!}</p>
                                                    </div>
                                                @endif
                                                <form id="loginForm" action="{{route('reset.password')}}" method="POST" class="mt-4">
                                                    @csrf
                                                    <input type="hidden" value="{{ $token }}" name="token">
                                                    <div class="form-group mb-4">
                                                        <label for="email">Email</label>
                                                        <input
                                                            style="border: 1px solid rgb(218, 214, 214) !important;"
                                                            type="email" name="email"
                                                            placeholder="Email address"
                                                            class="form-control border-0 shadow form-control-lg
                                                            @error('email') is-invalid @enderror"
                                                            value="{{ old('email') }}" autocomplete="email" autofocus>
                                                            @error('email')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                    </div>
                                                    <div class="form-group mb-4">
                                                        <label for="password">New Password</label>
                                                        <input
                                                            style="border: 1px solid rgb(218, 214, 214) !important;"
                                                            type="password"
                                                            value="{{ old('password') }}"
                                                            name="password" id="loginEmail"
                                                            class="form-control border-0 shadow form-control-lg
                                                            @error('password') is-invalid @enderror"
                                                            placeholder="Password"
                                                            autofocus
                                                        >
                                                        @error('password')
                                                            <span class="text-danger" role="alert">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group mb-4">
                                                        <label for="password">Confirm New Password</label>
                                                        <input
                                                            style="border: 1px solid rgb(218, 214, 214) !important;"
                                                            type="password"
                                                            value="{{ old('password_confirmation') }}"
                                                            name="password_confirmation" id="loginEmail"
                                                            class="form-control border-0 shadow form-control-lg
                                                            @error('password_doncfirmation') is-invalid @enderror"
                                                            placeholder="Confirm Password"
                                                            autofocus
                                                        >
                                                        @error('password_confirmation')
                                                            <span class="text-danger" role="alert">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group mb-2">
                                                        <button type="submit" class="btn btn-primary shadow px-5 btn-block">Reset Password</button>
                                                    </div>
                                                    <div>
                                                        <a href="{{ route('admin.login.form') }}" class="text-primary">Back to Login</a>
                                                    </div>
                                                </form>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>

@endsection