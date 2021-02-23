@extends('layouts.adminLayout')
@section('title', 'Profile')
@section('content')


<!-- Content Wrapper START -->
<div class="main-content">
    <div class="container-fluid">
        <div class="page-title">
            <h4>Profile Information</h4>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-block">
                        <form action="{{ route('admin.update.profile') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-sm-12 col-lg-4 col-md-6">
                                    <div class="form-group">
                                        <label for="">Name</label>
                                        <input
                                            type="text" 
                                            class="form-control @error('name') is-invalid @enderror" 
                                            name="name" 
                                            value="{{ old('name', Auth::guard('admin')->user()->name) }}"
                                            id="input" 
                                        />
                                        @error('name')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-12 col-lg-4 col-md-6">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input 
                                            type="email" 
                                            class="form-control @error('email') is-invalid @enderror" 
                                            name="email" 
                                            value="{{ old('email', Auth::guard('admin')->user()->email) }}"
                                            id="input" 
                                        />
                                        @error('email')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
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