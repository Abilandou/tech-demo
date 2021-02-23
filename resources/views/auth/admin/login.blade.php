@extends('layouts.adminLayout')
@section('title', 'Login')
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
                                                    <h2 class="inline-block pull-right no-mrg-vertical pdd-top-15 text-uppercase">TechRepublic Admin Login</h2>
                                                </div>
                                                <h4 class="mrg-btm-15 font-size-13">Please enter your email and password to login</h4>
                                                <form id="loginForm" action="{{route('admin.login')}}" method="POST" class="mt-4">
                                                    @csrf
                                                    <div class="form-group mb-4">
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
                                                        <input
                                                            style="border: 1px solid rgb(218, 214, 214) !important;"
                                                            type="password" name="password" 
                                                            placeholder="Password" class="form-control 
                                                            border-0 shadow form-control-lg text-violet 
                                                            @error('password') is-invalid @enderror" 
                                                            name="password" autocomplete="current-password">
                                                            @error('password')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    <div class="d-flex" style="justify-content: space-between;">
                                                        <div>
                                                            <a href="{{ route('show.verify.email') }}" class="text-primary">Forgot Password?</a>
                                                        </div>
                                                        <div class="float-right">
                                                            <button type="submit" class="btn btn-primary shadow px-5">Log in</button>
                                                        </div>
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