@extends('layouts.adminLayout')
@section('title', 'Plans')
@section('content')

<!-- Content Wrapper START -->
<div class="main-content">
    <div class="container-fluid">
        <div class="page-title">
            <h4>Plans</h4>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-block">
                        <div class="float-right">
                            <button type="button" data-toggle="modal" data-target="#addPlanModal" class="btn btn-primary">
                                Add
                            </button>
                        </div>
                        <div class="table-overflow">
                            <table id="dt-opt" class="table table-lg table-hover table-bordered">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    @if($plans->count() > 0)
                                        @foreach($plans as $plan)
                                            <tr>
                                                <td>{{ $i++ }}</td>
                                                <td>{{$plan->name}}</td>
                                                <td>{{$plan->price}}</td>
                                                <td>{{Str::limit($plan->description, 15)}}</td>
                                                <td>
                                                    <button data-toggle="modal" data-target="#plan-modal{{$plan->id}}" 
                                                        class="btn btn-sm btn-success">
                                                        <i class="ti-eye">View</i>
                                                    </button>
                                                    <button data-toggle="modal" data-target="#plan-edit-modal{{$plan->id}}" 
                                                            class="btn btn-sm btn-primary">
                                                            <i class="ti-pencil">Edit</i>
                                                        </button>
                                                    <form action="{{ route('admin.delete.plan') }}" method="post" class="delete-form" style="display:inline;">
                                                        @csrf
                                                        <input type="hidden" name="plan_id" value="{{$plan->id}}" />
                                                        <button type="submit" title="Delete plan"
                                                            class="btn btn-danger btn-sm delete-record"><i class="ti-trash"></i> Delete</button>
                                                    </form>
                                                </td>
                                            </tr>

                                            {{-- Get plan Details --}}
                                            <div class="col-lg-4">
                                                <div id="plan-modal{{$plan->id}}" tabindex="-1" role="dialog" 
                                                    aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade  modal-lg">
                                                    <div role="document" class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-body">
                                                            <h3 class="h6 text-uppercase mb-0">plan Details</h3><hr/><br/>
                                                            <p>Detail Information for: <b class="text-success">{{ $plan->name }}</b></p>
                                                            <div class="my-2">
                                                                <b>plan Name:</b> {{ $plan->name }}
                                                            </div>
                                                            <div class="my-2">
                                                                <b>Price:</b> {{ $plan->price }}
                                                            </div>
                                                            <div class="my-2">
                                                                <b>plan Description:</b> {{ $plan->description }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>

                                            {{-- Edit plan Modal --}}
                                            <div class="col-lg-4">
                                                <div id="plan-edit-modal{{$plan->id}}" tabindex="-1" role="dialog" 
                                                    aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade  modal-lg">
                                                    <div role="document" class="modal-dialog">
                                                        
                                                    <div class="modal-content">
                                                        
                                                        <div class="modal-body">
                                                            <h3 class="h6 text-uppercase mb-0">Update plan: {{$plan->name}}</h3><hr/><br/>
                                                        <p>Update Plan Information.</p>
                                                        <form action="{{ route('plan.update',['plan_id'=>$plan->id]) }}" method="POST" class="form-horizontal mrg-top-40 pdd-right-30">
                                                            @csrf
                                                            <div class="form-group row">
                                                                <label for="form-1-1" class="col-md-2 control-label">Name</label>
                                                                <div class="col-md-10">
                                                                    <input type="text" value="{{$plan->name}}" name="name" required 
                                                                    class="form-control" id="form-1-1" placeholder=" plan Name">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="form-1-1" class="col-md-2 control-label">Price</label>
                                                                <div class="col-md-10">
                                                                    <input type="text" value="{{$plan->price}}" name="price" required 
                                                                    class="form-control" id="form-1-1" placeholder=" plan price">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="form-1-5" class="col-md-2 control-label">Description</label>
                                                                <div class="col-md-10">
                                                                    <textarea class="form-control" name="description"
                                                                        rows="10" id="form-1-5">{{$plan->description}}</textarea>
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
                </div>
          </div>
        </div>
        <!-- Modal Form-->
        <div class="col-lg-4">
            <div id="addPlanModal" tabindex="-1" role="dialog" 
                aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade  modal-lg">
                <div role="document" class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <h3 class="h6 text-uppercase mb-0">Add plan</h3><hr/><br/>
                    <p>Add New Plan.</p>
                    <form action="{{ route('plan.add') }}" method="POST" class="form-horizontal mrg-top-40 pdd-right-30">
                        @csrf
                        <div class="form-group row">
                            <label for="form-1-1" class="col-md-2 control-label">Name</label>
                            <div class="col-md-10">
                                <input type="text" name="name" 
                                class="form-control @error('name') is-invalid @enderror" id="form-1-1" placeholder=" Plan Name">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="form-1-1" class="col-md-2 control-label">Price</label>
                            <div class="col-md-10">
                                <input type="text" name="price" 
                                class="form-control @error('price') is-invalid @enderror" id="form-1-1" placeholder=" Plan Price">
                                @error('price')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="form-1-5" class="col-md-2 control-label">Description</label>
                            <div class="col-md-10">
                                <textarea class="form-control @error('description') is-invalid @enderror" name="description"
                                    rows="10" id="form-1-5"></textarea>
                                @error('description')
                                    <span class="text-danger">{{ $message }}</span>
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


@endsection




















@section('footer-script')

  <script>
      $(function(){
        @if(count($errors) > 0)
            $("#addPlanModal").show("modal")
        @endif
      });
  </script>

@endsection