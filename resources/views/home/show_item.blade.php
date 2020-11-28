@extends('layouts.app')
@section('title', 'Item-'.$item->name)
@section('content')


<div class="blog-details-area section-ptb">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 order-2 order-lg-1">
                <div class="blog-details-image">
                    <img src="{{asset($item->avatar)}}" width="600px" height="200px" class="img-fluid" alt="">
                </div>
            </div>
            <div class="col-lg-6 order-1 order-lg-2">
                <!-- blog-details-wrapper start -->
                <h3 class="text-bold ml-4 my-3">{{$item->name}}</h3>
                <div class="blog-details-wrapper">
                    <div class="postinfo-wrapper">
                        <div class="post-info">
                            <p class="text-justify">{{$item->description}}</p
                        </div>
                    </div>
                    <div class="mt-5">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#enquiryModal">
                            Make Enquiry
                        </button>
                    </div>
                </div>
                <!-- blog-details-wrapper end -->
            </div>
        </div>
    </div>
</div>
<div class="modal fade modal-dialog-centered" id="enquiryModal" tabindex="-1" role="dialog" aria-labelledby="enquiryModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="enquiryModalLabel">Make Enquiry on Item: {{ $item->name }}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <small>Required Fields are marked <span class="text-danger">*</span></small>
          <form action="{{ route('make.enquiry') }}" method="POST">
            @csrf
            <input type="hidden" name="item" value="{{ $item->name }}">
              <div class="row">
                  <div class="col-sm-12 col-md-12 col-lg-12">
                      <div class="form-group">
                          <label for="name">Your Name<span class="text-danger">*</span></label>
                          <input 
                            type="text"
                            required
                            value="{{ old('name') }}"
                            name="name" id="" 
                            class="form-control @error('name') is-invalid @enderror">
                            @error('name')
                                <span class="text-danger invalid-feedback">{{ $message }}</span>
                            @enderror
                      </div>
                  </div>
                  <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="form-group">
                        <label for="email">Your Email<span class="text-danger">*</span></label>
                        <input 
                            type="email"
                            required
                            value="{{ old('email') }}"
                            name="email" id="" 
                            class="form-control @error('email') is-invalid @enderror">
                            @error('email')
                                <span class="text-danger invalid-feedback">{{ $message }}</span>
                            @enderror
                    </div>
                  </div>
              </div>
              <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="form-group">
                        <label for="phone">Phone<span class="text-danger">*</span></label>
                        <input 
                            type="text"
                            required
                            value="{{ old('phone') }}"
                            name="phone" id="" 
                            class="form-control @error('phone') is-invalid @enderror">
                            @error('phone')
                                <span class="text-danger invalid-feedback">{{ $message }}</span>
                            @enderror
                    </div>
                </div>
             </div>
             <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="form-group">
                        <label for="phone">Enquiry<span class="text-danger">*</span></label>
                        <textarea 
                            name="enquiry"
                            required
                            class="form-control @error('enquiry') is-invalid @enderror" 
                            id="" >
                            {{ old('enquiry') }}
                        </textarea>
                        @error('enquiry')
                            <span class="text-danger invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
             </div>
             
         
        </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
      </div>
    </div>
  </div>


@endsection

@section('footer-script')
  <script>
      $(function(){
          @if(count($errors) > 0)
              $("#enquiryModal").modal('show');
          @endif
      });
  </script>
@endsection