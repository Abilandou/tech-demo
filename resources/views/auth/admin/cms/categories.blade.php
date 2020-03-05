@extends('layouts.adminLayout')
@section('content')


<!-- Content Wrapper START -->
<div class="main-content">
    <div class="container-fluid">
        <div class="page-title">
            <h4>Blog Categories</h4>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-block">
                        <div class="float-right"> 
                            <button data-toggle="modal" data-target="#addcategoryModal" 
                            class="btn btn-sm btn-primary" style="float:right">
                            <i class="ti-plus"></i>Add
                            </button>
                        </div>
            
                        <div class="table-overflow" >                          
                            <table id="dt-opt" class="table table-lg table-hover table-bordered">
                                <thead>
                                    <tr>
                                      <th>#</th>
                                      <th>Name</th>
                                      <th>Description</th>
                                      <th>Action</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                      <?php $i = 1; ?>
                                      @if($categories->count() > 0)
                                          @foreach($categories as $category)
                                              <tr>
                                                  <td>{{ $i++ }}</td>
                                                  <td>{{$category->name}}</td>
                                                  <td>{{Str::limit($category->description, 15)}}</td>
                                                  <td>
                                                      <button data-toggle="modal" data-target="#category-modal{{$category->id}}" 
                                                          class="btn btn-sm btn-success">
                                                          <i class="ti-eye">View</i>
                                                      </button>
                                                      <button data-toggle="modal" data-target="#category-edit-modal{{$category->id}}" 
                                                              class="btn btn-sm btn-primary">
                                                              <i class="ti-pencil">Edit</i>
                                                          </button>
                                                      <form action="{{ route('admin.delete.category') }}" method="post" class="delete-form" style="display:inline;">
                                                          @csrf
                                                          <input type="hidden" name="category_id" value="{{$category->id}}" />
                                                          <button type="submit" title="Delete category" 
                                                              class="btn btn-danger btn-sm delete-record"><i class="ti-trash"></i> Delete</button>
                                                      </form>
                                                  </td>
                                              </tr>
                  
                                              {{-- Get category Details --}}
                                              <div class="modal fade" id="category-modal{{$category->id}}">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="text-center">category Details</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="my-2">
                                                                        <b>category Name:</b> {{ $category->name }}
                                                                    </div>
                                                                    <div class="my-2">
                                                                        <b>category Description:</b> {{ $category->description }}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                              </div>
                  
                                              {{-- Edit category Modal --}}
                                              <div class="modal fade" id="category-edit-modal{{$category->id}}">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="text-center">UPDATE: {{$category->name}}</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <form action="{{ route('category.update',['category_id'=>$category->id]) }}" method="POST" class="form-horizontal mrg-top-40 pdd-right-30">
                                                                        @csrf
                                                                        <div class="form-group row">
                                                                            <label for="form-1-1" class="col-md-2 control-label">category Name</label>
                                                                            <div class="col-md-10">
                                                                                <input type="text" value="{{$category->name}}" name="name" required 
                                                                                class="form-control" id="form-1-1" placeholder=" category Name">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label for="form-1-5" class="col-md-2 control-label">Description</label>
                                                                            <div class="col-md-10">
                                                                                <textarea class="form-control" name="description"
                                                                                    rows="10" id="form-1-5">{{$category->description}}</textarea>
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
<div class="modal fade" id="addcategoryModal">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="text-center">ADD A NEW CATEGORY</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{ route('category.add') }}" method="POST" class="form-horizontal mrg-top-40 pdd-right-30">
                            @csrf
                            <div class="form-group row">
                                <label for="form-1-1" class="col-md-2 control-label">category Name</label>
                                <div class="col-md-10">
                                    <input type="text" name="name" required 
                                    class="form-control" id="form-1-1" placeholder=" category Name">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="form-1-5" class="col-md-2 control-label">Description</label>
                                <div class="col-md-10">
                                    <textarea class="form-control" name="description"
                                        rows="10" id="form-1-5"></textarea>
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

@endsection