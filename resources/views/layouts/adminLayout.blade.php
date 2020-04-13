<!DOCTYPE html>
<html>

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, shrink-to-fit=no">
    <title>Admin | @if(Auth::check()) Dashboard @else Login @endif</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{asset('assets/images/techfavicon.jpg')}}">
    <link rel="stylesheet" href="{{asset('admin/demo-files/demo.css')}}">
    <link rel="stylesheet" href="{{asset('admin/themify-icons.css')}}">
    <!--[if lt IE 8]><!-->
    <link rel="stylesheet" href="{{asset('admin/ie7/ie7.css')}}">
    <link rel="stylesheet" href="{{asset('admin/demo-files/demo.css')}}">
    <link rel="stylesheet" href="{{asset('admin/themify-icons.css')}}">
    <!--[if lt IE 8]><!-->
    <link rel="stylesheet" href="{{asset('admin/ie7/ie7.css')}}">

    <!-- plugins css -->
    <link rel="stylesheet" href="{{asset('admin/assets/vendors/bootstrap/dist/css/bootstrap.css')}}" />
    <link rel="stylesheet" href="{{asset('admin/assets/vendors/PACE/themes/blue/pace-theme-minimal.css')}}" />
    <link rel="stylesheet" href="{{asset('admin/assets/vendors/perfect-scrollbar/css/perfect-scrollbar.min.css')}}" />

    <!-- page plugins css -->
    <link rel="stylesheet" href="{{asset('admin/assets/vendors/bower-jvectormap/jquery-jvectormap-1.2.2.css')}}" />
    <link rel="stylesheet" href="{{asset('admin/assets/vendors/nvd3/build/nv.d3.min.css')}}" />

    <!-- core css -->
    <link href="{{asset('admin/assets/css/ei-icon.css')}}" rel="stylesheet">
    <link href="{{asset('admin/assets/css/themify-icons.css')}}" rel="stylesheet">
    <link href="{{asset('admin/assets/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('admin/assets/css/animate.min.css')}}" rel="stylesheet">
    <link href="{{asset('admin/assets/css/app.css')}}" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link href="{{ asset('toastr/toastr.min.css') }}" rel="stylesheet">
    <script src="{{ asset('toastr/toastr.min.js') }}"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css"/>
     <!-- Image uploader-->
     <link href="{{ asset('admin/image_uploader_plugin/dist/image-uploader.min.css') }}" rel="stylesheet" type="text/css" />
</head>

  <body>
    <div class="app">
    <div class="layout">
        @if(Auth::check())
        <!-- Side Nav START -->
        <div class="side-nav">
            <div class="side-nav-inner">
                <div class="side-nav-logo">
                    <a href="{{route('admin.dashboard')}}">
                            <div><img src="{{ asset('assets/images/techfavicon.jpg')}}" width="50px"
                                    style="padding: 0.35rem 0;"></div>
                    </a>
                    <div class="mobile-toggle side-nav-toggle">
                        <a href="">
                            <i class="ti-arrow-circle-left"></i>
                        </a>
                    </div>
                </div>
                <ul class="side-nav-menu scrollable">
                    <li class="nav-item active">
                        <a class="mrg-top-30" href="{{route('admin.dashboard')}}">
                            <span class="icon-holder">
                            <i class="ti-home"></i>
                            </span>
                            <span class="title">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="dropdown-toggle" href="javascript:void(0);">
                            <span class="icon-holder">
                            <i class="ti-package"></i>
                            </span>
                            <span class="title">CMS Pages</span>
                            <span class="arrow">
                            <i class="ti-angle-right"></i>
                            </span>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="{{route('cms.services')}}">Service Section</a>
                            </li>
                            <li>
                                <a href="{{route('cms.sub_services')}}">Sub Services</a>
                            </li>
                            <li>
                                <a href="{{route('cms.members')}}">Team Members</a>
                            </li>
                            <li>
                                <a href="{{route('cms.testimonies')}}">Testimonies</a>
                            </li>
                            <li>
                                <a href="{{route('cms.contacts')}}">Contacts</a>
                            </li>
                        </ul>
                      </li>
                    <li class="nav-item dropdown">
                        <a class="dropdown-toggle" href="javascript:void(0);">
                            <span class="icon-holder">
                              <i class="ti-package"></i>
                            </span>
                            <span class="title">Blog Section</span>
                            <span class="arrow">
                              <i class="ti-angle-right"></i>
                            </span>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="{{route('cms.categories')}}">Categories</a>
                            </li>
                            <li>
                                <a href="{{route('cms.blogs')}}">Blogs</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="dropdown-toggle" href="javascript:void(0);">
                            <span class="icon-holder">
                              <i class="ti-package"></i>
                            </span>
                            <span class="title">Shop Section</span>
                            <span class="arrow">
                              <i class="ti-angle-right"></i>
                            </span>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="{{route('items.categories')}}">Categories</a>
                            </li>
                            <li>
                                <a href="{{route('shop.items')}}">Items</a>
                            </li>
                            <li>
                                <a href="{{route('shop.enquiries')}}">Enquiry Messages</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <!-- Side Nav END -->

        <!-- Page Container START -->
        <div class="page-container">
            <!-- Header START -->
            <div class="header navbar">
                <div class="header-container">
                    <ul class="nav-left">
                        <li>
                            <a class="side-nav-toggle" href="javascript:void(0);">
                            <i class="ti-view-grid"></i>
                            </a>
                        </li>
                        {{-- <li class="search-box">
                            <a class="search-toggle no-pdd-right" href="javascript:void(0);">
                                <i class="search-icon ti-search pdd-right-10"></i>
                                <i class="search-icon-close ti-close pdd-right-10"></i>
                            </a>
                        </li> --}}
                        </li>
                      </ul>
                      <ul class="nav-right">
                        <li class="user-profile dropdown">
                            <a href="" class="dropdown-toggle" data-toggle="dropdown">
                                @if(Auth::user()->avatar == null)
                                  <img class="profile-img img-fluid" src="{{asset('admin/assets/images/user.jpg')}}" alt="">
                                @else
                                  <img class="profile-img img-fluid" src="{{asset(Auth::user()->avatar)}}" alt="">
                                @endif
                                  <div class="user-info">
                                      <span class="name pdd-right-5">{{Auth::user()->name}}</span>
                                      <i class="ti-angle-down font-size-10"></i>
                                  </div>
                            </a>
                            <ul class="dropdown-menu">
                                  <li>
                                      <a href="{{route('admin.setting.form')}}">
                                          <i class="ti-settings pdd-right-10"></i>
                                          <span>Setting</span>
                                      </a>
                                  </li>
                                  <li>
                                      <a href="{{route('admin.profile.form')}}">
                                          <i class="ti-user pdd-right-10"></i>
                                          <span>Profile</span>
                                      </a>
                                  </li>
                                  <li role="separator" class="divider"></li>
                                  <li>
                                      <a href="{{route('admin.logout')}}">
                                          <i class="ti-power-off pdd-right-10"></i>
                                          <span>Logout</span>
                                      </a>
                                  </li>
                            </ul>
                        </li>
                        {{-- <li class="notifications dropdown">
                            <span class="counter">2</span>
                            <a href="" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="ti-bell"></i>
                            </a>

                            <ul class="dropdown-menu ">
                                    <li class="notice-header">
                                        <i class="ti-bell pdd-right-10"></i>
                                        <span>Notifications</span>
                                    </li>
                                    <li>
                                        <ul class="list-info overflow-y-auto relative scrollable">
                                            <li>
                                                <a href="">
                                                    <img class="thumb-img" src="assets/images/avatars/thumb-5.jpg" alt="">
                                                    <div class="info">
                                                        <span class="title">
                                                    <span class="font-size-14 text-semibold">Jennifer Watkins</span>
                                                        <span class="text-gray">commented on your <span class="text-dark">post</span></span>
                                                        </span>
                                                        <span class="sub-title">5 mins ago</span>
                                                    </div>
                                                </a>
                                            </li>
                                    <li class="notice-footer">
                                        <span>
                                            <a href="" class="text-gray">Check all notifications <i class="ei-right-chevron pdd-left-5 font-size-10"></i></a>
                                        </span>
                                    </li>
                            </ul>
                        </li> --}}
                       
                      </ul>
                  </div>
              </div>
              <!-- Header END -->

        @endif

               <!-- Content Wrapper START -->
               <main>
                    @yield('content')
               </main>
              <!-- Content Wrapper END -->

        @if(Auth::check())
        <!-- Footer START -->
        <footer class="content-footer">
         <div class="footer">
             <div class="copyright">
                 <span>Copyright &copy; <?php echo(date('Y'));?> <b class="text-dark">TechRepublic</b>. All rights reserved.</span>
             </div>
         </div>
       </footer>
     <!-- Footer END -->
       @endif
          </div>
      </div>
    </div>

    <script src="{{asset('admin/assets/js/vendor.js')}}"></script>

    <!-- page plugins js -->
    <script src="{{asset('admin/assets/vendors/bower-jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/maps/jquery-jvectormap-us-aea.js')}}"></script>
    <script src="{{asset('admin/assets/vendors/d3/d3.min.js')}}"></script>
    <script src="{{asset('admin/assets/vendors/nvd3/build/nv.d3.min.js')}}"></script>
    <script src="{{asset('admin/assets/vendors/jquery.sparkline/index.js')}}"></script>
    <script src="{{asset('admin/assets/vendors/chart')}}/dist/Chart.min.js')}}"></script>

    <script src="{{asset('admin/assets/js/app.min.js')}}"></script>

    <!-- page js -->
    <script src="{{asset('admin/assets/js/dashboard/dashboard.js')}}"></script>
       <!-- page plugins js -->
       <script src="{{asset('admin/assets/vendors/datatables/media/js/jquery.dataTables.js')}}"></script>

       <!-- page js -->
       <script src="{{asset('admin/assets/js/table/data-table.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/js-cookie@2/src/js.cookie.min.js"></script>
    <script src="{{ asset('admin/image_uploader_plugin/dist/image-uploader.min.js')}}"></script>

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
@yield('footer_script')




  </body>
</html>

