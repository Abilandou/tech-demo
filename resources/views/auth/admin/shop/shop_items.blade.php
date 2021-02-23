@extends('layouts.adminLayout')
@section('title', 'Shop Items')
@section('content')


<!-- Content Wrapper START -->
<div class="main-content">
    <div class="container-fluid">
        <div class="page-title">
            <h4>SHOP ITEMS</h4>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-block">
                        <div class="float-right"> 
                            <button data-toggle="modal" data-target="#addshop_itemModal" 
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
                                    <th>Avatar</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    @foreach($shopItems as $shop_item)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>{{$shop_item->name}}</td>
                                            <td>{{Str::limit($shop_item->description, 15)}}</td>
                                            <td><img src="{{route('item.image',['filename'=>$shop_item->avatar])}}" alt="avatar"
                                                style="max-width: 2.5rem;" class="img-fluid rounded-circle shadow"></td>
                                            <td>

                                                <button data-toggle="modal" data-target="#shop_item-modal{{$shop_item->id}}" 
                                                    class="btn btn-sm btn-success">
                                                    <i class="ti-eye">View</i>
                                                </button>
                                                <button data-toggle="modal" data-target="#shop_item-edit-modal{{$shop_item->id}}" 
                                                    class="btn btn-sm btn-primary">
                                                    <i class="ti-pencil">Edit</i>
                                                </button>
                                                <form action="{{ route('shop.delete.item') }}" method="post" class="delete-form" style="display:inline;">
                                                    @csrf
                                                    <input type="hidden" name="shop_item_id" value="{{$shop_item->id}}" />
                                                    <button type="submit" title="Delete shop_item" 
                                                        class="btn btn-danger btn-sm delete-record"><i class="ti-trash"></i> Delete</button>
                                                </form>

                                            </td>
                                        </tr>

                                        {{-- Get shop_item Details --}}

                                        <div class="modal fade" id="shop_item-modal{{$shop_item->id}}">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="text-center">Detail Information for: <b class="text-success">{{ $shop_item->name }}</b></h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="my-4">
                                                                    <b class="mr-3">Avatar:</b> <img src="{{route('item.image',['filename'=>$shop_item->avatar])}}" alt="avatar"
                                                                        class="img-fluid rounded-circle shadow">
                                                                </div>
                                                                <div class="my-2">
                                                                    <b>shop_item Name:</b> {{ $shop_item->name }}
                                                                </div>
                                                                <div class="my-2">
                                                                    <b>shop_item Description:</b> {{ $shop_item->description }}
                                                                </div>
                                                                <div class="my-2">
                                                                    <b>Item Category:</b> {{ $shop_item->itemCategory['name'] }}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- Edit shop_item Modal --}}
                                        <div class="modal fade" id="shop_item-edit-modal{{$shop_item->id}}">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="text-center">UPDATE: {{$shop_item->name}}</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <form action="{{ route('shop.update.item',['shop_item_id'=>$shop_item->id]) }}" method="POST" class="form-horizontal mrg-top-40 pdd-right-30" enctype="multipart/form-data">
                                                                    @csrf
                                                                    <div class="form-group row">
                                                                        <label for="form-1-1" class="col-md-2 control-label">shop_item Name</label>
                                                                        <div class="col-md-10">
                                                                            <input type="text" value="{{$shop_item->name}}" name="name" required 
                                                                            class="form-control" id="form-1-1" placeholder=" shop_item Name">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <div class="input-group light-input-group">
                                                                            <select type="text" required 
                                                                                    placeholder="item category" name="item_category_id" class="form-control">
                                                                                <option value="{{ $shop_item->itemCategory['name'] }}" disabled>Select Category
                                                                                </option>
                                                                                @foreach($itemCategories as $itemCategory)
                                                                                    <option value="{{ $itemCategory->id }}"
                                                                                            @if($itemCategory->name == $shop_item->itemCategory['name']) selected @endif>{{ $itemCategory->name }}</option>
                                                                                @endforeach
                                                                            </select>
                                                                            
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label for="form-1-5" class="col-md-2 control-label">Description</label>
                                                                        <div class="col-md-10">
                                                                            <textarea class="form-control" name="description"
                                                                                rows="10" id="form-1-5">{{$shop_item->description}}</textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label for="form-1-1" class="col-md-2 control-label">Avatar</label>
                                                                        <div class="col-md-10">
                                                                            <img src="{{route('item.image',['filename'=>$shop_item->avatar])}}" alt="avatar"
                                                                                style="max-width: 2.5rem;" class="img-fluid rounded-circle shadow">
                                                                            <input type="file" name="avatar"
                                                                            class="form-control" id="form-1-1" placeholder=" Avatar">
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

        <div class="modal fade" id="addshop_itemModal">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="text-center">ADD A NEW SHOP ITEM</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                                <div class="col-md-12">
                                    <form action="{{ route('shop.add.item') }}" method="POST" class="form-horizontal mrg-top-40 pdd-right-30" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group row">
                                            <label for="form-1-1" class="col-md-2 control-label">shop_item Name</label>
                                            <div class="col-md-10">
                                                <input type="text" name="name" required 
                                                class="form-control" id="form-1-1" placeholder=" shop_item Name">
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <select name="item_category_id" required class="form-control selection my-3 py-2 pl-3" >
                                                <option value="" disabled selected>Select Category</option>
                                                @foreach($itemCategories as $itemCategory)
                                                    <option value="{{ $itemCategory->id }}">{{ $itemCategory->name }}</option>
                                                @endforeach
                                            </select>
                                                @error('item_category_id')
                                                    <span class="invalid-feedback text-center" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                        </div>
                                        <div class="form-group row">
                                            <label for="form-1-5" class="col-md-2 control-label">Description</label>
                                            <div class="col-md-10">
                                                <textarea class="form-control" name="description"
                                                    rows="10" id="form-1-5"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="form-1-1" class="col-md-2 control-label">Avatar</label>
                                            <div class="col-md-10">
                                                <input type="file" name="avatar" required 
                                                class="form-control" id="form-1-1" placeholder=" Avatar">
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
</div>


@endsection