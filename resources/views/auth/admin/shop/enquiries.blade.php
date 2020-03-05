@extends('layouts.adminLayout')
@section('content')


<!-- Content Wrapper START -->
<div class="main-content">
    <div class="container-fluid">
        <div class="page-title">
            <h4>SHOP ITEMS</h4>
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
                                    <th>Client Name</th>
                                    <th>Client Email</th>
                                    <th>Client Telephone</th>
                                    <th>Made Enquiry On</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    @foreach($enquiries as $enquiry)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>{{$enquiry->name}}</td>
                                            <td>{{$enquiry->email}}</td>
                                            <td>{{$enquiry->telephone}}</td>
                                            <td>{{$enquiry->item['name']}}</td>
                                            <td>
                                                <button data-toggle="modal" data-target="#enquiry-modal{{$enquiry->id}}" 
                                                    class="btn btn-sm btn-success">
                                                    <i class="ti-eye">View</i>
                                                </button>
                                                <form action="{{ route('shop.delete.enquiry') }}" method="post" class="delete-form" style="display:inline;">
                                                    @csrf
                                                    <input type="hidden" name="enquiry_id" value="{{$enquiry->id}}" />
                                                    <button type="submit" title="Delete enquiry" 
                                                        class="btn btn-danger btn-sm delete-record"><i class="ti-trash"></i> Delete</button>
                                                </form>

                                            </td>
                                        </tr>

                                        {{-- Get enquiry Details --}}

                                        <div class="modal fade" id="enquiry-modal{{$enquiry->id}}">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="text-center">Detail Enquiry Information.</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                
                                                                <div class="my-2">
                                                                    <b>Client Name:</b> {{ $enquiry->name }}
                                                                </div>
                                                                <div class="my-2">
                                                                    <b>Client Email:</b> {{ $enquiry->email }}
                                                                </div>
                                                                <div class="my-2">
                                                                    <b>Client Telephone:</b> {{ $enquiry->telephone }}
                                                                </div>
                                                                <div class="my-2">
                                                                    <b>Made Enquiry On:</b> {{ $enquiry->item['name'] }}
                                                                </div>
                                                                <div class="my-2">
                                                                    <b>Client Message:</b> {{ $enquiry->message }}
                                                                </div>
                                                               
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

    </div>
</div>


@endsection