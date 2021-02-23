@extends('layouts.adminLayout')
@section('title', 'Plan Enquiries')
@section('content')

<div class="main-content">
  <div class="container-fluid">
      <div class="page-title">
        <h4>Plan Enquiries</h4>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-block">
              <div class="table-overflow">
                <table id="dt-opt" class="table table-lg table-hover table-bordered">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Phone</th>
                      <th>Plan Chosen</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php $i = 1; ?>
                      @if($enquiries->count() > 0)
                          @foreach($enquiries as $enq)
                              <tr>
                                  <td>{{ $i++ }}</td>
                                  <td>{{$enq->name}}</td>
                                  <td>{{$enq->email}}</td>
                                  <td>{{$enq->phone}}</td>
                                  <td>{{ $enq->entity }}</td>
                                  <td>
                                      <button data-toggle="modal" data-target="#enquiry-modal{{$enq->id}}" 
                                          class="btn btn-sm btn-success">
                                          <i class="ti-eye">View</i>
                                      </button>
                                      <form action="{{ route('enquiry.delete') }}" method="post" class="delete-form" style="display:inline;">
                                          @csrf
                                          <input type="hidden" name="enq_id" value="{{$enq->id}}" />
                                          <button type="submit" title="Delete enquiry"
                                              class="btn btn-danger btn-sm delete-record"><i class="ti-trash"></i> Delete</button>
                                      </form>
                                  </td>
                              </tr>

                              {{-- Get enquiry Details --}}
                              <div class="col-lg-4">
                                  <div id="enquiry-modal{{$enq->id}}" tabindex="-1" role="dialog" 
                                      aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade  modal-lg">
                                      <div role="document" class="modal-dialog">
                                      <div class="modal-content">
                                          <div class="modal-body">
                                              <h3 class="h6 text-uppercase mb-0">Enquiry Details</h3><hr/><br/>
                                              <p>Detail Information for: <b class="text-success">{{ $enq->name }}</b></p>
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
                                                <b>Plan Chosen:</b> {{ $enq->entity }}
                                              </div>
                                              <div class="my-2">
                                                  <b>Enquiry:</b> {!! $enq->enquiry !!}
                                              </div>
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
  </div>
</div>


@endsection
