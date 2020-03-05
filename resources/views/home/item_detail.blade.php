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
                    @if($itemCategories->count() > 1)
                        <div class="blog-sidebar mb--30">
                            <h4 class="title">OTHER CATEGORIES</h4>
                            <ul>  
                                @foreach($itemCategories as $a_category)
                                    <li><a href="{{route('item.name.by.category',['item_category'=>$a_category->name])}}">@if(($item->itemCategory['name']) != ($a_category->name)){{$a_category->name}} @endif</a></li>
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
                <h3 class="text-bold ml-4 my-3">{{$item->name}}</h3>
                <div class="blog-details-wrapper">
                    <div class="blog-details-image">
                        <img src="{{asset($item->avatar)}}" width="600px" height="200px" class="img-fluid" alt="">
                    </div>
                    <div class="postinfo-wrapper">
                        <div class="post-info">
                            <p>{{$item->description}}</p
                        </div>
                    </div>
                </div>
                <!-- blog-details-wrapper end -->

                <hr/>

                @if(Session::has('message_error'))
                <div class="alert alert-error alert-block">
                    <button type="button" class="close" data-dismiss="alert">x</button>
                        <strong>{!! session('message_error') !!}</strong>
                </div>
                @endif         
                @if(Session::has('message_success'))
                <div class="alert alert-error alert-block">
                    <button type="button" class="close" data-dismiss="alert">x</button>
                        <strong>{!! session('message_success') !!}</strong>
                </div>
                @endif   


                <p class="text-danger">@if($errors->count() > 0) {{$errors}} @endif</p>
                <button type="button" data-toggle="modal" 
                    data-target="#enquiryModal" class="btn btn-success btn-block btn-lg">
                    Need This Item? Make An Enquiry
                </button>

            </div>
        </div>
    </div>
</div>

<div id="enquiryModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header center">
                <h6 class="modal-title ">Making Enquiry On:
                    <b class="text-primary">{{ $item->name }}</b></h6><br/>
                    
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                
            </div>
            <div class="modal-body">
                <p>Item Image: <img src="{{asset($item->avatar)}}" width="50px" height="50px" class="img-round" alt=""></p>
                <p>Please Fill the form below to complete your enquiry, Required Fields are marked with <b class="text-danger">*</b></p>
                <form action="{{route('client.enquiry.message')}}"
                      method="POST">
                    @csrf

                    <input type="hidden" name="item_id" value="{{ $item->id }}">
                    <input type="hidden" name="item_name" value="{{ $item->name }}">
                    <div class="form-group">
                        <label class="form-control-label text-uppercase">Name<b class="text-danger">*</b></label>
                        <input type="text" name="name" placeholder="Your Name" 
                            class="form-control @error('name') is-invalid @enderror" 
                            value="{{ old('name') }}" required autocomplete="name" autofocus>
                        @error('name')
                            <span class="invalid-feedback text-center" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                      <label class="form-control-label text-uppercase">Email<b class="text-danger">*</b></label>
                      <input type="email" name="email" placeholder="Your Email Address" 
                        class="form-control @error('email') is-invalid @enderror" 
                        value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                            <span class="invalid-feedback text-center" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-control-label text-uppercase">Phone Number<b class="text-danger">*</b></label>
                        <input type="text" name="telephone" placeholder="Your Phone Number" 
                          class="form-control @error('telephone') is-invalid @enderror" 
                          value="{{ old('telephone') }}" required autocomplete="telephone" autofocus>
                          @error('telephone')
                              <span class="invalid-feedback text-center" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      </div>

                      <div class="form-group">
                        <label class="form-control-label text-uppercase">Message<b class="text-danger">*</b></label>
                   
                          <textarea required name="message" rows="5"
                              placeholder="what do have to say?"
                              class="form-control"></textarea>
                        
                      </div>

                    

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Make Enquiry</button>
            </div>
            </form>
        </div>

    </div>
</div>


@endsection