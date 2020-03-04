@extends('layouts.adminLayout')
@section('content')


<div class="container-fluid px-xl-5">
    <section class="py-5">
      <div class="row">
        <div class="col-lg-12 mb-4">
          <div class="card">
            <div class="card-header">
              <h6 class="text-uppercase mb-0">Categories</h6>
              <div class="float-right"> 
                  <button type="button" data-toggle="modal" data-target="#addcategoryModal" class="btn btn-primary">
                      Add
                    </button>
                </div>
            </div>
            <div class="card-body">                           
              <table class="table table-striped table-hover table-bordered card-text">
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
                            <div class="col-lg-4 mb-5">
                                <div id="category-modal{{$category->id}}" tabindex="-1" role="dialog" 
                                    aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade  modal-lg">
                                    <div role="document" class="modal-dialog">
                                        
                                    <div class="modal-content">
                                        
                                        <div class="modal-body">
                                            <h3 class="h6 text-uppercase mb-0">category Details</h3><hr/><br/>
                                        <p>Detail Information for: <b class="text-success">{{ $category->name }}</b></p>
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

                            {{-- Edit category Modal --}}
                            <div class="col-lg-4 mb-5">
                                <div id="category-edit-modal{{$category->id}}" tabindex="-1" role="dialog" 
                                    aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade  modal-lg">
                                    <div role="document" class="modal-dialog">
                                        
                                    <div class="modal-content">
                                        
                                        <div class="modal-body">
                                            <h3 class="h6 text-uppercase mb-0">Update category: {{$category->name}}</h3><hr/><br/>
                                        <p>Update Servie Information.</p>
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
                        @endforeach
                    @else
                        <tr><td class="text-success">No Record In Table</td></tr>
                    @endif
                
                </tbody>
              </table>
            </div> 
          </div>
            <!-- Modal Form-->
            <div class="col-lg-4 mb-5">
                <div id="addcategoryModal" tabindex="-1" role="dialog" 
                    aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade  modal-lg">
                    <div role="document" class="modal-dialog">
                        
                    <div class="modal-content">
                        
                        <div class="modal-body">
                            <h3 class="h6 text-uppercase mb-0">Add category</h3><hr/><br/>
                        <p>Add A New category To The System.</p>
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
      </div>
    </section>
  </div>


@endsection