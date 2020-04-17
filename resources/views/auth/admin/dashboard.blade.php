@extends('layouts.adminLayout')
@section('content')


<div class="container-fluid px-xl-5">
    <section class="py-5 ">
      <div class="row mt-4">
        <div class="col-xl-3 col-lg-6 mb-4 mb-xl-0">
          <a href="{{route('cms.services')}}">
            <div class="bg-white shadow roundy p-4 h-100 d-flex align-items-center justify-content-between">
              <div class="flex-grow-1 d-flex align-items-center">
                <div class="dot mr-3 bg-violet"></div>
                <div class="text">
                  <h6 class="mb-0">Services</h6><span class="badge badge-info">{{count(\App\Service::all())}}</span>
                </div>
              </div>
              <div class="icon text-white bg-violet"><i class="fas fa-server"></i></div>
            </div>
        </a>
        </div>
        <div class="col-xl-3 col-lg-6 mb-4 mb-xl-0">
          <a href="{{route('cms.blogs')}}">
            <div class="bg-white shadow roundy p-4 h-100 d-flex align-items-center justify-content-between">
              <div class="flex-grow-1 d-flex align-items-center">
                <div class="dot mr-3 bg-violet"></div>
                <div class="text">
                  <h6 class="mb-0">Blogs</h6><span class="badge badge-success">{{count(\App\Blog::all())}}</span>
                </div>
              </div>
              <div class="icon text-white bg-violet"><i class="fas fa-server"></i></div>
            </div>
          </a>
        </div>
        <div class="col-xl-3 col-lg-6 mb-4 mb-xl-0">
          <a href="{{route('cms.sub_services')}}">
            <div class="bg-white shadow roundy p-4 h-100 d-flex align-items-center justify-content-between">
              <div class="flex-grow-1 d-flex align-items-center">
                <div class="dot mr-3 bg-violet"></div>
                <div class="text">
                  <h6 class="mb-0">Sub Services</h6><span class="badge badge-primary">{{count(\App\SubService::all())}}</span>
                </div>
              </div>
              <div class="icon text-white bg-violet"><i class="fas fa-server"></i></div>
            </div>
          </a>
        </div>
        <div class="col-xl-3 col-lg-6 mb-4 mb-xl-0">
          <a href="{{route('cms.members')}}">
            <div class="bg-white shadow roundy p-4 h-100 d-flex align-items-center justify-content-between">
              <div class="flex-grow-1 d-flex align-items-center">
                <div class="dot mr-3 bg-violet"></div>
                <div class="text">
                  <h6 class="mb-0">Members</h6><span class="badge badge-secondary">{{count(\App\Member::all())}}</span>
                </div>
              </div>
              <div class="icon text-white bg-violet"><i class="fas fa-server"></i></div>
            </div>
          </a>
        </div>
        <div class="col-xl-3 col-lg-6 mb-4 mb-xl-0">
          <a href="{{route('shop.items')}}">
            <div class="bg-white shadow roundy p-4 h-100 d-flex align-items-center justify-content-between">
              <div class="flex-grow-1 d-flex align-items-center">
                <div class="dot mr-3 bg-violet"></div>
                <div class="text">
                  <h6 class="mb-0">Shop Items</h6><span class="badge badge-warning">{{count(\App\Item::all())}}</span>
                </div>
              </div>
              <div class="icon text-white bg-violet"><i class="fas fa-server"></i></div>
            </div>
          </a>
        </div>
        <div class="col-xl-3 col-lg-6 mb-4 mb-xl-0">
          <a href="{{route('cms.testimonies')}}">
            <div class="bg-white shadow roundy p-4 h-100 d-flex align-items-center justify-content-between">
              <div class="flex-grow-1 d-flex align-items-center">
                <div class="dot mr-3 bg-violet"></div>
                <div class="text">
                  <h6 class="mb-0">Testimonies</h6><span class="badge badge-danger">{{count(\App\Testimonial::all())}}</span>
                </div>
              </div>
              <div class="icon text-white bg-violet"><i class="fas fa-server"></i></div>
            </div>
          </a>
        </div>

        <div class="col-xl-3 col-lg-6 mb-4 mb-xl-0">
          <a href="{{route('cms.contacts')}}">
            <div class="bg-white shadow roundy p-4 h-100 d-flex align-items-center justify-content-between">
              <div class="flex-grow-1 d-flex align-items-center">
                <div class="dot mr-3 bg-violet"></div>
                <div class="text">
                  <h6 class="mb-0">Contacts</h6><span class="badge badge-info">{{count(\App\Contact::all())}}</span>
                </div>
              </div>
              <div class="icon text-white bg-violet"><i class="fas fa-server"></i></div>
            </div>
          </a>
        </div>

        <div class="col-xl-3 col-lg-6 mb-4 mb-xl-0">
          <a href="{{route('shop.enquiries')}}">
            <div class="bg-white shadow roundy p-4 h-100 d-flex align-items-center justify-content-between">
              <div class="flex-grow-1 d-flex align-items-center">
                <div class="dot mr-3 bg-violet"></div>
                <div class="text">
                  <h6 class="mb-0">Enquiry Messages</h6><span class="badge badge-success">{{count(\App\Enquiry::all())}}</span>
                </div>
              </div>
              <div class="icon text-white bg-violet"><i class="fas fa-server"></i></div>
            </div>
          </a>
        </div>
        <div class="col-xl-3 col-lg-6 mb-4 mb-xl-0">
          <a href="{{route('cms.categories')}}">
            <div class="bg-white shadow roundy p-4 h-100 d-flex align-items-center justify-content-between">
              <div class="flex-grow-1 d-flex align-items-center">
                <div class="dot mr-3 bg-violet"></div>
                <div class="text">
                  <h6 class="mb-0">Blog Categories</h6><span class="badge badge-warning">{{count(\App\Category::all())}}</span>
                </div>
              </div>
              <div class="icon text-white bg-violet"><i class="fas fa-server"></i></div>
            </div>
          </a>
        </div>
        <div class="col-xl-3 col-lg-6 mb-4 mb-xl-0">
          <a href="{{route('items.categories')}}">
            <div class="bg-white shadow roundy p-4 h-100 d-flex align-items-center justify-content-between">
              <div class="flex-grow-1 d-flex align-items-center">
                <div class="dot mr-3 bg-violet"></div>
                <div class="text">
                  <h6 class="mb-0">Shop Item Categories</h6><span class="badge badge-info">{{count(\App\ItemCategory::all())}}</span>
                </div>
              </div>
              <div class="icon text-white bg-violet"><i class="fas fa-server"></i></div>
            </div>
          </a>
        </div>
      </div>
    </section>
    
  </div>


@endsection