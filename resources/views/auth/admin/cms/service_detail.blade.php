@extends('layouts.adminLayout')
@section('content')


<!-- Content Wrapper START -->
<div class="main-content">
    <div class="container-fluid">
        <div class="page-title">

            <h4>
                <a href="{{route('shop.items')}}" class="link-primary"><b><i class="ti-angle-left ti-lg"></i></b></a>
                Service: {{$service->name}} Information
            </h4>
        </div>
        <div class="row">
            <div class="col-md-12">
                <form action="{{ route('shop.update.item',['shop_item_id'=>$service->id]) }}" enctype="multipart/form-data" method="post">
                    @csrf
                    <div class="row col-md-12">
                        <div class="col-md-4">
                            <div class="widget-profile-1 card">
                                <div class="profile border bottom">
                                    @if($service->avatar == null)
                                    <img class="mrg-top-30" src="{{asset('img/camera-preview.png')}}" width="200px" height="200px" alt="">
                                    @else
                                    <img class="mrg-top-30" src="{{asset($service->avatar)}}" width="200px" height="200px" alt="">
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
                                            <p class="mrg-top-10 text-dark"> <b>Service Name</b></p>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" name="name" required class="form-control" value="{{old('name', $service->name)}}">
                                        </div>
                                    </div>
                                        <hr>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <p class="mrg-top-10 text-dark"> <b>Description</b></p>
                                        </div>
                                        <div class="col-md-6">
                                            <textarea name="description" required class="form-control @error('description') is-invalid @enderror" cols="50" rows="3">{{old('description', $service->description)}}</textarea>
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
                Sub Services
                <button data-toggle="modal" title="Add SubService" style="float-right" data-target="#addSubServiceModal" 
                    class="btn btn-sm btn-primary mt-2 ml-5">
                    <i class="ti-plus"></i>Add SubService
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
                            @forelse($service->subServices as $serv)
                                <tr>
                                    <td>
                                        <div class="relative mrg-top-15">
                                            <span class="pdd-left-20">1</span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="relative mrg-top-15">
                                            <span class="pdd-left-20">{{$serv->name}}</span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="relative mrg-top-15">
                                            @if($serv->avatar == null)
                                                <a href="{{ asset('img/camera-preview.png') }}" class="view-image"><img src="{{asset('img/camera-preview.png')}}" width="20px" height="20px" class="img-fluid"></a>
                                            @else
                                                <a href="{{ asset($serv->avatar) }}" class="view-image"><img src="{{asset($serv->avatar)}}" width="20px" height="20px" class="img-fluid"></a>
                                            @endif
                                        </div>
                                    </td>
                                    <td>
                                        <button data-toggle="modal" data-target="#sub_service-modal{{$serv->id}}" 
                                            class="btn btn-sm btn-success">
                                            <i class="ti-eye">View</i>
                                        </button>
                                        <button data-toggle="modal" data-target="#sub_service-edit-modal{{$serv->id}}" 
                                                class="btn btn-sm btn-primary">
                                                <i class="ti-pencil">Edit</i>
                                            </button>
                                        <form action="{{ route('admin.delete.sub_service') }}" method="post" class="delete-form" style="display:inline;">
                                            @csrf
                                            <input type="hidden" name="sub_service_id" value="{{$serv->id}}" />
                                            <button type="submit" title="Delete sub_service" 
                                                class="btn btn-danger btn-sm delete-record"><i class="ti-trash"></i> Delete</button>
                                        </form>
                                    </td>
                                </tr>

                                {{-- Get sub_Service Details --}}

                                <div class="modal fade" id="sub_service-modal{{$serv->id}}">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="text-center">Detail Information for: <b class="text-success">{{ $serv->name }}</b></h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="my-4">
                                                            <b class="mr-3">Avatar:</b> <img src="{{asset($serv->avatar)}}" alt="avatar"
                                                                class="img-fluid rounded-circle shadow" width="120px" height="120px">
                                                        </div>
                                                        <div class="my-2">
                                                            <b>sub_Service Name:</b> {{ $serv->name }}
                                                        </div>
                                                        <div class="my-2">
                                                            <b>Main_Service Name:</b> {{ $serv->mainService['name'] }}
                                                        </div>
                                                        <div class="my-2">
                                                            <b>sub_Service Description:</b> {{ $serv->description }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                  </div>
      
                                  {{-- Edit sub_Service Modal --}}

                                  <div class="modal fade" id="sub_service-edit-modal{{$serv->id}}">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="text-center">UPDATE: {{$serv->name}}</h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <form action="{{ route('sub_service.update',['sub_service_id'=>$serv->id]) }}" method="POST" class="form-horizontal mrg-top-40 pdd-right-30" enctype="multipart/form-data">
                                                            @csrf
                                                            <div class="form-group row">
                                                                <label for="form-1-1" class="col-md-2 control-label">sub_Service Name</label>
                                                                <div class="col-md-10">
                                                                    <input type="text" value="{{$serv->name}}" name="name" required minlength="3"
                                                                    class="form-control" id="form-1-1" placeholder=" sub_Service Name">
                                                                </div>
                                                            </div>
                                                            <input type="hidden" name="service_id" value="{{$service->id}}">
                                                            <div class="form-group row">
                                                                <label for="form-1-5" class="col-md-2 control-label">Description</label>
                                                                <div class="col-md-10">
                                                                    <textarea class="form-control" name="description" required minlength="50"
                                                                        rows="10" id="form-1-5">{{$serv->description}}</textarea>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="form-1-1" class="col-md-2 control-label">Avatar</label>
                                                                <div class="col-md-10">
                                                                    <img src="{{asset($serv->avatar)}}" alt="avatar"
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
                            @empty
                                <tr><td><span col="4">No Subservice yet</span></td></tr>
                            @endforelse
                           
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- subservice add modal --}}
<div class="modal fade" id="addSubServiceModal">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="text-center">ADD A SUB SERVICE</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{ route('sub_service.add') }}" method="POST" class="form-horizontal mrg-top-40 pdd-right-30" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label for="form-1-1" class="col-md-2 control-label">sub_Service Name</label>
                                <div class="col-md-10">
                                    <input type="text" name="name" required 
                                    class="form-control" id="form-1-1" placeholder=" sub_Service Name">
                                </div>
                            </div>
                            <input type="hidden" name="main_service" value="{{$service->id}}">
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