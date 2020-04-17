@extends('layouts.adminLayout')
@section('content')

<!-- Content Wrapper START -->
<div class="main-content">
    <div class="container-fluid">
        <div class="page-title">

            <h4>Account Information</h4>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="row col-md-12">
                    
                    <form action="{{ route('admin.update.account') }}" method="POST" enctype="multipart/form-data" class="row col-md-12" >
                        @csrf
                        <input type="hidden" name="admin_id" value="{{ Auth::user()->id }}">
                        <div class="col-md-4">
                            <div class="widget-profile-1 card">
                                <div class="profile border bottom">
                                    @if(Auth::user()->avatar == null)
                                    <img class="mrg-top-30" src="{{asset('img/camera-preview.png')}}" width="200px" height="200px" alt="">
                                    @else
                                    <img class="mrg-top-30" src="{{asset(Auth::user()->avatar)}}" width="200px" height="200px" alt="">
                                    @endif
                                    <input type="file" name="avatar" title="Edit Profile" class="form-control">
                                    <h4 class="mrg-top-20 no-mrg-btm text-semibold">{{Auth::user()->name}}</h4>
                                    <p>Administrator</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-heading border bottom">
                                    <h4 class="card-title">General Info</h4>
                                </div>
                                <div class="card-block">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <p class="mrg-top-10 text-dark"> <b>Name</b></p>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="name" required value="{{Auth::user()->name}}">
                                        </div>
                                    </div>
                                        <hr>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <p class="mrg-top-10 text-dark"> <b>Email</b></p>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="email" required value="{{Auth::user()->email}}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6" style="float:right">
                                    <button type="submit" class="btn btn-primary btn-sm ml-5" ><i class="ti-pencil">Update</i></button>
                                </div>
                        </div>
                    
                    </form>
                </div>
            
            </div>
        </div>
    </div>
    <hr>
    @if(Auth::user()->is_supper_admin == true)
        <div class="container-fluid card my-5">
            <div class="page-title">
                <h4>
                    Other Administrators
                    <button data-toggle="modal" title="Add Administrator" style="float-right" data-target="#add-admin-modal" 
                        class="btn btn-sm btn-primary mt-2 ml-5">
                        <i class="ti-plus"></i>Add Admin
                    </button>
                </h4>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="table-overflow">
                        <table id="dt-opt" class="table table-lg table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name @if(!Auth::user()->is_supper_admin == '1') you @else no @endif</th>
                                    <th>Email</th>
                                    <th>avatar</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=1; ?>
                                @foreach ($admins as $admin)
                                @if(Auth::user()->id != $admin->id)
                                    <tr>
                                        <td>
                                            <div class="relative mrg-top-15">
                                                <span class="pdd-left-20">{{$i++}}</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="relative mrg-top-15">
                                                <span class="pdd-left-20">{{$admin->name}}</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="relative mrg-top-15">
                                                <span class="pdd-left-20">{{$admin->email}}</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="relative mrg-top-15">
                                                @if($admin->avatar == null)
                                                    <a href="{{ asset('img/camera-preview.png') }}" class="view-image"><img src="{{asset('img/camera-preview.png')}}" width="20px" height="20px" class="img-fluid"></a>
                                                @else
                                                    <a href="{{ asset($admin->avatar) }}" class="view-image"><img src="{{asset($admin->avatar)}}" width="20px" height="20px" class="img-fluid"></a>
                                                @endif
                                            </div>
                                        </td>
                                        <td>
                                            <form action="{{ route('admin.delete') }}" method="post" class="delete-form" style="display:inline;">
                                                @csrf
                                                <input type="hidden" name="admin_id" value="{{$admin->id}}" />
                                                <button type="submit" title="Delete Admin" 
                                                    class="btn btn-danger btn-sm delete-record"><i class="ti-trash"></i> Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endif
                            
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
<!-- Content Wrapper END -->

{{-- Other admins section --}}


<div class="modal fade" id="add-admin-modal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="text-center">Add Another Administrator</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                        <div class="col-md-12">
                        <form action="{{ route('add.admin') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <input id="name" name="name" 
                                        placeholder="name" type="text" 
                                        class="form-control @error('name') is-invalid @enderror" 
                                        value="{{ old('name') }}" required autocomplete="name" autofocus>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div> <!-- form-group// -->
                                <div class="form-group">
                                    <input id="email" name="email" 
                                        placeholder="Email" type="email" 
                                        class="form-control @error('email') is-invalid @enderror" 
                                        value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group text-center mb-4">
                                    <input id="password" placeholder="Password" 
                                        type="password" class="form-control @error('password') is-invalid @enderror" 
                                        name="password" required autocomplete="new-password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror     
                                </div>
                                <div class="form-group text-center mb-4">
                                    <input id="password-confirm" type="password" 
                                        placeholder="confirm password" class="form-control" 
                                        name="password_confirmation" required autocomplete="new-password">
                                </div>
                        </div>
                </div>
            </div>
            <div class="modal-footer no-border">
                <div class="text-right">
                    <button class="btn btn-default btn-sm" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary btn-sm">Add</button>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- End Add Other admins --}}

@endsection
