@extends('layouts.adminLayout')
@section('content')

<!-- Content Wrapper START -->
<div class="main-content">
    <div class="container-fluid">
        <div class="page-title">

            <h4>
                <a href="{{route('cms.members')}}" class="link-primary"><b><i class="ti-angle-left ti-lg"></i></b></a>
                Member: {{$member->name}} Detail Information.
            </h4>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="row col-md-12">                    
                    <form action="{{ route('member.update',['member_id'=>$member->id]) }}" method="POST" enctype="multipart/form-data" class="row col-md-12" >
                        @csrf
                        <input type="hidden" name="member_id" value="{{ $member->id }}">
                        <div class="col-md-4">
                            <div class="widget-profile-1 card">
                                <div class="profile border bottom">
                                    @if($member->avatar == null)
                                    <img class="mrg-top-30" src="{{asset('img/camera-preview.png')}}" width="200px" height="200px" alt="">
                                    @else
                                    <img class="mrg-top-30" src="{{asset($member->avatar)}}" width="200px" height="200px" alt="">
                                    @endif
                                    <input type="file" name="avatar" title="Edit Profile" class="form-control">
                                    <h4 class="mrg-top-20 no-mrg-btm text-semibold">{{$member->name}}</h4>
                                    <p>{{$member->position}}</p>
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
                                        <div class="col-md-9">
                                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{old('name', $member->name)}}">
                                            @error('name')
                                                <span class="invalid-feedback">{{$message}}</span>
                                            @enderror
                                        </div>
                                        
                                    </div>
                                        <hr>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <p class="mrg-top-10 text-dark"> <b>Email</b></p>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{old('email', $member->email)}}">
                                            @error('email')
                                                <span class="invalid-feedback">{{$message}}</span>
                                            @enderror
                                        </div>
                                        
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <p class="mrg-top-10 text-dark"> <b>Phone</b></p>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{old('phone', $member->phone)}}">
                                            @error('phone')
                                                <span class="invalid-feedback">{{$message}}</span>
                                            @enderror
                                        </div>
                                       
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <p class="mrg-top-10 text-dark"> <b>Position</b></p>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control @error('position') is-invalid @enderror" name="position" value="{{old('position', $member->position)}}">
                                            @error('position')
                                                <span class="invalid-feedback">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <p class="mrg-top-10 text-dark"> <b>Youtube</b></p>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control @error('youtube') is-invalid @enderror" name="youtube" value="{{old('youtube', $member->youtube)}}">
                                            @error('youtube')
                                                <span class="invalid-feedback">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <p class="mrg-top-10 text-dark"> <b>FaceBook</b></p>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control @error('facebook') is-invalid @enderror" name="facebook" value="{{old('facebook', $member->facebook)}}">
                                            @error('facebook')
                                                <span class="invalid-feedback">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <p class="mrg-top-10 text-dark"> <b>Twitter</b></p>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control @error('twitter') is-invalid @enderror" name="twitter" value="{{old('twitter', $member->twitter)}}">
                                            @error('twitter')
                                                <span class="invalid-feedback">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <p class="mrg-top-10 text-dark"> <b>About Member</b></p>
                                        </div>
                                        <div class="col-md-9">
                                            <textarea name="description" class="form-control @error('description') is-invalid @enderror" cols="45" rows="8">{{old('description', $member->description)}}</textarea>
                                            @error('description')
                                                <span class="invalid-feedback">{{$message}}</span>
                                            @enderror
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
</div>

@endsection
