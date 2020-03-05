@extends('layouts.adminLayout')
@section('content')


<div class="main-content">
    <div class="container-fluid">
        <div class="page-title">
            <h4>SERVICES</h4>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-block">
                        <button data-toggle="modal" data-target="#addServiceModal" 
                        class="btn btn-sm btn-primary" style="float:right">
                        <i class="ti-plus"></i>Add
                        </button>
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
                                        @foreach($services as $service)
                                            <tr>
                                                <td>{{ $i++ }}</td>
                                                <td>{{$service->name}}</td>
                                                <td>{{Str::limit($service->description, 15)}}</td>
                                                <td><img src="{{asset($service->avatar)}}" alt="avatar"
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
                                            <div class="modal fade" id="service-modal{{$service->id}}">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="text-center">Detail Information for: <b class="text-success">{{ $service->name }}</b></h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <p> 
                                                                    <b class="mr-3">Avatar:</b> <img src="{{asset($service->avatar)}}" alt="avatar"
                                                                        class="img-fluid rounded-circle shadow">
                                                                </p>
                                                                <p>
                                                                    <b>Service Name:</b> {{ $service->name }}
                                                                </p>
                                                                <p>
                                                                    <b>Service Description:</b> {{ $service->description }}
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal fade" id="service-edit-modal{{$service->id}}">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="text-center">UPDATE: {{$service->name}}</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-md-12">
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
                                                                                <img src="{{asset($service->avatar)}}" alt="avatar"
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
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    <!-- Modal Form-->
    <div class="modal fade" id="addServiceModal">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="text-center">ADD NEW SERVICE</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
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


@endsection