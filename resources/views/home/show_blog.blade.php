@extends('layouts.app')
@section('content')


<div class="blog-details-area section-ptb">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 order-2 order-lg-1">
                <!-- shop-sidebar-wrap start -->
                <div class="blog-sidebar-wrap">

                    <!-- shop-sidebar start -->

                    <!-- shop-sidebar start -->
                    @if($categories->count() > 1)
                        <div class="blog-sidebar mb--30">
                            <h4 class="title">OTHER CATEGORIES</h4>
                            <ul>  
                                @foreach($categories as $a_category)
                                    <li><a href="{{route('category.with.blog',['category_name'=>$a_category->name])}}">@if(($blog->category['name']) != ($a_category->name)){{$a_category->name}} @endif</a></li>
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
                <h3 class="text-bold ml-4 my-3">{{$blog->title}}</h3>
                <div class="blog-details-wrapper">
                    <div class="blog-details-image">
                        <img src="{{asset($blog->avatar)}}" width="600px" height="200px" class="img-fluid" alt="">
                    </div>
                    <div class="postinfo-wrapper">
                        <div class="post-info">
                            <p>{{$blog->description}}</p
                        </div>
                    </div>
                </div>
                <!-- blog-details-wrapper end -->
            </div>
        </div>
    </div>
</div>


@endsection