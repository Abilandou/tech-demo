<!DOCTYPE html>
<html>


  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin | @if(Auth::check()) Dashboard @else Login @endif</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="{{asset('admin/vendor/bootstrap/css/bootstrap.min.css')}}">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <!-- Google fonts - Popppins for copy-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,800">
    <!-- orion icons-->
    <link rel="stylesheet" href="{{asset('admin/css/orionicons.css')}}">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="{{asset('admin/css/style.default.css')}}" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="{{asset('admin/css/custom.css')}}">
    <!-- Favicon-->
    <link rel="shortcut icon" href="{{asset('assets/images/techfavicon.jpg')}}">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link href="{{ asset('toastr/toastr.min.css') }}" rel="stylesheet">
    <script src="{{ asset('toastr/toastr.min.js') }}"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css"/>

  </head>



  <body>
    @if(Auth::check())
    <!-- navbar-->
    <header class="header">
      <nav class="navbar navbar-expand-lg px-4 py-2 bg-white shadow">
        <a href="#" class="sidebar-toggler text-gray-500 mr-4 mr-lg-5 lead">
          <i class="fas fa-align-left"></i>
        </a>
        <a href="{{route('admin.dashboard')}}" 
          class="navbar-brand font-weight-bold text-uppercase text-base">
          TechRepublic Admin Dashboard
        </a>
        <ul class="ml-auto d-flex align-items-center list-unstyled mb-0">
          <li class="nav-item">
            <form id="searchForm" class="ml-auto d-none d-lg-block">
              <div class="form-group position-relative mb-0">
                <button type="submit" style="top: -3px; left: 0;" 
                class="position-absolute bg-white border-0 p-0">
                <i class="o-search-magnify-1 text-gray text-lg"></i></button>
                <input type="search" placeholder="Search ..." 
                class="form-control form-control-sm border-0 no-shadow pl-4">
              </div>
            </form>
          </li>
          <li class="nav-item dropdown ml-auto">
            <a id="userInfo" href="http://example.com" 
              data-toggle="dropdown" aria-haspopup="true" 
              aria-expanded="false" class="nav-link dropdown-toggle">
              @if(Auth::user()->avatar == null)
                  <img src="img/avatar-6.jpg" alt="avartar"
                  style="max-width: 2.5rem;" class="img-fluid rounded-circle shadow">
              @else
                <img src="{{asset(Auth::user()->avatar)}}" alt="avatar"
                style="max-width: 2.5rem;" class="img-fluid rounded-circle shadow">
              @endif
            </a>
            <div aria-labelledby="userInfo" class="dropdown-menu">
              <a href="#" class="dropdown-item">
                <strong class="d-block text-uppercase headings-font-family">
                  {{Str::limit(Auth::user()->name, 10)}}</strong><small>Adminsitrator</small></a>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item">Profile</a>
              <a href="#" class="dropdown-item">Settings</a>
              <div class="dropdown-divider"></div>
              <a href="{{route('admin.logout')}}" class="dropdown-item">Logout</a>
            </div>
          </li>
          <li class="nav-item dropdown mr-3"><a id="notifications" href="http://example.com" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle text-gray-400 px-1"><i class="fa fa-bell"></i><span class="notification-icon"></span></a>
            <div aria-labelledby="notifications" class="dropdown-menu"><a href="#" class="dropdown-item">
                <div class="d-flex align-items-center">
                  <div class="icon icon-sm bg-violet text-white"><i class="fab fa-twitter"></i></div>
                  <div class="text ml-2">
                    <p class="mb-0">You have 2 followers</p>
                  </div>
                </div></a><a href="#" class="dropdown-item"> 
                <div class="d-flex align-items-center">
                  <div class="icon icon-sm bg-green text-white"><i class="fas fa-envelope"></i></div>
                  <div class="text ml-2">
                    <p class="mb-0">You have 6 new messages</p>
                  </div>
                </div></a><a href="#" class="dropdown-item">
                <div class="d-flex align-items-center">
                  <div class="icon icon-sm bg-blue text-white"><i class="fas fa-upload"></i></div>
                  <div class="text ml-2">
                    <p class="mb-0">Server rebooted</p>
                  </div>
                </div></a><a href="#" class="dropdown-item">
                <div class="d-flex align-items-center">
                  <div class="icon icon-sm bg-violet text-white"><i class="fab fa-twitter"></i></div>
                  <div class="text ml-2">
                    <p class="mb-0">You have 2 followers</p>
                  </div>
                </div></a>
              <div class="dropdown-divider"></div><a href="#" class="dropdown-item text-center"><small class="font-weight-bold headings-font-family text-uppercase">View all notifications</small></a>
            </div>
          </li>
        </ul>
      </nav>
    </header>
    @endif
    <div class="d-flex align-items-stretch">
      @if(Auth::check())
      <div id="sidebar" class="sidebar py-3">

        <ul class="sidebar-menu list-unstyled">

              <li class="sidebar-list-item"><a href="{{route('admin.dashboard')}}" 
                class="sidebar-link text-muted nav-item {{ Route::is('admin.dashboard') ? 'active' : '' }}">
                <span><img  src="{{asset('assets/images/techfavicon.jpg')}}"  width="30px" height="30px" />DashBoard</span></a></li>
              
                <li class="sidebar-list-item"><a href="charts.html" 
                class="sidebar-link text-muted"><i class="o-sales-up-1 mr-3 text-gray"></i><span>Charts</span></a></li>
              
                <li class="sidebar-list-item"><a href="tables.html" 
                class="sidebar-link text-muted"><i class="o-table-content-1 mr-3 text-gray"></i><span>Tables</span></a></li>
              
                <li class="sidebar-list-item"><a href="forms.html" 
                class="sidebar-link text-muted"><i class="o-survey-1 mr-3 text-gray"></i><span>Forms</span></a></li>
              
                <li class="sidebar-list-item"><a href="#" data-toggle="collapse" 
                data-target="#pages" aria-expanded="false" aria-controls="pages" class="sidebar-link text-muted">
              <i class="o-wireframe-1 mr-3 text-gray"></i><span>CMS Pages</span></a>
            
              <div id="pages" class="collapse">
              <ul class="sidebar-menu list-unstyled border-left border-primary border-thick">
                <li class="sidebar-list-item nav-item ">
                  <a href="{{route('cms.services')}}" class="sidebar-link text-muted pl-lg-5">Service Section</a></li>
                  <li class="sidebar-list-item nav-item ">
                    <a href="{{route('cms.sub_services')}}" class="sidebar-link text-muted pl-lg-5">Sub Service</a></li>
                  <li class="sidebar-list-item nav-item ">
                    <a href="{{route('cms.members')}}" class="sidebar-link text-muted pl-lg-5">Team Members</a></li>
                    <li class="sidebar-list-item nav-item ">
                      <a href="{{route('cms.testimonies')}}" class="sidebar-link text-muted pl-lg-5">Testimonies</a></li>
              </ul>
            </div>


            <li class="sidebar-list-item"><a href="#" data-toggle="collapse" 
              data-target="#blogSection" aria-expanded="false" aria-controls="pages" class="sidebar-link text-muted">
            <i class="o-wireframe-1 mr-3 text-gray"></i><span>Blog Section</span></a>
          
            <div id="blogSection" class="collapse">
            <ul class="sidebar-menu list-unstyled border-left border-primary border-thick">
              <li class="sidebar-list-item nav-item">
                <a href="{{route('cms.categories')}}" class="sidebar-link text-muted pl-lg-5">Categories</a></li>
                <a href="{{route('cms.blogs')}}" class="sidebar-link text-muted pl-lg-5">Blogs</a></li>
            </ul>
          </div>
          </li>
        </ul>
        <div class="text-gray-400 text-uppercase px-3 px-lg-4 py-4 font-weight-bold small headings-font-family">EXTRAS</div>
        <ul class="sidebar-menu list-unstyled">
              <li class="sidebar-list-item"><a href="#" class="sidebar-link text-muted"><i class="o-database-1 mr-3 text-gray"></i><span>Demo</span></a></li>
        </ul>
      </div>
      @endif
      <div class="page-holder w-100 d-flex flex-wrap">
          @yield('content')



        @if(Auth::check())
          <footer class="footer bg-white shadow align-self-end py-3 px-xl-5 w-100">
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-6 text-center text-md-left text-primary">
                  <p class="mb-2 mb-md-0">TechRepublic &copy; <?php echo(date('Y'));?></p>
                </div>
                <div class="col-md-6 text-center text-md-right text-gray-400">
                   {{-- <a href="https://bootstrapious.com/admin-templates" class="external text-gray-400"></a> --}}
                  <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
                </div>
              </div>
            </div>
          </footer>
        @endif
      </div>
    </div>

    <!-- JavaScript files-->
    <script src="{{asset('admin/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('admin/vendor/popper.js/umd/popper.min.js')}}"> </script>
    <script src="{{asset('admin/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('admin/vendor/jquery.cookie/jquery.cookie.js')}}"> </script>
    <script src="{{asset('admin/vendor/chart.js/Chart.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/js-cookie@2/src/js.cookie.min.js"></script>
    <script src="{{asset('admin/js/charts-home.js')}}"></script>
    <script src="{{asset('admin/js/front.js')}}"></script>


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
  
  @include('includes.message')





  </body>
</html>

