<div class="side-nav-inner">
    <div class="side-nav-logo">
        <a href="{{route('admin.dashboard')}}">
                <div><img src="{{ asset('public/assets/images/techfavicon.jpg')}}" width="50px"
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
                    <a href="{{route('item.enquiry')}}">Enquiries</a>
                </li>
            </ul>
        </li>
        <li class="nav-item dropdown">
            <a class="dropdown-toggle" href="javascript:void(0);">
                <span class="icon-holder">
                  <i class="ti-package"></i>
                </span>
                <span class="title">Web Plans</span>
                <span class="arrow">
                  <i class="ti-angle-right"></i>
                </span>
            </a>
            <ul class="dropdown-menu">
                <li>
                    <a href="{{route('plans.index')}}">Plans</a>
                </li>
                <li>
                    <a href="{{route('plan.enquiries')}}">Enquiries</a>
                </li>
            </ul>
        </li>
    </ul>
</div>