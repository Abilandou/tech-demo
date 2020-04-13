@extends('layouts.adminLayout')
@section('content')


<!-- Content Wrapper START -->
<div class="main-content">
    <div class="container-fluid">
        <div class="page-title">

            <h4>
                <a href="{{route('shop.items')}}" class="link-primary"><b><i class="ti-angle-left ti-lg"></i></b></a>
                Item: {{$item->name}} Information
            </h4>
        </div>
        <div class="row">
            <div class="col-md-12">
                <form action="{{ route('shop.update.item',['shop_item_id'=>$item->id]) }}" enctype="multipart/form-data" method="post">
                    @csrf
                    <div class="row col-md-12">
                        <div class="col-md-4">
                            <div class="widget-profile-1 card">
                                <div class="profile border bottom">
                                    @if($item->avatar == null)
                                    <img class="mrg-top-30" src="{{asset('img/camera-preview.png')}}" width="200px" height="200px" alt="">
                                    @else
                                    <img class="mrg-top-30" src="{{asset($item->avatar)}}" width="200px" height="200px" alt="">
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
                                            <p class="mrg-top-10 text-dark"> <b>Item Name</b></p>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" name="name" required class="form-control" value="{{old('name', $item->name)}}">
                                        </div>
                                    </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <p class="mrg-top-10 text-dark"> <b>Item Category</b></p>
                                            </div>
                                            <div class="col-md-6">
                                                <select type="text"  
                                                        placeholder="item category" name="item_category" required class="form-control @error('item_category') is-invalid @enderror">
                                                    <option value="{{ $item->itemCategory['name'] }}" disabled>Select Category
                                                    </option>
                                                    @foreach($itemCategories as $itemCategory)
                                                        <option value="{{ $itemCategory->id }}" 
                                                                @if($itemCategory->name == $item->itemCategory['name']) selected @endif>{{ $itemCategory->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('item_category')
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
                                            <textarea name="description" required class="form-control @error('description') is-invalid @enderror" cols="50" rows="3">{{old('description', $item->description)}}</textarea>
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
    <hr>
    <div class="container-fluid card my-5">
        <div class="page-title">
            <h4>
                Item Images
                <button data-toggle="modal" title="Add Image(s)" style="float-right" data-target="#addItemImage" 
                    class="btn btn-sm btn-primary mt-2 ml-5">
                    <i class="ti-plus"></i>Add Image(s)
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
                                <th>FilName</th>
                                <th>Image</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=1; ?>
                            @forelse ($iImages as $img)
                                <tr>
                                    <td>
                                        <div class="relative mrg-top-15">
                                            <span class="pdd-left-20">{{$i++}}</span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="relative mrg-top-15">
                                            <span class="pdd-left-20">{{$img->image_name}}</span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="relative mrg-top-15">
                                            @if($img->the_image == null)
                                                <a href="{{ asset('img/camera-preview.png') }}" class="view-image"><img src="{{asset('img/camera-preview.png')}}" width="20px" height="20px" class="img-fluid"></a>
                                            @else
                                                <a href="{{ asset($img->the_image) }}" class="view-image"><img src="{{asset($img->the_image)}}" width="20px" height="20px" class="img-fluid"></a>
                                            @endif
                                        </div>
                                    </td>
                                    <td>
                                        <form action="{{ route('item.image.delete') }}" method="post" class="delete-form" style="display:inline;">
                                            @csrf
                                            <input type="hidden" name="image_id" value="{{$img->id}}" />
                                            <button type="submit" title="Delete Admin" 
                                                class="btn btn-danger btn-sm delete-record"><i class="ti-trash"></i> Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr><td><span col="4">No Other Images for this Item.</span></td></tr>
                            
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

 {{-- Add item attribute Modal --}}
<div class="modal fade" id="addItemImage">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="text-center">Adding Attributes For: {{$item->name}}</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{ route('shop.item.add.attribute',['item_id'=>$item->id]) }}" method="POST" class="form-horizontal mrg-top-40 pdd-right-30" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" value="{{$item->id}}" name="item_id" required>
                            <div id="inputFile" class="form-group">
                                <div class="mb-5 position-relative input-section">
                                    <div>
                                        <label for="form-1-1">Other Images.</label>
                                        
                                        <div class="item-images" style="padding-top: .5rem;">
                                            <input type="hidden" value="{{old('filename[]')}}" name="filename" class="form-control @error('filename') is-invalid @enderror"
                                            >
                                            @error('filename')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer float-right">
                            <button type="button" data-dismiss="modal" class="btn btn-secondary">Close</button>
                            <button type="submit" class="btn btn-primary">Add</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(function () {
        $('.item-images').imageUploader({
            imagesInputName: 'filename',
            maxSize: 2 * 1024 * 1024,
            maxFiles: 20
        });

        @if(count($errors) > 0)
            $('#addItemImage').modal('show');
        @endif
    });

</script>

@endsection