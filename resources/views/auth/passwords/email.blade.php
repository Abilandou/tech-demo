@extends('layouts.adminLayout')
@section('content')

<div class="app">
  <div class="authentication">
      <div class="sign-in-2">
          <div class="container-fluid no-pdd-horizon bg">
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
                                                  <h4 class="mrg-btm-15 font-size-13">Please enter your email to get a password reset link.</h4>
                                                  @if(Session::has('message_error'))
                                                  <div class="alert alert-error alert-block">
                                                      <button type="button" class="close" data-dismiss="alert">x</button>
                                                          <p class="text-danger">{!! session('message_error') !!}</p>
                                                  </div>
                                                  @endif         
                                                  @if(Session::has('message_success'))
                                                  <div class="alert alert-error alert-block">
                                                      <button type="button" class="close" data-dismiss="alert">x</button>
                                                          <p class="text-success">{!! session('message_success') !!}</p>
                                                  </div>
                                                  @endif 
                                                  <form id="loginForm" action="{{route('get.reset.link')}}" method="POST" class="mt-4">
                                                    @csrf
                                                  <div class="form-group mb-4">
                                                <input type="email" name="email" 
                                                placeholder="Email address" 
                                                class="form-control form-control-lg 
                                                @error('email') is-invalid @enderror" 
                                                value="{{ old('email') }}"  autocomplete="email" autofocus>
                                                        @error('email')
                                                            <span class="invalid-feedback">
                                                                {{ $message }}
                                                            </span>
                                                        @enderror
                                                  </div>
                                                  <div class="float-right">
                                                    <button type="submit" class="btn btn-primary shadow px-5">Send Password Reset Link</button>
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