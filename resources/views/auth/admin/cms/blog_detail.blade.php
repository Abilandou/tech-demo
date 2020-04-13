@extends('layouts.adminLayout')
@section('content')


<!-- Content Wrapper START -->
<div class="main-content">
    <div class="container-fluid">
        <div class="page-title">

            <h4>
                <a href="{{route('shop.items')}}" class="link-primary"><b><i class="ti-angle-left ti-lg"></i></b></a>
                Blog: {{$blog->title}} Information
            </h4>
        </div>
        <div class="row">
            <div class="col-md-12">
                <form action="{{ route('blog.update',['blog_id'=>$blog->id]) }}" enctype="multipart/form-data" method="post">
                    @csrf
                    <div class="row col-md-12">
                        <div class="col-md-4">
                            <div class="widget-profile-1 card">
                                <div class="profile border bottom">
                                    @if($blog->avatar == null)
                                        <img class="mrg-top-30" src="{{asset('img/camera-preview.png')}}" width="200px" height="200px" alt="">
                                    @else
                                        <img class="mrg-top-30" src="{{asset($blog->avatar)}}" width="200px" height="200px" alt="">
                                    @endif
                                        <input type="file" name="avatar" class="form-control @error('avatar') is-invalid @enderror">
                                        @error('avatar')
                                            <span class="invalid-feedback">{{$message}}</span>
                                        @enderror
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
                                            <p class="mrg-top-10 text-dark"> <b>Title</b></p>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{old('title', $blog->title)}}">
                                            @error('title')
                                                <span class="invalid-feedback">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <p class="mrg-top-10 text-dark"> <b>Category</b></p>
                                            </div>
                                            <div class="col-md-6">
                                                <select type="text"  
                                                        placeholder="item category" name="category" class="form-control @error('item_category') is-invalid @enderror">
                                                    <option value="{{ $blog->category['name'] }}" disabled>Select Category
                                                    </option>
                                                    @foreach(\App\Category::all() as $blogCategory)
                                                        <option value="{{ $blogCategory->id }}" 
                                                                @if($blogCategory->name == $blog->category['name']) selected @endif>{{ $blogCategory->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('category')
                                                    <span class="invalid-feedback text-center" role="alert">
                                                        {{ $message }}
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <hr>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <p class="mrg-top-10 text-dark"> <b>Description</b></p>
                                        </div>
                                        <div class="col-md-6">
                                            <textarea name="description" class="form-control @error('description') is-invalid @enderror" cols="50" rows="3">{{old('description', $blog->description)}}</textarea>
                                            @error('description')
                                            <span class="invalid-feedback text-center" role="alert">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 mt-3" style="float:right">
                                        <button type="submit" class="btn btn-primary btn-sm ml-5" ><i class="ti-pencil">Update</i></button>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            
            </div>
        </div>
    </div>
</div>

@endsection