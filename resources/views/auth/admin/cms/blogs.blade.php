@extends('layouts.adminLayout')
@section('content')


<!-- Content Wrapper START -->
<div class="main-content">
    <div class="container-fluid">
        <div class="page-title">
            <h4>Team Members</h4>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-block">
                        <div class="float-right"> 
                            <button data-toggle="modal" data-target="#addblogModal" 
                            class="btn btn-sm btn-primary" style="float:right">
                            <i class="ti-plus"></i>Add
                            </button>
                        </div>
            
                        <div class="table-overflow" >                          
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
                                                  <td><img src="{{asset($blog->avatar)}}" alt="avatar"
                                                      style="max-width: 2.5rem;" class="img-fluid rounded-circle shadow"></td>
                                                  <td>
                                                      <a href="{{route('blog.detail', ['blog_id'=>$blog->id])}}" class="btn btn-sm btn-success"><i class="ti-eye">View</i></a>
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

                                              <div class="modal fade" id="blog-modal{{$blog->id}}">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="text-center">Detail Information for: <b class="text-success">{{ $blog->title }}</b></h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="my-4">
                                                                        <b class="mr-3">Avatar:</b> <img src="{{asset($blog->avatar)}}" alt="avatar"
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
                                              </div>
                  
                                              {{-- Edit blog Modal --}}
                                              <div class="modal fade" id="blog-edit-modal{{$blog->id}}">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="text-center">UPDATE: {{$blog->title}}</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <form action="{{ route('blog.update',['blog_id'=>$blog->id]) }}" method="POST" class="form-horizontal mrg-top-40 pdd-right-30" enctype="multipart/form-data">
                                                                        @csrf
                                                                        <div class="form-group row">
                                                                            <label for="form-1-1" class="col-md-2 control-label">blog title</label>
                                                                            <div class="col-md-10">
                                                                                <input type="text" value="{{old('title', $blog->title)}}" name="title" 
                                                                                class="form-control @error('title') is-invalid @enderror" id="form-1-1" placeholder=" blog title">
                                                                                @error('title')
                                                                                    <span class="invalid-feedback">{{$message}}</span>
                                                                                @enderror
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label for="form-1-5" class="col-md-2 control-label">Description</label>
                                                                            <div class="col-md-10">
                                                                                <textarea class="form-control @error('title') is-invalid @enderror" name="description"
                                                                                    rows="10" id="form-1-5">{{old('description', $blog->description)}}</textarea>
                                                                                    @error('description')
                                                                                        <span class="invalid-feedback">{{$message}}</span>
                                                                                    @enderror
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <div class="input-group light-input-group">
                                                                                <select type="text" value="{{ $blog->category }}"
                                                                                        placeholder="category id" name="category" class="form-control">
                                                                                    <option value="{{ $blog->category }}" disabled>Select Blog Category
                                                                                    </option>
                                                                                    @foreach($categories as $category)
                                                                                        <option value="{{ $category->id }}" 
                                                                                                @if($category->name == $blog->category) selected @endif {{(old('category')==$category->id) ? 'selected': '' }}>{{ $category->name }}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label for="form-1-1" class="col-md-2 control-label">Avatar</label>
                                                                            <div class="col-md-10">
                                                                                <img src="{{asset($blog->avatar)}}" alt="avatar"
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
                                              </div>

                                             
                                          @endforeach
                                      @else
                                          <tr><td class="text-success">No Record In Table</td></tr>
                                      @endif
                                  
                                  </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Add Modal Form-->

<div class="modal fade" id="addblogModal">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="text-center">ADD A NEW BLOG</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{ route('blog.add') }}" method="POST" class="form-horizontal mrg-top-40 pdd-right-30" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label for="form-1-1" class="col-md-2 control-label">blog Title</label>
                                <div class="col-md-10">
                                    <input type="text" name="title" value="{{old('title')}}"
                                    class="form-control @error('title') is-invalid @enderror" id="form-1-1" placeholder=" blog title">
                                    @error('title')
                                        <span class="invalid-feedback">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="form-1-5" class="col-md-2 control-label">Description</label>
                                <div class="col-md-10">
                                    <textarea class="form-control @error('description') is-invalid @enderror" name="description"
                                        rows="10" id="form-1-5">{{old('description')}}</textarea>
                                        @error('description')
                                            <span class="invalid-feedback">{{$message}}</span>
                                        @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <select name="category" class="form-control @error('category') is-invalid @enderror" >
                                    <option value="" disabled selected>Select Blog Category</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{(old('category')==$category->id) ? 'selected': '' }}>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                    @error('category')
                                        <span class="invalid-feedback text-center" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
                            <div class="form-group row">
                                <label for="form-1-1" class="col-md-2 control-label">Avatar</label>
                                <div class="col-md-10">
                                    <input type="file" name="avatar" 
                                    class="form-control @error('avatar') is-invalid @enderror" id="form-1-1" placeholder=" Avatar">
                                    @error('avatar')
                                        <span class="invalid-feedback text-center" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
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

<script>
    $(function(){
        @if(count($errors) > 0)
            $('#addblogModal').modal('show');
        @endif
    });
</script>

@endsection