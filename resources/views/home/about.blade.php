@extends('layouts.app')
@section('content')

<!-- About Us Area Start -->
<div class="about-us-area section-ptb">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-5">
                <!-- about-us-image Start -->
                <div class="about-us-image  wow fadeInBottom" data-wow-duration="1s">
                    <img src="assets/images/about/about-02.png" alt="">
                </div><!--// about-us-image End -->
            </div>
            <div class="col-lg-6 offset-lg-1">
                <div class="about-us-wrap">
                    <!-- section-title Start -->
                    <div class="section-title text-left">
                        <h4>ABOUT US</h4>
                        <h3>What We <span>Are</span></h3>
                    </div>
                    <!--// section-title End -->

                    <!-- About us content Start -->
                    <div class="about-us-content">
                        <p>
                          It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.
                          The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters,page when looking at its layout.
                          The point of using
                        </p>
                        <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
                        <ul>
                            <li>Content of a page when looking at its layout. </li>
                            <li>Content of a page when looking at its layout azer duskam. </li>
                            <li>Content of a page when looking at its layout azer</li>
                        </ul>  
                    </div>
                    <!--// About us content End -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- About Us Area End -->


<!-- Project-count-inner Start -->
<div class="project-count-inner section-pb overlay-bg section-pt-80">
    <div class="container">
        <div class="row">
        <div class="col-lg-3 col-sm-6">
            <!-- counter start -->
            <div class="counter text-center mt--30">
                <div class="count-icon">
                    <i class="bi bi-cup"></i>
                </div>
                <h3 class="counter-active">112</h3>
                <p>Award Won</p>
            </div>
            <!-- counter end -->
        </div>
        <div class="col-lg-3 col-sm-6">
            <!-- counter start -->
            <div class="counter text-center mt--30">
                <div class="count-icon">
                    <i class="bi bi-like"></i>
                </div>
                <h3 class="counter-active">345</h3>
                <p>Project Done</p>
            </div>
            <!-- counter end -->
        </div>
        <div class="col-lg-3 col-sm-6">
            <!-- counter start --> 
            <div class="counter text-center mt--30">
                <div class="count-icon">
                    <i class="bi bi-emo-smile"></i>
                </div>
                <h3 class="counter-active">215</h3>
                <p>Satisfied Client</p>
            </div>
            <!-- counter end -->
        </div>
        <div class="col-lg-3 col-sm-6">
            <!-- counter start -->
            <div class="counter text-center mt--30">
                <div class="count-icon">
                    <i class="bi bi-screen"></i>
                </div>
                <h3 class="counter-active">124</h3>
                <p>Running Project</p>
            </div>
            <!-- counter start -->
        </div>
    </div>
    </div>
</div>
<!-- Project-count-inner End -->


<!-- Our Team Area Start -->
<div class="our-team-area bg-grey section-ptb">
    <div class="container">
       <div class="row">
            <div class="col-lg-12">
                <!-- section-title Start -->
                <div class="section-title">
                    <h4>Team</h4>
                    <h3>Our Team  <span>Member</span></h3>
                </div>
                <!--// section-title End -->
            </div>
        </div>
        <div class="row">
            @if($members->count() > 0)
                @foreach($members as $member)
                    <div class="col-lg-3 col-md-6">
                        <!-- Single Team Start -->
                        <div class="single-team mt--30">
                            <div class="team-imgae">
                                <img src="{{$member->avatar}}" alt="">
                                <div class="social-link">
                                    @if($member->facebook == null)
                                        <a href="#"><i class="bi bi-facebook"></i></a>
                                    @else
                                        <a href="{{$member->facebook}}" target="_blank" ><i class="bi bi-facebook"></i></a>
                                    @endif
                                    @if($member->twitter == null)
                                        <a href="#"><i class="bi bi-twitter-bird"></i></a>
                                    @else
                                        <a href="{{$member->twitter}}" target="_blank"><i class="bi bi-twitter-bird"></i></a>
                                    @endif
                                    @if($member->youtube == null)
                                        <a href="#"><i class="bi bi-youtube"></i></a>
                                    @else
                                        <a href="{{$member->youtube}}" target="_blank"><i class="bi bi-youtube"></i></a>
                                    @endif
                                </div>
                            </div>
                            <div class="team-info">
                                <h3>{{$member->name}}</h3>
                            </div>
                        </div><!--// Single Team End -->
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</div>
<!-- Our Team Area End -->








@endsection