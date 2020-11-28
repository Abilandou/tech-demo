@extends('layouts.adminLayout')
@section('content')


<!-- Content Wrapper START -->
<div class="main-content">
    <div class="container-fluid">
        <div class="page-title">
            <h4>Enquiries</h4>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-block">
                        <div class="table-overflow" >                          
                            <table id="dt-opt" class="table table-lg table-hover table-bordered">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Item</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    @foreach($enquiries as $enq)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>{{$enq->name}}</td>
                                            <td>{{ $enq->email }}</td>
                                            <td>{{ $enq->phone }}</td>
                                            <td>{{ $enq->item }}</td>
                                            <td>
                                                <button data-toggle="modal" data-target="#enq-modal{{$enq->id}}" 
                                                    class="btn btn-sm btn-success">
                                                    <i class="ti-eye">View</i>
                                                </button>
                                                <form action="{{ route('enquiry.delete') }}" method="post" class="delete-form" style="display:inline;">
                                                    @csrf
                                                    <input type="hidden" name="enq_id" value="{{$enq->id}}" />
                                                    <button type="submit" title="Delete item Category" 
                                                        class="btn btn-danger btn-sm delete-record"><i class="ti-trash"></i> Delete</button>
                                                </form>
                                            </td>
                                        </tr>

                                        {{-- Get itemCategory Details --}}

                                        <div class="modal fade" id="enq-modal{{$enq->id}}">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="text-center">Detail Information for: <b class="text-success">{{ $enq->name }}</b></h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="my-2">
                                                                    <b>Name:</b> {{ $enq->name }}
                                                                </div>
                                                                <div class="my-2">
                                                                    <b>Email:</b> {{ $enq->email }}
                                                                </div>
                                                                <div class="my-2">
                                                                    <b>Phone:</b> {{ $enq->phone }}
                                                                </div>
                                                                <div class="my-2">
                                                                    <b>Item:</b> {{ $enq->item }}
                                                                </div>
                                                                <div class="my-2">
                                                                    <b>Enquiry:</b> {{ $enq->enquiry }}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- Edit itemCategory Modal --}}

                                    @endforeach
                                </tbody>
                            </table>
                        </div> 
                    </div>
                </div>
          </div>
        </div>
        <!-- Modal Form-->

    </div>
</div>


@endsection