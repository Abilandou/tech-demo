@extends('layouts.app')
@section('title', 'Web Plans')
@section('content')


<div class="pricing-area section-ptb">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!-- section-title Start -->
                <div class="section-title">
                    <h4>PRICING</h4>
                    <h3>Website <span>Pricing</span></h3>
                </div>
                <!--// section-title End -->
            </div>
        </div>
        <div class="row">
            @foreach($plans as $plan)
                <div class="col-lg-4 col-md-6">
                    <!-- Single-pricing Start-->
                    <div class="single-priceing text-center mt--30">
                        <div class="priceing-header">
                            <h4>{{ $plan->name }}</h4>
                        </div>
                        <div class="pricing-title">
                            <h3>Price<span>$</span><span class="price-tb">{{ $plan->price }} </span> Only</h3>
                            <p>It’s Perfect for a small business</p>
                        </div>
                        <div class="pricing-body">
                            <p>
                                {!! $plan->description !!}
                            </p>
                            <div class="plan-button">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#enquiryModal">
                                    Choose Plan
                                </button>
                            </div>
                        </div>
                    </div> <!--// Single-pricing End-->
                </div>
                <div class="modal fade modal-dialog-centered" id="enquiryModal" tabindex="-1" role="dialog" aria-labelledby="enquiryModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="enquiryModalLabel">Make Enquiry For Plan: {{ $plan->name }}</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                            <small>Required Fields are marked <span class="text-danger">*</span></small>
                          <form action="{{ route('make.enquiry') }}" method="POST">
                            @csrf
                            <input type="hidden" name="item" value="{{ $plan->name }}">
                            <input type="hidden" name="type" value="plan">
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
                                        <label for="phone">Additional Information<span class="text-danger">*</span></label>
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
            @endforeach
            
        </div>

    </div>
</div>

<div class="paginatoin-area">
    <div class="row">
        <div class="col-lg-12">
            <ul class="pagination-box">
                {{$plans->links()}}
            </ul>
        </div>
    </div>
</div><!--// paginatoin-area End -->


@endsection