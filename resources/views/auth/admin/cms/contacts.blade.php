@extends('layouts.adminLayout')
@section('content')


<!-- Content Wrapper START -->
<div class="main-content">
    <div class="container-fluid">
        <div class="page-title">
            <h4>Contacts</h4>
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
                                    <th>Telephone</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    @foreach($contacts as $contact)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>{{$contact->name}}</td>
                                            <td>{{$contact->email}}</td>
                                            <td>{{$contact->phone}}</td>
                                            <td>
                                                <button data-toggle="modal" data-target="#contact-modal{{$contact->id}}" 
                                                    class="btn btn-sm btn-success">
                                                    <i class="ti-eye">View</i>
                                                </button>
                                                <form action="{{ route('cms.contact.delete') }}" method="post" class="delete-form" style="display:inline;">
                                                    @csrf
                                                    <input type="hidden" name="contact_id" value="{{$contact->id}}" />
                                                    <button type="submit" title="Delete contact" 
                                                        class="btn btn-danger btn-sm delete-record"><i class="ti-trash"></i> Delete</button>
                                                </form>

                                            </td>
                                        </tr>

                                        {{-- Get contact Details --}}

                                        <div class="modal fade" id="contact-modal{{$contact->id}}">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="text-center">Detail contact Information.</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                
                                                                <div class="my-2">
                                                                    <b>Name:</b> {{ $contact->name }}
                                                                </div>
                                                                <div class="my-2">
                                                                    <b>Email:</b> {{ $contact->email }}
                                                                </div>
                                                                <div class="my-2">
                                                                    <b>Telephone:</b> {{ $contact->phone }}
                                                                </div>
                                                                <div class="my-2">
                                                                    <b>Subject: </b> {{ $contact->subject }}
                                                                </div>
                                                                <div class="my-2">
                                                                    <b>Message:</b> {{ $contact->message }}
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