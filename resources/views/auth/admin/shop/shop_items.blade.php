@extends('layouts.adminLayout')
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
                                            <td><img src="{{asset($shop_item->avatar)}}" alt="avatar"
                                                style="max-width: 2.5rem;" class="img-fluid rounded-circle shadow"></td>
                                            <td>
                                                <a href="{{route('item.detail', ['item_id'=>$shop_item ->id])}}" class="btn btn-success btn-sm"><i class="ti-eye"></i>View</a>
                                                <form action="{{ route('shop.delete.item') }}" method="post" class="delete-form" style="display:inline;">
                                                    @csrf
                                                    <input type="hidden" name="shop_item_id" value="{{$shop_item->id}}" />
                                                    <button type="submit" title="Delete shop_item" 
                                                        class="btn btn-danger btn-sm delete-record"><i class="ti-trash"></i> Delete</button>
                                                </form>

                                            </td>
                                        </tr>
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
                                            <label for="form-1-1" class="col-md-2 control-label">Item Name</label>
                                            <div class="col-md-10">
                                                <input type="text" name="name"  value="{{old('name')}}"
                                                class="form-control @error('name') is-invalid @enderror" id="form-1-1" placeholder=" shop_item Name">
                                                @error('name')
                                                    <span class="invalid-feedback">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <select name="item_category"  class="form-control @error('name') is-invalid @enderror" >
                                                <option value="" disabled selected>Select Category</option>
                                                @foreach($itemCategories as $itemCategory)
                                                    <option value="{{ $itemCategory->id }}" {{(old('item_category')==$itemCategory->id) ? 'selected': '' }}>{{ $itemCategory->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('item_category')
                                                <span class="invalid-feedback text-center" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group row">
                                            <label for="form-1-5" class="col-md-2 control-label">Description</label>
                                            <div class="col-md-10">
                                                <textarea class="form-control @error('name') is-invalid @enderror" name="description"
                                                    rows="10" id="form-1-5">{{old('description')}}</textarea>
                                                @error('description')
                                                    <span class="invalid-feedback text-center" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
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

<script>
    $(function(){
        @if(count($errors) > 0)
            $('#addshop_itemModal').modal('show');
        @endif
    });
</script>

@endsection