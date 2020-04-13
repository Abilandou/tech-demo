@extends('layouts.adminLayout')
@section('content')

<!-- Content Wrapper START -->
<div class="main-content">
    <div class="container-fluid">
        <div class="page-title">
            <h4>TESTIMONIES</h4>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-block">
                        <div class="float-right"> 
                            <button data-toggle="modal" data-target="#addTestimonyModal" 
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
                                      <th>Profession</th>
                                      <th>Testimony</th>
                                      <th>Avatar</th>
                                      <th>Action</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                      <?php $i = 1; ?>
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

                                              <div class="modal fade" id="testimony-modal{{$testimony->id}}">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="text-center">Testimony Details</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-md-12">
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
                                              </div>
                  
                                              {{-- Edit testimony Modal --}}
                                              <div class="modal fade" id="testimony-edit-modal{{$testimony->id}}">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="text-center">UPDATE TESTIMONY MADE BY: {{$testimony->name}}</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-md-12">
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
               
<!--Add  Modal Form-->
<div class="modal fade" id="addTestimonyModal">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="text-center">ADD TESTIMONY</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{ route('testimony.add') }}" method="POST" class="form-horizontal mrg-top-40 pdd-right-30" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label for="form-1-1" class="col-md-2 control-label">Testifier Name</label>
                                <div class="col-md-10">
                                    <input type="text" name="name" value="{{old('name')}}"
                                    class="form-control @error('name') is-invalid @enderror" id="form-1-1" placeholder=" Testifier Name">
                                    @error('name')
                                        <span class="invalid-feedback">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="form-1-1" class="col-md-2 control-label">Testifier Profession</label>
                                <div class="col-md-10">
                                    <input type="text" name="profession" value="{{old('profession')}}"
                                    class="form-control @error('profession') is-invalid @enderror" id="form-1-1" placeholder=" testifier profession">
                                    @error('profession')
                                        <span class="invalid-feedback">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="form-1-5" class="col-md-2 control-label">Testimony</label>
                                <div class="col-md-10">
                                    <textarea class="form-control @error('profession') is-invalid @enderror" name="testimony"
                                        rows="10" id="form-1-5">{{old('testimony')}}</textarea>
                                        @error('testimony')
                                            <span class="invalid-feedback">{{$message}}</span>
                                        @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="form-1-1" class="col-md-2 control-label">Avatar</label>
                                <div class="col-md-10">
                                    <input type="file" name="avatar" value="{{old('avatar')}}"
                                    class="form-control @error('avatar') is-invalid @enderror" id="form-1-1" placeholder=" Avatar">
                                    @error('avatar')
                                        <span class="invalid-feedback">{{$message}}</span>
                                    @enderror
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

<script>
    $(function(){
        @if(count($errors) > 0)
            $('#addTestimonyModal').modal('show');
        @endif
    });
</script>

@endsection