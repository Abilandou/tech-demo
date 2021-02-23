<!DOCTYPE html>
<html>

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, shrink-to-fit=no">
    <title>Admin | @if(Auth::guard("admin")->check()) @yield('title') @else Login @endif</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{asset('public/assets/images/techfavicon.jpg')}}">
    <link rel="stylesheet" href="{{asset('public/admin/demo-files/demo.css')}}">
    <link rel="stylesheet" href="{{asset('public/admin/themify-icons.css')}}">
    <!--[if lt IE 8]><!-->
    <link rel="stylesheet" href="{{asset('public/admin/ie7/ie7.css')}}">
    <link rel="stylesheet" href="{{asset('public/admin/demo-files/demo.css')}}">
    <link rel="stylesheet" href="{{asset('public/admin/themify-icons.css')}}">
    <!--[if lt IE 8]><!-->
    <link rel="stylesheet" href="{{asset('public/admin/ie7/ie7.css')}}">

    <!-- plugins css -->
    <link rel="stylesheet" href="{{asset('public/admin/assets/vendors/bootstrap/dist/css/bootstrap.css')}}" />
    <link rel="stylesheet" href="{{asset('public/admin/assets/vendors/PACE/themes/blue/pace-theme-minimal.css')}}" />
    <link rel="stylesheet" href="{{asset('public/admin/assets/vendors/perfect-scrollbar/css/perfect-scrollbar.min.css')}}" />

    <!-- page plugins css -->
    <link rel="stylesheet" href="{{asset('public/admin/assets/vendors/bower-jvectormap/jquery-jvectormap-1.2.2.css')}}" />
    <link rel="stylesheet" href="{{asset('public/admin/assets/vendors/nvd3/build/nv.d3.min.css')}}" />

    <!-- core css -->
    <link href="{{asset('public/admin/assets/css/ei-icon.css')}}" rel="stylesheet">
    <link href="{{asset('public/admin/assets/css/themify-icons.css')}}" rel="stylesheet">
    <link href="{{asset('public/admin/assets/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/admin/assets/css/animate.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/admin/assets/css/app.css')}}" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link href="{{ asset('public/toastr/toastr.min.css') }}" rel="stylesheet">
    <script src="{{ asset('public/toastr/toastr.min.js') }}"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css"/>
    @yield('header-style')
</head>

  <body>
    <div class="app">
    <div class="layout">
        @if(Auth::guard("admin")->check())
        <!-- Side Nav START -->
        <div class="side-nav">
            @include('layouts.sidebar')
        </div>
        <!-- Side Nav END -->

        <!-- Page Container START -->
        <div class="page-container">
            <!-- Header START -->
            <div class="header navbar">
                @include('layouts.admin_header')
            </div>
              <!-- Header END -->

        @endif

               <!-- Content Wrapper START -->
               <main>
                    @yield('content')
               </main>
              <!-- Content Wrapper END -->

        @if(Auth::guard("admin")->check())
        <!-- Footer START -->
        @include('layouts.admin_footer')
       
     <!-- Footer END -->
       @endif
          </div>
      </div>
    </div>

    <script src="{{asset('public/admin/assets/js/vendor.js')}}"></script>

    <!-- page plugins js -->
    <script src="{{asset('public/admin/assets/vendors/bower-jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
    <script src="{{asset('public/admin/assets/js/maps/jquery-jvectormap-us-aea.js')}}"></script>
    <script src="{{asset('public/admin/assets/vendors/d3/d3.min.js')}}"></script>
    <script src="{{asset('public/admin/assets/vendors/nvd3/build/nv.d3.min.js')}}"></script>
    <script src="{{asset('public/admin/assets/vendors/jquery.sparkline/index.js')}}"></script>
    <script src="{{asset('public/admin/assets/vendors/chart')}}/dist/Chart.min.js')}}"></script>

    <script src="{{asset('public/admin/assets/js/app.min.js')}}"></script>

    <!-- page js -->
    <script src="{{asset('public/admin/assets/js/dashboard/dashboard.js')}}"></script>
       <!-- page plugins js -->
       <script src="{{asset('public/admin/assets/vendors/datatables/media/js/jquery.dataTables.js')}}"></script>

       <!-- page js -->
       <script src="{{asset('public/admin/assets/js/table/data-table.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/js-cookie@2/src/js.cookie.min.js"></script>
    <script src="https://cdn.tiny.cloud/1/ajv0qq1z40j464oqjhs69ytpn3fhmqyr1a1efa75k21w9gb1/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>tinymce.init({selector:'textarea', height: 300});</script>

  <script>
      $(document).ready(function () {
  
          $('.delete-record').click(function (e) {
              e.preventDefault();
              var form = $(this).parents('form');
              swal(
                  {
                      title: "Sure To Delete This Record?",
                      text: "You won't be able to recover this record'",
                      type: "warning",
                      showCancelButton: true,
                      confirmButtonColor: "#3085d6",
                      cancelButtonColor: "#d33",
                      confirmButtonText: "Yes, Delete It",
                      cancelButtonText: "No, Cancel",
                      confirmButtonClass: "btn btn-primary",
                      cancelButtonClass: "btn btn-danger"
                  },
                  function (isConfirm) {
                      if (isConfirm) form.submit();
                  }
              );
          });
      });
  </script>


<script>
    var inputFileCount = 1;
    const inputFileSize = 5;

    $(function () {
        $("#addFile").on('click', function () {
            if (inputFileCount < inputFileSize) {
                inputFileCount++;
                var html = '' +
                    '<div class="mb-5 position-relative input-section">' +
                    '<button class="btn btn-danger btn-rounded remove-btn"' +
                    '   type="button" onclick="closeBlock(this, 1)" style="margin-top:-30px; float:right">' +
                    '  <i class="ti-minus"></i></button>' +

                    '<div >' +
                    '       <input type="file" class="form-control" name="the_image[]">' +
                    '   </div>' +
                    '</div>';

                html = $(html).hide().fadeIn(600);
                $("#inputFile").append(html);

                if (inputFileCount === inputFileSize) {
                    $('#addFile').hide();
                }
            } else {
                alert("Please provide a maximum of three");
            }
        });

        $('.blog-slider').slick({
            infinite: true,
            slidesToShow: 4,
            slidesToScroll: 1,
            responsive: [
                {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 2.5,
                        slidesToScroll: 3,
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1.5,
                        slidesToScroll: 1
                    }
                }]
        });
    });

    function closeBlock(block, section) {
        let foo = $(block).parent('.input-section');
        foo.fadeOut(500, function () {
            foo.remove();
        });

        if (section === 1) {
            inputFileCount--;
            if (inputFileCount < inputFileSize) {
                $('#addFile').show(600);
            }
        }
    }
</script>
  
  @include('includes.message')


  <script>
    $(function() {
        $('textarea.tinymce').tinymce({
            selector: 'textarea'
        });
    });
</script>
@yield('footer-script')

  </body>
</html>

