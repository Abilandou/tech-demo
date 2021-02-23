@extends('layouts.adminLayout')
@section('title', 'Item Categories')
@section('content')

<!-- Content Wrapper START -->
<div class="main-content">
    <div class="container-fluid">
        <div class="page-title">
            <h4>Item Categories</h4>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-block">
                        <div class="float-right"> 
                            <button data-toggle="modal" data-target="#additemCategoryModal" 
                            class="btn btn-sm btn-primary" style="float:right">
                            <i class="ti-plus"></i>Add
                            </button>
                        </div>
            
                        <div class="table-overflow">
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
                                    @foreach($itemCategories as $itemCategory)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>{{$itemCategory->name}}</td>
                                            <td>{{Str::limit($itemCategory->description, 15)}}</td>
                                            <td>
                                                <button data-toggle="modal" data-target="#itemCategory-modal{{$itemCategory->id}}" 
                                                    class="btn btn-sm btn-success">
                                                    <i class="ti-eye">View</i>
                                                </button>
                                                <button data-toggle="modal" data-target="#itemCategory-edit-modal{{$itemCategory->id}}" 
                                                        class="btn btn-sm btn-primary">
                                                        <i class="ti-pencil">Edit</i>
                                                </button>
                                                <form action="{{ route('item.category.delete') }}" method="post" class="delete-form" style="display:inline;">
                                                    @csrf
                                                    <input type="hidden" name="item_category_id" value="{{$itemCategory->id}}" />
                                                    <button type="submit" title="Delete item Category" 
                                                        class="btn btn-danger btn-sm delete-record"><i class="ti-trash"></i> Delete</button>
                                                </form>
                                            </td>
                                        </tr>

                                        {{-- Get itemCategory Details --}}

                                        <div class="modal fade" id="itemCategory-modal{{$itemCategory->id}}">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="text-center">Detail Information for: <b class="text-success">{{ $itemCategory->name }}</b></h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="my-2">
                                                                    <b>itemCategory Name:</b> {{ $itemCategory->name }}
                                                                </div>
                                                                <div class="my-2">
                                                                    <b>itemCategory Description:</b> {{ $itemCategory->description }}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- Edit itemCategory Modal --}}
                                        <div class="modal fade" id="itemCategory-edit-modal{{$itemCategory->id}}">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="text-center">UPDATE: {{$itemCategory->name}}</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <form action="{{ route('item.category.update',['item_category_id'=>$itemCategory->id]) }}" method="POST" class="form-horizontal mrg-top-40 pdd-right-30" enctype="multipart/form-data">
                                                                    @csrf
                                                                    <div class="form-group row">
                                                                        <label for="form-1-1" class="col-md-2 control-label">itemCategory Name</label>
                                                                        <div class="col-md-10">
                                                                            <input type="text" value="{{$itemCategory->name}}" name="name" required 
                                                                            class="form-control" id="form-1-1" placeholder=" itemCategory Name">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label for="form-1-5" class="col-md-2 control-label">Description</label>
                                                                        <div class="col-md-10">
                                                                            <textarea class="form-control" name="description"
                                                                                rows="10" id="form-1-5">{{$itemCategory->description}}</textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer float-right">
                                                                    <button type="button" data-dismiss="modal" class="btn btn-secondary">Close</button>
                                                                    <button type="submit" class="btn btn-primary">Update</button>
                                                                </div>
                                                            </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    @endforeach
                                </tbody>
                            </table>
                        </div> 
                    </div>
                </div>
          </div>
        </div>
        <!-- Modal Form-->

        <div class="modal fade" id="additemCategoryModal">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="text-center">ADD A NEW ITEM CATEGORY</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                                <div class="col-md-12">
                                    <form action="{{ route('item.category.add') }}" method="POST" class="form-horizontal mrg-top-40 pdd-right-30" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group row">
                                            <label for="form-1-1" class="col-md-2 control-label">itemCategory Name</label>
                                            <div class="col-md-10">
                                                <input type="text" name="name" required 
                                                class="form-control" id="form-1-1" placeholder=" itemCategory Name">
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

    </div>


@endsection