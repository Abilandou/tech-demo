<div class="header-container">
    <ul class="nav-left">
        <li>
            <a class="side-nav-toggle" href="javascript:void(0);">
            <i class="ti-view-grid"></i>
            </a>
        </li>
        <li class="search-box">
            <a class="search-toggle no-pdd-right" href="javascript:void(0);">
                <i class="search-icon ti-search pdd-right-10"></i>
                <i class="search-icon-close ti-close pdd-right-10"></i>
            </a>
        </li>
        </li>
    </ul>
    <ul class="nav-right">
        <li class="user-profile dropdown">
            <a href="" class="dropdown-toggle" data-toggle="dropdown">
                  <img class="profile-img img-fluid" src="{{asset('public/admin/assets/images/user.jpg')}}" alt="">
                  <div class="user-info">
                      <span class="name pdd-right-5">{{Auth::guard("admin")->user()->name}}</span>
                      <i class="ti-angle-down font-size-10"></i>
                  </div>
            </a>
            <ul class="dropdown-menu">
                  <li>
                      <a href="{{ route('admin.setting') }}">
                          <i class="ti-settings pdd-right-10"></i>
                          <span>Setting</span>
                      </a>
                  </li>
                  <li>
                      <a href="{{ route('admin.profile') }}">
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
        <li class="notifications dropdown">
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
        </li>
        <li>
            <a class="side-panel-toggle" href="javascript:void(0);">
                <i class="ti-align-right"></i>
            </a>
        </li>
    </ul>
</div>