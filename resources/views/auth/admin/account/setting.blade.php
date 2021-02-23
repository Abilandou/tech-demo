@extends('layouts.adminLayout')
@section('title', 'Setting')
@section('content')


<!-- Content Wrapper START -->
<div class="main-content">
    <div class="container-fluid">
        <div class="page-title">
            <h4>Password Update</h4>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-block">
                        <form action="{{ route('admin.update.password') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-sm-12 col-lg-4 col-md-6">
                                    <div class="form-group">
                                        <label for="">Current Passowrd</label>
                                        <input
                                            type="password" 
                                            class="form-control @error('existing_password') is-invalid @enderror" 
                                            name="existing_password" 
                                            value="{{ old('existing_password') }}"
                                            id="input" 
                                        />
                                        @error('existing_password')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-12 col-lg-4 col-md-6">
                                    <div class="form-group">
                                        <label for="password">New Password</label>
                                        <input 
                                            type="password" 
                                            class="form-control @error('password') is-invalid @enderror" 
                                            name="password" 
                                            value="{{ old('password') }}"
                                            id="input" 
                                        />
                                        @error('password')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-12 col-lg-4 col-md-6">
                                    <div class="form-group">
                                        <label for="password_confirmation">Confirm Password</label>
                                        <input 
                                            type="password" 
                                            class="form-control" 
                                            name="password_confirmation" 
                                            value="{{ old('password_confirmation') }}"
                                            id="input" 
                                        />
                                    </div>
                                </div>
                                <div class="col-sm-12 col-lg-4 col-md-6">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </div>
                    </form>
                    </div>
                </div>
          </div>
        </div>
    </div>
</div>


@endsection