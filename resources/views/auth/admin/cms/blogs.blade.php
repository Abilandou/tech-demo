@extends('layouts.adminLayout')
@section('title', 'Blogs')
@section('content')

<!-- Content Wrapper START -->
<div class="main-content">
<div class="container-fluid">
    <div class="page-title">
        <h4>Blogs</h4>
    </div>
    <div class="row">
    <div class="col-md-12">
        <div class="card">
        <div class="card-block">
            <div class="float-right"> 
                <button type="button" data-toggle="modal" data-target="#addblogModal" class="btn btn-primary">
                    Add
                </button>
            </div>
            <div class="table-overflow">                           
                <table id="dt-opt" class="table table-lg table-hover table-bordered">
                <thead>
                    <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Avatar</th>
                    <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    @if($blogs->count() > 0)
                        @foreach($blogs as $blog)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{$blog->title}}</td>
                                <td>{{Str::limit($blog->description, 15)}}</td>
                                <td><img src="{{route('blog.image',["filename" => $blog->avatar])}}" alt="avatar"
                                    style="max-width: 2.5rem;" class="img-fluid rounded-circle shadow"></td>
                                <td>

                                    <button data-toggle="modal" data-target="#blog-modal{{$blog->id}}" 
                                        class="btn btn-sm btn-success">
                                        <i class="ti-eye">View</i>
                                    </button>
                                    <button data-toggle="modal" data-target="#blog-edit-modal{{$blog->id}}" 
                                            class="btn btn-sm btn-primary">
                                            <i class="ti-pencil">Edit</i>
                                        </button>
                                    <form action="{{ route('admin.delete.blog') }}" method="post" class="delete-form" style="display:inline;">
                                        @csrf
                                        <input type="hidden" name="blog_id" value="{{$blog->id}}" />
                                        <button type="submit" title="Delete blog" 
                                            class="btn btn-danger btn-sm delete-record"><i class="ti-trash"></i> Delete</button>
                                    </form>
                                </td>
                            </tr>

                            {{-- Get blog Details --}}
                            <div class="col-lg-4">
                                <div id="blog-modal{{$blog->id}}" tabindex="-1" role="dialog" 
                                    aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade  modal-lg">
                                    <div role="document" class="modal-dialog">
                                        
                                    <div class="modal-content">
                                        
                                        <div class="modal-body">
                                            <h3 class="h6 text-uppercase mb-0">blog Details</h3><hr/><br/>
                                        <p>Detail Information for: <b class="text-success">{{ $blog->title }}</b></p>
                                            <div class="my-4">
                                                <b class="mr-3">Avatar:</b> <img src="{{route('blog.image',["filename" => $blog->avatar])}}" alt="avatar"
                                                    class="img-fluid rounded-circle shadow">
                                            </div>
                                            <div class="my-2">
                                                <b>blog Title:</b> {{ $blog->title }}
                                            </div>
                                            <div class="my-2">
                                                <b>blog Category:</b> {{ $blog->category['name'] }}
                                            </div>
                                            <div class="my-2">
                                                <b>blog Description:</b> {{ $blog->description }}
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Edit blog Modal --}}
                            <div class="col-lg-4">
                                <div id="blog-edit-modal{{$blog->id}}" tabindex="-1" role="dialog" 
                                    aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade  modal-lg">
                                    <div role="document" class="modal-dialog">
                                        
                                    <div class="modal-content">
                                        
                                        <div class="modal-body">
                                            <h3 class="h6 text-uppercase mb-0">Update blog: {{$blog->title}}</h3><hr/><br/>
                                        <p>Update Servie Information.</p>
                                        <form action="{{ route('blog.update',['blog_id'=>$blog->id]) }}" method="POST" class="form-horizontal mrg-top-40 pdd-right-30" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group row">
                                                <label for="form-1-1" class="col-md-2 control-label">blog title</label>
                                                <div class="col-md-10">
                                                    <input type="text" value="{{$blog->title}}" name="title" required 
                                                    class="form-control" id="form-1-1" placeholder=" blog title">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="form-1-5" class="col-md-2 control-label">Description</label>
                                                <div class="col-md-10">
                                                    <textarea class="form-control" name="description"
                                                        rows="10" id="form-1-5">{{$blog->description}}</textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="input-group light-input-group">
                                                    <select type="text" required value="{{ $blog->category }}"
                                                            placeholder="category id" name="category_id" class="form-control">
                                                        <option value="{{ $blog->category }}" disabled>Select Blog Category
                                                        </option>
                                                        @foreach($categories as $category)
                                                            <option value="{{ $category->id }}"
                                                                    @if($category->name == $blog->category) selected @endif>{{ $category->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="form-1-1" class="col-md-2 control-label">Avatar</label>
                                                <div class="col-md-10">
                                                    <img src="{{route('blog.image',["filename" => $blog->avatar])}}" alt="avatar"
                                                        style="max-width: 2.5rem;" class="img-fluid rounded-circle shadow">
                                                    <input type="file" name="avatar"
                                                    class="form-control" id="form-1-1" placeholder=" Avatar">
                                                </div>
                                            </div>
                                        
                                        </div>
                                        <div class="modal-footer">
                                        <button type="button" data-dismiss="modal" class="btn btn-secondary">Close</button>
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </form>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <tr><td class="text-success">No Record In Table</td></tr>
                    @endif
                
                </tbody>
                </table>
            </div> 
        </div>
        <!-- Modal Form-->
        <div class="col-lg-4">
            <div id="addblogModal" tabindex="-1" role="dialog" 
                aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade  modal-lg">
                <div role="document" class="modal-dialog">
                    
                <div class="modal-content">
                    
                    <div class="modal-body">
                        <h3 class="h6 text-uppercase mb-0">Add blog</h3><hr/><br/>
                    <p>Add A New blog To The System.</p>
                    <form action="{{ route('blog.add') }}" method="POST" class="form-horizontal mrg-top-40 pdd-right-30" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="form-1-1" class="col-md-2 control-label">blog Title</label>
                            <div class="col-md-10">
                                <input type="text" name="title" required 
                                class="form-control" id="form-1-1" placeholder=" blog title">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="form-1-5" class="col-md-2 control-label">Description</label>
                            <div class="col-md-10">
                                <textarea class="form-control" name="description"
                                    rows="10" id="form-1-5"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <select name="category_id" required class="form-control selection my-3 py-2 pl-3" >
                                <option value="" disabled selected>Select Blog Category</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                                @error('category_id')
                                    <span class="invalid-feedback text-center" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="form-group row">
                            <label for="form-1-1" class="col-md-2 control-label">Avatar</label>
                            <div class="col-md-10">
                                <input type="file" name="avatar" required 
                                class="form-control" id="form-1-1" placeholder=" Avatar">
                            </div>
                        </div>
                    
                    </div>
                    <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-secondary">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
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


@endsection