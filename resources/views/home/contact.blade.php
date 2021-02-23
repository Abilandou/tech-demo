@extends('layouts.app')
@section('title', 'Contact Us')
@section('header-style')
    <style>
        .contact-info a, .contact-info p{
            color: black !important;

        }
    </style>
@endsection
@section('content')


    <!-- contact Area Start -->
    <div class="mt-5 contact-area section-ptb">
        <div class="container" style="color: rgb(252, 250, 250)" >
        
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
                    <div class="ml-auto mr-auto col-lg-8">
                        <div class="row">
                            <div class="col-lg-4 col-md-4">
                                <!-- single-contact Start -->
                                <div class="text-center single-contact-info mt--30">
                                    <div class="contact-info-icon">
                                        <span class="bi bi-location-pointer"></span>
                                    </div> <!--// contact-icon -->

                                    <div class="contact-info">
                                        <p>Cameroon, Southwest Region, Buea , Beside Presbyterian church Molyko</p>
                                    </div><!--// contact-info -->
                                </div>
                                <!-- single-contact End -->
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <!-- single-contact Start -->
                                <div class="text-center single-contact-info mt--30">
                                    <div class="contact-info-icon">
                                        <span class="bi bi-envelop"></span>
                                    </div> <!--// contact-icon -->

                                    <div class="contact-info">
                                        <a href="#">info@techrepublic.tech</a>
                                        <a href="#">support@techrepublic.tech</a>
                                        
                                    </div><!--// contact-info -->
                                </div>
                                <!-- single-contact End -->
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <!-- single-contact Start -->
                                <div class="text-center single-contact-info mt--30">
                                    <div class="contact-info-icon">
                                        <span class="bi bi-phone"></span>
                                    </div> <!--// contact-icon -->

                                    <div class="contact-info">
                                        <a href="#">(+237)678-981-340</a>
                                        <a href="#">(+237) 650-534-961</a>
                                    </div><!--// contact-info -->
                                </div>
                                <!-- single-contact End -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                @include('includes.message')
                <div class="ml-auto mr-auto col-lg-8">
                    <!-- contact-form-warp Start -->
                    <div class="contact-form-warp pt--60 section-pb">
                        <form  action="{{ route('user.contact') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="input-box">
                                        <input name="name" placeholder="Your Name*" type="text" 
                                            class="form-control @error('name') is-invalid 
                                            @enderror" value="{{ old('name') }}" required 
                                            autocomplete="name" autofocus>
                                            @error('name')
                                                <span class="text-center invalid-feedback" role="alert">
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
                                            <span class="text-center invalid-feedback" role="alert">
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
                                            <span class="text-center invalid-feedback" role="alert">
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
                                            <span class="text-center invalid-feedback" role="alert">
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
                                            <span class="text-center invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="text-center contact-submit-btn">
                                <button type="submit" class="submit-btn border-radius default-btn">Send Email</button>
                                <p class="form-messege"></p>
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