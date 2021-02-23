<html class="no-js" lang="en">


<!-- Mirrored from d29u17ylf1ylz9.cloudfront.net/seomar-v1/seomar/index-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 20 Jan 2020 11:55:54 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    
    <title>Tech-Republic | @yield('title')</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('public/assets/images/techfavicon.jpg')}}">
    
    <!-- CSS 
    ========================= -->
   
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('public/assets/css/bootstrap.min.css')}}">
    
    <!-- Fonts CSS -->
    <link rel="stylesheet" href="{{asset('public/assets/css/bicon.min.css')}}">
    
    <!-- Plugins CSS -->
    <link rel="stylesheet" href="{{asset('public/assets/css/plugins.css')}}">
    
    <!-- Main Style CSS -->
    <link rel="stylesheet" href="{{asset('public/assets/css/style.css')}}">
    
    <!-- Modernizer JS -->
    <script src="{{asset('public/assets/js/vendor/modernizr-2.8.3.min.js')}}"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link href="{{ asset('public/toastr/toastr.min.css') }}" rel="stylesheet">
    <script src="{{ asset('public/toastr/toastr.min.js') }}"></script>
    <style>
        a#scrollUp {
            content: "dd" !important;
        }
    </style>

    @yield('header-style')
</head>

<body>

     <!-- Header-area start -->
 <header class="header header-sticky mb-3">
     @include('layouts.header')
    
</header>
<!-- Header-area end -->
    <!-- Main Wrapper Start -->
    <div class="main-wrapper">
        @yield('content')
    </div>

    <!-- Footer Area Start -->

@include('layouts.footer')
<!-- Footer Area End -->
</body>

<!-- jQuery JS -->
<script src="{{asset('public/assets/js/vendor/jquery-1.12.4.min.js')}}"></script>
<!-- Popper JS -->
<script src="{{asset('public/assets/js/popper.min.js')}}"></script>
<!-- Bootstrap JS -->
<script src="{{asset('public/assets/js/bootstrap.min.js')}}"></script>
<!-- Plugins JS -->
<script src="{{asset('public/assets/js/plugins.js')}}"></script>
<!-- Ajax Mail -->
<script src="{{asset('public/assets/js/ajax-mail.js')}}"></script>
<!-- Main JS -->
<script src="{{asset('public/assets/js/main.js')}}"></script>

@include('includes.message')

@yield('footer-script')

</html>