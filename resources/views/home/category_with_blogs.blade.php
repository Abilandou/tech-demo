@extends('layouts.app')
@section('title', 'Blog Category')
@section('content')


<div class="blog-area bg-grey section-ptb">
    <div class="container">
        <h3 class="my-3 ml-4 text-primary" >{{$category_name}}</h3>
        <div class="row">
            @if($categoryBlog->count() > 0)
                @foreach($categoryBlog as $blog)
                    <div class="col-lg-4">
                        <!-- single-latest-blog Start -->
                        <div class="single-latest-blog mb--30">
                            <div class="latest-blog-image">
                                <a href="{{route('single.blog',['url'=>$blog->url])}}">
                                    <img style="height: 250px; width:100%;" src="{{route('blog.image',["filename" => $blog->avatar])}}" alt="">
                                </a>
                            </div>
                            <div class="latest-blog-cont">
                                <h3><a href="{{route('single.blog',['url'=>$blog->url])}}">{{$blog->title}}</a></h3>
                                <p class="text-justify">{!! Str::limit($blog->description, 150) !!}</p>
                            </div>
                        </div><!--// single-latest-blog End -->
                    </div>
                @endforeach
            @endif
            
        </div>
        <!-- paginatoin-area Start -->
        <div class="paginatoin-area">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="pagination-box">
                        {{$categoryBlog->links()}}
                    </ul>
                </div>
            </div>
        </div><!--// paginatoin-area End -->
    </div>
</div>



@endsection