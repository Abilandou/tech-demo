@extends('layouts.adminLayout')
@section('content')


<!-- Content Wrapper START -->
<div class="main-content">
    <div class="container-fluid">
        <div class="page-title">
            <h4>Update Password</h4>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-block">
                        <div class="table-overflow" >                          
                          <form action="{{route('admin.update.password')}}" method="POST">
                            @csrf
                            <div class="section">
                                <input type="hidden" name="admin_id" value="{{Auth::user()->id}}" >
                                <div class="form-group">
                                    <div class="input-group light-input-group">
                                        <input type="password" placeholder="current password" 
                                            name="current_password"
                                            class="form-control @error('current_password') is-invalid @enderror" 
                                            required autocomplete="current_password">
                                            @error('current_password')
                                                <span class="invalid-feedback text-center">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group light-input-group">
                                        <input type="password" placeholder="new password" 
                                            class="form-control @error('new_password') is-invalid @enderror" name="new_password" 
                                            required autocomplete="new-password">
                                            @error('new_password') 
                                                <span class="invalid-feedback text-center">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group light-input-group">
                                        <input type="password" placeholder="confirm password" 
                                        class="form-control" name="new_password_confirmation" 
                                        required autocomplete="new-password">
                                    </div>
                                </div>
                            </div>
                            <div class="text-right">
                                <button type="submit" class="btn btn-primary btn-lg btn-rounded px-md-5">
                                   Update
                                </button>
                            </div>
                          </form>
                        </div> 
                    </div>
                </div>
          </div>
        </div>
        <!-- Modal Form-->

    </div>
</div>


@endsection