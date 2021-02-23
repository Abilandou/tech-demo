@extends('layouts.adminLayout')
@section('title', 'Members')
@section('content')


<!-- Content Wrapper START -->
<div class="main-content">
    <div class="container-fluid">
        <div class="page-title">
            <h4>Team Members</h4>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-block">
                        <div class="float-right"> 
                            <button data-toggle="modal" data-target="#addMemberModal" 
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
                                    <th>Position</th>
                                    <th>Description</th>
                                    <th>Avatar</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    @foreach($members as $member)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>{{$member->name}}</td>
                                            <td>{{$member->position}}</td>
                                            <td>{{Str::limit($member->description, 15)}}</td>
                                            <td><img src="{{route('user.image',['filename'=>$member->avatar])}}" alt="avatar"
                                                style="max-width: 2.5rem;" class="img-fluid rounded-circle shadow"></td>
                                            <td>

                                                <button data-toggle="modal" data-target="#member-modal{{$member->id}}" 
                                                    class="btn btn-sm btn-success">
                                                    <i class="ti-eye">View</i>
                                                </button>
                                                <button data-toggle="modal" data-target="#member-edit-modal{{$member->id}}" 
                                                        class="btn btn-sm btn-primary">
                                                        <i class="ti-pencil">Edit</i>
                                                    </button>
                                                <form action="{{ route('admin.delete.member') }}" method="post" class="delete-form" style="display:inline;">
                                                    @csrf
                                                    <input type="hidden" name="member_id" value="{{$member->id}}" />
                                                    <button type="submit" title="Delete member" 
                                                        class="btn btn-danger btn-sm delete-record"><i class="ti-trash"></i> Delete</button>
                                                </form>
                                            </td>
                                        </tr>

                                        {{-- Get member Details --}}

                                        <div class="modal fade" id="member-modal{{$member->id}}">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="text-center">Detail Information for: <b class="text-success">{{ $member->name }}</b></h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="my-4">
                                                                    <b class="mr-3">Avatar:</b> <img src="{{route('user.image',['filename'=>$member->avatar])}}" alt="avatar"
                                                                        class="img-fluid rounded-circle shadow">
                                                                </div>
                                                                <div class="my-2">
                                                                    <b>member Name:</b> {{ $member->name }}
                                                                </div>
                                                                <div class="my-2">
                                                                    <b>member Position:</b> {{ $member->position }}
                                                                </div>
                                                                <div class="my-2">
                                                                    <b>member Description:</b> {{ $member->description }}
                                                                </div>
                                                                <div class="my-2">
                                                                    <b>member Youtube:</b> {{ $member->youtube }}
                                                                </div>
                                                                <div class="my-2">
                                                                    <b>member Facebook:</b> {{ $member->facebook }}
                                                                </div>
                                                                <div class="my-2">
                                                                    <b>member Twitter:</b> {{ $member->twitter }}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- Edit member Modal --}}
                                        <div class="modal fade" id="member-edit-modal{{$member->id}}">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="text-center">UPDATE: {{$member->name}}</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <form action="{{ route('member.update',['member_id'=>$member->id]) }}" method="POST" class="form-horizontal mrg-top-40 pdd-right-30" enctype="multipart/form-data">
                                                                    @csrf
                                                                    <div class="form-group row">
                                                                        <label for="form-1-1" class="col-md-2 control-label">Member Name</label>
                                                                        <div class="col-md-10">
                                                                            <input type="text" value="{{$member->name}}" name="name" required 
                                                                            class="form-control" id="form-1-1" placeholder=" member Name">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label for="form-1-1" class="col-md-2 control-label">Position</label>
                                                                        <div class="col-md-10">
                                                                            <input type="text" value="{{$member->position}}" name="position" required 
                                                                            class="form-control" id="form-1-1" placeholder=" member position">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label for="form-1-5" class="col-md-2 control-label">Description</label>
                                                                        <div class="col-md-10">
                                                                            <textarea class="form-control" name="description"
                                                                                rows="10" id="form-1-5">{{$member->description}}</textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label for="form-1-1" class="col-md-2 control-label">Member Youtube</label>
                                                                        <div class="col-md-10">
                                                                            <input type="text" value="{{$member->youtube}}" name="youtube" required 
                                                                            class="form-control" id="form-1-1" placeholder=" member youtube">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label for="form-1-1" class="col-md-2 control-label">Member Facebook</label>
                                                                        <div class="col-md-10">
                                                                            <input type="text" value="{{$member->facebook}}" name="facebook" required 
                                                                            class="form-control" id="form-1-1" placeholder=" member facebook">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label for="form-1-1" class="col-md-2 control-label">Member Twitter</label>
                                                                        <div class="col-md-10">
                                                                            <input type="text" value="{{$member->twitter}}" name="twitter" required 
                                                                            class="form-control" id="form-1-1" placeholder=" member twitter">
                                                                        </div>
                                                                    </div>
        
                                                                    <div class="form-group row">
                                                                        <label for="form-1-1" class="col-md-2 control-label">Avatar</label>
                                                                        <div class="col-md-10">
                                                                            <img src="{{route('user.image',['filename'=>$member->avatar])}}" alt="avatar"
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

        <div class="modal fade" id="addMemberModal">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="text-center">ADD A NEW MEMBER</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                                <div class="col-md-12">
                                    <form action="{{ route('member.add') }}" method="POST" class="form-horizontal mrg-top-40 pdd-right-30" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group row">
                                            <label for="form-1-1" class="col-md-2 control-label">Member Name</label>
                                            <div class="col-md-10">
                                                <input type="text" name="name" required 
                                                class="form-control" id="form-1-1" placeholder=" member Name">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="form-1-1" class="col-md-2 control-label">Member Position</label>
                                            <div class="col-md-10">
                                                <input type="text" name="position" required 
                                                class="form-control" id="form-1-1" placeholder=" member position">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="form-1-1" class="col-md-2 control-label">Member Youtube</label>
                                            <div class="col-md-10">
                                                <input type="text" name="youtube" required 
                                                class="form-control" id="form-1-1" placeholder=" member youtube">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="form-1-1" class="col-md-2 control-label">Member Facebook</label>
                                            <div class="col-md-10">
                                                <input type="text" name="facebook" required 
                                                class="form-control" id="form-1-1" placeholder=" member facebook">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="form-1-1" class="col-md-2 control-label">Member Twitter</label>
                                            <div class="col-md-10">
                                                <input type="text" name="twitter" required 
                                                class="form-control" id="form-1-1" placeholder=" member twitter">
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