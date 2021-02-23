@extends('layouts.adminLayout')
@section('title', 'Sub Services')
@section('content')

<!-- Content Wrapper START -->
<div class="main-content">
<div class="container-fluid">
    <div class="page-title">
        <h4>Sub Services</h4>
    </div>
    <div class="row">
    <div class="col-md-12">
        <div class="card">
        <div class="card-block">
            <div class="float-right"> 
                <button type="button" data-toggle="modal" data-target="#addsub_ServiceModal" class="btn btn-primary">
                    Add
                </button>
            </div>
        <div class="table-overflow">
            <table id="dt-opt" class="table table-lg table-hover table-bordered"
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
                @if($sub_services->count() > 0)
                    @foreach($sub_services as $sub_service)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{$sub_service->name}}</td>
                            <td>{{Str::limit($sub_service->description, 15)}}</td>
                            <td><img src="{{route('service.image',['filename'=>$sub_service->avatar])}}" alt="avatar"
                                style="max-width: 2.5rem;" class="img-fluid rounded-circle shadow"></td>
                            <td>

                                <button data-toggle="modal" data-target="#sub_service-modal{{$sub_service->id}}" 
                                    class="btn btn-sm btn-success">
                                    <i class="ti-eye">View</i>
                                </button>
                                <button data-toggle="modal" data-target="#sub_service-edit-modal{{$sub_service->id}}" 
                                        class="btn btn-sm btn-primary">
                                        <i class="ti-pencil">Edit</i>
                                    </button>
                                <form action="{{ route('admin.delete.sub_service') }}" method="post" class="delete-form" style="display:inline;">
                                    @csrf
                                    <input type="hidden" name="sub_service_id" value="{{$sub_service->id}}" />
                                    <button type="submit" title="Delete sub_service" 
                                        class="btn btn-danger btn-sm delete-record"><i class="ti-trash"></i> Delete</button>
                                </form>
                            </td>
                        </tr>

                        {{-- Get sub_Service Details --}}
                        <div class="col-lg-4">
                            <div id="sub_service-modal{{$sub_service->id}}" tabindex="-1" role="dialog" 
                                aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade  modal-lg">
                                <div role="document" class="modal-dialog">
                                    
                                <div class="modal-content">
                                    
                                    <div class="modal-body">
                                        <h3 class="h6 text-uppercase mb-0">sub_Service Details</h3><hr/><br/>
                                    <p>Detail Information for: <b class="text-success">{{ $sub_service->name }}</b></p>
                                        <div class="my-4">
                                            <b class="mr-3">Avatar:</b> <img src="{{route('service.image',['filename'=>$sub_service->avatar])}}" alt="avatar"
                                                class="img-fluid rounded-circle shadow">
                                        </div>
                                        <div class="my-2">
                                            <b>sub_Service Name:</b> {{ $sub_service->name }}
                                        </div>
                                        <div class="my-2">
                                            <b>Main_Service Name:</b> {{ $sub_service->mainService['name'] }}
                                        </div>
                                        <div class="my-2">
                                            <b>sub_Service Description:</b> {{ $sub_service->description }}
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>

                        {{-- Edit sub_Service Modal --}}
                        <div class="col-lg-4">
                            <div id="sub_service-edit-modal{{$sub_service->id}}" tabindex="-1" role="dialog" 
                                aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade  modal-lg">
                                <div role="document" class="modal-dialog">
                                    
                                <div class="modal-content">
                                    
                                    <div class="modal-body">
                                        <h3 class="h6 text-uppercase mb-0">Update sub_Service: {{$sub_service->name}}</h3><hr/><br/>
                                    <p>Update Servie Information.</p>
                                    <form action="{{ route('sub_service.update',['sub_service_id'=>$sub_service->id]) }}" method="POST" class="form-horizontal mrg-top-40 pdd-right-30" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group row">
                                            <label for="form-1-1" class="col-md-2 control-label">sub_Service Name</label>
                                            <div class="col-md-10">
                                                <input type="text" value="{{$sub_service->name}}" name="name" required 
                                                class="form-control" id="form-1-1" placeholder=" sub_Service Name">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group light-input-group">
                                                <select type="text" required 
                                                        placeholder="main service" name="service_id" class="form-control">
                                                    <option value="{{ $sub_service->mainService['name'] }}" disabled>Select Main Service
                                                    </option>
                                                    @foreach($services as $service)
                                                        <option value="{{ $service->id }}"
                                                                @if($service->name == $sub_service->mainService['name']) selected @endif>{{ $service->name }}</option>
                                                    @endforeach
                                                </select>
                                                
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="form-1-5" class="col-md-2 control-label">Description</label>
                                            <div class="col-md-10">
                                                <textarea class="form-control" name="description"
                                                    rows="10" id="form-1-5">{{$sub_service->description}}</textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="form-1-1" class="col-md-2 control-label">Avatar</label>
                                            <div class="col-md-10">
                                                <img src="{{route('service.image',['filename'=>$sub_service->avatar])}}" alt="avatar"
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
            <div id="addsub_ServiceModal" tabindex="-1" role="dialog" 
                aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade  modal-lg">
                <div role="document" class="modal-dialog">
                    
                <div class="modal-content">
                    
                    <div class="modal-body">
                        <h3 class="h6 text-uppercase mb-0">Add sub_Service</h3><hr/><br/>
                    <p>Add A New sub_Service To The System.</p>
                    <form action="{{ route('sub_service.add') }}" method="POST" class="form-horizontal mrg-top-40 pdd-right-30" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="form-1-1" class="col-md-2 control-label">sub_Service Name</label>
                            <div class="col-md-10">
                                <input type="text" name="name" required 
                                class="form-control" id="form-1-1" placeholder=" sub_Service Name">
                            </div>
                        </div>
                        <div class="form-group">
                            <select name="service_id" required class="form-control selection my-3 py-2 pl-3" >
                                <option value="" disabled selected>Select Main Service</option>
                                @foreach($services as $service)
                                    <option value="{{ $service->id }}">{{ $service->name }}</option>
                                @endforeach
                            </select>
                                @error('service_id')
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