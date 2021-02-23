@extends('layouts.adminLayout')
@section('title', 'Services')
@section('content')

<!-- Content Wrapper START -->
<div class="main-content">
<div class="container-fluid">
    <div class="page-title">
        <h4>Services</h4>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
            <div class="card-block">
                <div class="float-right"> 
                    <button type="button" data-toggle="modal" data-target="#addServiceModal" class="btn btn-primary">
                        Add
                    </button>
                </div>
                <div class="table-overflow">                           
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
                        @if($services->count() > 0)
                            @foreach($services as $service)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{$service->name}}</td>
                                    <td>{{Str::limit($service->description, 15)}}</td>
                                    <td><img src="{{ route('service.image',['filename'=>$service->avatar]) }}" alt="avatar"
                                        style="max-width: 2.5rem;" class="img-fluid rounded-circle shadow"></td>
                                    <td>
                                        <button data-toggle="modal" data-target="#service-modal{{$service->id}}" 
                                            class="btn btn-sm btn-success">
                                            <i class="ti-eye">View</i>
                                        </button>
                                        <button data-toggle="modal" data-target="#service-edit-modal{{$service->id}}" 
                                                class="btn btn-sm btn-primary">
                                                <i class="ti-pencil">Edit</i>
                                        </button>
                                        <form action="{{ route('admin.delete.service') }}" method="post" class="delete-form" style="display:inline;">
                                            @csrf
                                            <input type="hidden" name="service_id" value="{{$service->id}}" />
                                            <button type="submit" title="Delete service"
                                                class="btn btn-danger btn-sm delete-record"><i class="ti-trash"></i> Delete</button>
                                        </form>
                                    </td>
                                </tr>

                                {{-- Get Service Details --}}
                                <div class="col-lg-4">
                                    <div id="service-modal{{$service->id}}" tabindex="-1" role="dialog" 
                                        aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade  modal-lg">
                                        <div role="document" class="modal-dialog">
                                            
                                        <div class="modal-content">
                                            
                                            <div class="modal-body">
                                                <h3 class="h6 text-uppercase mb-0">Service Details</h3><hr/><br/>
                                            <p>Detail Information for: <b class="text-success">{{ $service->name }}</b></p>
                                                <div class="my-4">
                                                    <b class="mr-3">Avatar:</b> <img src="{{route("service.image",["filename"=>$service->avatar])}}" alt="avatar"
                                                        class="img-fluid rounded-circle shadow">
                                                </div>
                                                <div class="my-2">
                                                    <b>Service Name:</b> {{ $service->name }}
                                                </div>
                                                <div class="my-2">
                                                    <b>Service Description:</b> {{ $service->description }}
                                                </div>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- Edit Service Modal --}}
                                <div class="col-lg-4">
                                    <div id="service-edit-modal{{$service->id}}" tabindex="-1" role="dialog" 
                                        aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade  modal-lg">
                                        <div role="document" class="modal-dialog">
                                            
                                        <div class="modal-content">
                                            
                                            <div class="modal-body">
                                                <h3 class="h6 text-uppercase mb-0">Update Service: {{$service->name}}</h3><hr/><br/>
                                            <p>Update Servie Information.</p>
                                            <form action="{{ route('service.update',['service_id'=>$service->id]) }}" method="POST" class="form-horizontal mrg-top-40 pdd-right-30" enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group row">
                                                    <label for="form-1-1" class="col-md-2 control-label">Service Name</label>
                                                    <div class="col-md-10">
                                                        <input type="text" value="{{$service->name}}" name="name" required 
                                                        class="form-control" id="form-1-1" placeholder=" Service Name">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="form-1-5" class="col-md-2 control-label">Description</label>
                                                    <div class="col-md-10">
                                                        <textarea class="form-control" name="description"
                                                            rows="10" id="form-1-5">{{$service->description}}</textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="form-1-1" class="col-md-2 control-label">Avatar</label>
                                                    <div class="col-md-10">
                                                        <img src="{{route("service.image",["filename"=>$service->avatar])}}" alt="avatar"
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
                <div id="addServiceModal" tabindex="-1" role="dialog" 
                    aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade  modal-lg">
                    <div role="document" class="modal-dialog">
                        
                    <div class="modal-content">
                        
                        <div class="modal-body">
                            <h3 class="h6 text-uppercase mb-0">Add Service</h3><hr/><br/>
                        <p>Add A New Service To The System.</p>
                        <form action="{{ route('service.add') }}" method="POST" class="form-horizontal mrg-top-40 pdd-right-30" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label for="form-1-1" class="col-md-2 control-label">Service Name</label>
                                <div class="col-md-10">
                                    <input type="text" name="name" required 
                                    class="form-control" id="form-1-1" placeholder=" Service Name">
                                </div>
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