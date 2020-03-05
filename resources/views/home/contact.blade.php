@extends('layouts.app')
@section('content')


    <!-- contact Area Start -->
    <div class="contact-area section-ptb mt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- section-title Start -->
                    <div class="section-title">
                        <h3>Get in <span>Touch</span></h3>
                    </div>
                    <!--// section-title End -->
                </div>
            </div>
            <div class="contact-info-wrap">
                <div class="row">
                    <div class="col-lg-8 ml-auto mr-auto">
                        <div class="row">
                            <div class="col-lg-4 col-md-4">
                                <!-- single-contact Start -->
                                <div class="single-contact-info text-center mt--30">
                                    <div class="contact-info-icon">
                                        <span class="bi bi-location-pointer"></span>
                                    </div> <!--// contact-icon -->

                                    <div class="contact-info">
                                        <p>Greenline, 4/3 north corn walinon, concord palase,Usa.</p>
                                    </div><!--// contact-info -->
                                </div>
                                <!-- single-contact End -->
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <!-- single-contact Start -->
                                <div class="single-contact-info text-center mt--30">
                                    <div class="contact-info-icon">
                                        <span class="bi bi-envelop"></span>
                                    </div> <!--// contact-icon -->

                                    <div class="contact-info">
                                        <a href="#">info@website.com</a>
                                        <a href="#">sales@website.com</a>
                                    </div><!--// contact-info -->
                                </div>
                                <!-- single-contact End -->
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <!-- single-contact Start -->
                                <div class="single-contact-info text-center mt--30">
                                    <div class="contact-info-icon">
                                        <span class="bi bi-phone"></span>
                                    </div> <!--// contact-icon -->

                                    <div class="contact-info">
                                        <a href="#">+1 88345 789 456</a>
                                        <a href="#">+1 (259) 235-3898</a>
                                    </div><!--// contact-info -->
                                </div>
                                <!-- single-contact End -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8  ml-auto mr-auto">
                    <!-- contact-form-warp Start -->
                    <div class="contact-form-warp pt--60 section-pb">
                        
                        @if(Session::has('message_error'))
                        <div class="alert alert-error alert-block">
                            <button type="button" class="close" data-dismiss="alert">x</button>
                                <strong class="text-danger">{!! session('message_error') !!}</strong>
                        </div>
                        @endif         
                        @if(Session::has('message_success'))
                        <div class="alert alert-error alert-block">
                            <button type="button" class="close" data-dismiss="alert">x</button>
                                <strong class="text-success">{!! session('message_success') !!}</strong>
                        </div>
                        @endif 

                        <form action="{{ route('user.contact') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="input-box">
                                        <input name="name" placeholder="Your Name*" type="text" 
                                            class="form-control @error('name') is-invalid 
                                            @enderror" value="{{ old('name') }}" required 
                                            autocomplete="name" autofocus>
                                            @error('name')
                                                <span class="invalid-feedback text-center" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="input-box">
                                        <input name="email" placeholder="Mail Address*" type="email" 
                                        class="form-control @error('email') is-invalid 
                                        @enderror" value="{{ old('email') }}" required 
                                        autocomplete="email" autofocus>
                                        @error('email')
                                            <span class="invalid-feedback text-center" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="input-box">
                                        <input name="phone" placeholder="Phone*" type="text" 
                                        class="form-control @error('phone') is-invalid 
                                        @enderror" value="{{ old('phone') }}" required 
                                        autocomplete="phone" autofocus>
                                        @error('phone')
                                            <span class="invalid-feedback text-center" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="input-box">
                                        <input name="subject" placeholder="Subject*" type="text" 
                                        class="form-control about-us-content @error('subject') is-invalid 
                                        @enderror" value="{{ old('subject') }}" required 
                                        autocomplete="subject" autofocus>

                                        @error('subject')
                                            <span class="invalid-feedback text-center" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="input-box">
                                        <textarea name="message" placeholder="Your Message*" class="form-control @error('message') is-invalid 
                                        @enderror" value="{{ old('message') }}" required 
                                        autocomplete="message" autofocus></textarea>

                                        @error('message')
                                            <span class="invalid-feedback text-center" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="float-right">
                                <button type="submit" class="border-radius  default-btn">Send Email</button>
                                
                            </div>
                        </form>
                    </div>
                    <!-- contact-form-warp End -->
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="map-area">
                        <div id="map"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- contact Area End -->



@endsection