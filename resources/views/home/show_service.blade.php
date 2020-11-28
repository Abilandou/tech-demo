@extends('layouts.app')
@section('title', 'Service-'.$service->name)
@section('content')


<div class="blog-details-area section-ptb">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 order-2 order-lg-1">
                <!-- shop-sidebar-wrap start -->
                <div class="blog-sidebar-wrap">

                    <!-- shop-sidebar start -->
                    <div class="blog-sidebar mb--30">
                        <h4 class="title">Search</h4>
                        <div class="search-post">
                            <form  action="#" class="search-blog">
                                <input type="text" placeholder="Enter Keywords...">
                                <button class=" btn-search" type="submit"><span class="bi bi-search"></span></button>
                            </form>
                        </div>
                    </div>
                    <!-- shop-sidebar end -->

                    <!-- shop-sidebar start -->
                    @if($services->count() > 1)
                        <div class="blog-sidebar mb--30">
                            <h4 class="title">OTHER SERVICES</h4>
                            <ul>  
                                @foreach($services as $a_service)
                                    <li><a href="{{route('single.service',['url'=>$a_service->url])}}">@if(($service->name) != ($a_service->name)){{$a_service->name}} @endif</a></li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <!-- shop-sidebar end -->

                    
                </div>
                <!-- shop-sidebar-wrap end -->
            </div>
            <div class="col-lg-8 order-1 order-lg-2">
                <!-- blog-details-wrapper start -->
                <h3 class="text-bold ml-4 my-3">{{$service->name}}</h3>
                <div class="blog-details-wrapper">
                    <div class="blog-details-image">
                        <img src="{{asset($service->avatar)}}" width="600px" height="200px" class="img-fluid" alt="">
                    </div>
                    <div class="postinfo-wrapper">
                        <div class="post-info">
                            <p>{{$service->description}}</p>
                        </div>
                    </div>
                </div>
                <!-- blog-details-wrapper end -->

                @if($subServices->count() > 0)
                    <div class="container"><h4>More On: {{ $service->name }} </h4></div>
                    <div id="exTab3" class="container">	
                        <ul  class="nav nav-pills">
                            <li class="active">
                                @foreach ($subServices as $sub_service)
                                    <li class="active ml-3 text-uppercase"><a data-toggle="tab" href="#{{$sub_service->id}}">{{$sub_service->name}}</a></li>
                                @endforeach
                            </li>
                        </ul>
                        <hr/>
                        <div class="tab-content clearfix">
                            @foreach ($subServices as $sub_service)
                                <div class="tab-pane @if($sub_service) active @endif" id="{{ $sub_service->id }}">
                                    <h6>{{$sub_service->name}}</h6>
                                    <p>{{ $sub_service->description }}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif

            </div>
        </div>
    </div>
</div>

<style>
    .the_headers {
        color:blue;
    }
</style>

@endsection