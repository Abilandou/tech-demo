@extends('layouts.adminLayout')
@section('content')

<div class="app">
  <div class="authentication">
      <div class="sign-in-2">
          <div class="container-fluid no-pdd-horizon bg" style="background-image: url('assets/images/others/img-30.jpg')">
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
                                                      <img class="img-responsive inline-block" src="{{ asset('assets/images/techfavicon.jpg')}}" width="50px" height="50px" alt="">
                                                      <h2 class="inline-block pull-right no-mrg-vertical pdd-top-15 text-uppercase">TechRepublic Admin Password Reset</h2>
                                                  </div>
                                                  <h4 class="mrg-btm-15 font-size-13">Reset Password Below</h4>
                                                  <form id="loginForm" action="{{route('admin.password.update')}}" method="POST" class="mt-4">
                                                    @csrf
                                                  <div class="form-group mb-4">
                                                    <input type="email" name="email" 
                                                        placeholder="Email address" 
                                                        class="form-control form-control-lg 
                                                        @error('email') is-invalid @enderror" 
                                                        value="{{ old('email') }}" autocomplete="email" autofocus>
                                                        @error('email')
                                                            <span class="invalid-feedback" role="alert">
                                                                <p class="text-danger">{{ $message }}</p>
                                                            </span>
                                                        @enderror
                                                  </div>
                                                  <div class="form-group mb-4">
                                                    <input id="password" placeholder="Password" 
                                                        type="password" class="form-control @error('password') is-invalid @enderror" 
                                                        name="password" autocomplete="new-password">
                                                    @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <p class="text-danger">{{ $message }}</p>
                                                        </span>
                                                    @enderror     
                                                </div>
                                                <div class="form-group text-center mb-4">
                                                    <input id="password-confirm" type="password" 
                                                        placeholder="confirm password" class="form-control" 
                                                        name="password_confirmation" autocomplete="new-password">
                                                </div>

                                                  <div class="float-right">
                                                    <button type="submit" class="btn btn-primary shadow px-5">Reset Password</button>
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