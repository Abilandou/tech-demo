@extends('layouts.adminLayout')
@section('content')

<div class="container-fluid px-xl-5 justify-content-center">
    <section class="py-5 center">
      <div class="row">
        <!-- Basic Form-->
        <div class="col-lg-6 mb-5">
          <div class="card">
            <div class="card-header">
              <h3 class="h6 text-uppercase mb-0">TechRepublic Admin Registeration</h3>
            </div>
            <div class="card-body">
              <p>Register A new Administrator</p>
              <form  action="{{route('admin.register')}}" method="POST" >
                @csrf
                <div class="form-group">
                    <label class="form-control-label text-uppercase">Name</label>
                    <input type="text" name="name" placeholder="Name" 
                        class="form-control @error('name') is-invalid @enderror" 
                        value="{{ old('name') }}" required autocomplete="name" autofocus>
                    @error('name')
                        <span class="invalid-feedback text-center" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                  <label class="form-control-label text-uppercase">Email</label>
                  <input type="email" name="email" placeholder="Email Address" 
                    class="form-control @error('email') is-invalid @enderror" 
                    value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                        <span class="invalid-feedback text-center" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">       
                  <label class="form-control-label text-uppercase">Password</label>
                  <input type="password" name="password" placeholder="Password" 
                        class="form-control @error('password') is-invalid @enderror" 
                        name="password" required autocomplete="new-password">
                        @error('password')
                        <span class="invalid-feedback text-center" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror     
                </div>

                <div class="form-group">       
                    <label class="form-control-label text-uppercase">Corfirm Password</label>
                    <input type="password" name="password_confirmation" 
                        placeholder="Confirm Password" class="form-control" 
                        autocomplete="new-password">
                  </div>

                <div class="form-group float-right">       
                  <button type="submit" class="btn btn-primary">Register</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>



@endsection