@extends('layouts.adminLayout')
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
                           
                            <a href="{{route('member.add.form')}}" class="btn btn-primary btn-sm" style="float-right"><i class="ti-plus"></i>Add</a>
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
                                            <td><img src="{{asset($member->avatar)}}" alt="avatar"
                                                style="max-width: 2.5rem;" class="img-fluid rounded-circle shadow"></td>
                                            <td>
                                                <a href="{{route('member.detail',['member_id'=>$member->id])}}" class="btn btn-sm btn-success">
                                                    <i class="ti-eye">View</i></a>
                                                <form action="{{ route('admin.delete.member') }}" method="post" class="delete-form" style="display:inline;">
                                                    @csrf
                                                    <input type="hidden" name="member_id" value="{{$member->id}}" />
                                                    <button type="submit" title="Delete member" 
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

    </div>
</div>


@endsection