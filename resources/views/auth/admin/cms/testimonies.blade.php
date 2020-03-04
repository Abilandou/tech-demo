@extends('layouts.adminLayout')
@section('content')


<div class="container-fluid px-xl-5">
    <section class="py-5">
      <div class="row">
        <div class="col-lg-12 mb-4">
          <div class="card">
            <div class="card-header">
              <h6 class="text-uppercase mb-0">Testimonies</h6>
              <div class="float-right"> 
                  <button type="button" data-toggle="modal" data-target="#addtestimonyModal" class="btn btn-primary">
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
                    <th>Profession</th>
                    <th>Testimony</th>
                    <th>Avatar</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    @if($testimonies->count() > 0)
                        @foreach($testimonies as $testimony)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{$testimony->name}}</td>
                                <td>{{$testimony->profession}}</td>
                                <td>{{Str::limit($testimony->testimony, 15)}}</td>
                                <td><img src="{{asset($testimony->avatar)}}" alt="avatar"
                                    style="max-width: 2.5rem;" class="img-fluid rounded-circle shadow"></td>
                                <td>

                                    <button data-toggle="modal" data-target="#testimony-modal{{$testimony->id}}" 
                                        class="btn btn-sm btn-success">
                                        <i class="ti-eye">View</i>
                                    </button>
                                    <button data-toggle="modal" data-target="#testimony-edit-modal{{$testimony->id}}" 
                                            class="btn btn-sm btn-primary">
                                            <i class="ti-pencil">Edit</i>
                                        </button>
                                    <form action="{{ route('admin.delete.testimony') }}" method="post" class="delete-form" style="display:inline;">
                                        @csrf
                                        <input type="hidden" name="testimony_id" value="{{$testimony->id}}" />
                                        <button type="submit" title="Delete testimony" 
                                            class="btn btn-danger btn-sm delete-record"><i class="ti-trash"></i> Delete</button>
                                    </form>
                                </td>
                            </tr>

                            {{-- Get testimony Details --}}
                            <div class="col-lg-4 mb-5">
                                <div id="testimony-modal{{$testimony->id}}" tabindex="-1" role="dialog" 
                                    aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade  modal-lg">
                                    <div role="document" class="modal-dialog">
                                        
                                    <div class="modal-content">
                                        
                                        <div class="modal-body">
                                            <h3 class="h6 text-uppercase mb-0">testimony Details</h3><hr/><br/>
                                        <p>Detail Information for: <b class="text-success">{{ $testimony->name }}</b> Testimony</p>
                                            <div class="my-4">
                                                <b class="mr-3">Avatar:</b> <img src="{{asset($testimony->avatar)}}" alt="avatar"
                                                    class="img-fluid rounded-circle shadow">
                                            </div>
                                            <div class="my-2">
                                                <b>Testifier Name:</b> {{ $testimony->name }}
                                            </div>
                                            <div class="my-2">
                                                <b>Testifier Profession:</b> {{ $testimony->profession }}
                                            </div>
                                            <div class="my-2">
                                                <b>Testimony:</b> {{ $testimony->testimony }}
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Edit testimony Modal --}}
                            <div class="col-lg-4 mb-5">
                                <div id="testimony-edit-modal{{$testimony->id}}" tabindex="-1" role="dialog" 
                                    aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade  modal-lg">
                                    <div role="document" class="modal-dialog">
                                        
                                    <div class="modal-content">
                                        
                                        <div class="modal-body">
                                            <h3 class="h6 text-uppercase mb-0">Update testimony: {{$testimony->name}}</h3><hr/><br/>
                                        <p>Update Servie Information.</p>
                                        <form action="{{ route('testimony.update',['testimony_id'=>$testimony->id]) }}" method="POST" class="form-horizontal mrg-top-40 pdd-right-30" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group row">
                                                <label for="form-1-1" class="col-md-2 control-label">Testifier Name</label>
                                                <div class="col-md-10">
                                                    <input type="text" value="{{$testimony->name}}" name="name" required 
                                                    class="form-control" id="form-1-1" placeholder=" testifier name">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="form-1-1" class="col-md-2 control-label">Profession</label>
                                                <div class="col-md-10">
                                                    <input type="text" value="{{$testimony->profession}}" name="profession" required 
                                                    class="form-control" id="form-1-1" placeholder=" testifier profession">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="form-1-5" class="col-md-2 control-label">Testimony</label>
                                                <div class="col-md-10">
                                                    <textarea class="form-control" name="testimony"
                                                        rows="10" id="form-1-5">{{$testimony->testimony}}</textarea>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="form-1-1" class="col-md-2 control-label">Avatar</label>
                                                <div class="col-md-10">
                                                    <img src="{{asset($testimony->avatar)}}" alt="avatar"
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
            <div class="col-lg-4 mb-5">
                <div id="addtestimonyModal" tabindex="-1" role="dialog" 
                    aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade  modal-lg">
                    <div role="document" class="modal-dialog">
                        
                    <div class="modal-content">
                        
                        <div class="modal-body">
                            <h3 class="h6 text-uppercase mb-0">Add testimony</h3><hr/><br/>
                        <p>Add A New testimony To The System.</p>
                        <form action="{{ route('testimony.add') }}" method="POST" class="form-horizontal mrg-top-40 pdd-right-30" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label for="form-1-1" class="col-md-2 control-label">Testifier Name</label>
                                <div class="col-md-10">
                                    <input type="text" name="name" required 
                                    class="form-control" id="form-1-1" placeholder=" Testifier Name">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="form-1-1" class="col-md-2 control-label">Testifier Profession</label>
                                <div class="col-md-10">
                                    <input type="text" name="profession" required 
                                    class="form-control" id="form-1-1" placeholder=" testifier profession">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="form-1-5" class="col-md-2 control-label">Testimony</label>
                                <div class="col-md-10">
                                    <textarea class="form-control" name="testimony"
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
    </section>
  </div>


@endsection