@extends('layouts.adminLayout')
@section('content')

<div class="main-content">
  <div class="container-fluid px-xl-5">
    <div class="mb-4">
      <h3>CMS Page Section</h3>
      <section class="py-5">
        <div class="row">
          <div class="col-xl-3 col-lg-6 mb-4 mb-xl-0">
            <a href="{{ route('cms.services') }}">
              <div class="bg-white shadow roundy p-4 h-100 d-flex align-items-center justify-content-between">
                <div class="flex-grow-1 d-flex align-items-center">
                  <div class="dot mr-3 bg-violet"></div>
                  <div class="text">
                    <h6 class="mb-0">Services</h6><span class="text-gray">
                      {{ count(\App\Service::all()) }}
                    </span>
                  </div>
                </div>
                <div class="icon text-white bg-violet"><i class="fas fa-server"></i></div>
              </div>
            </a>
          </div>
          <div class="col-xl-3 col-lg-6 mb-4 mb-xl-0">
            <a href="{{ route('cms.sub_services') }}">
              <div class="bg-white shadow roundy p-4 h-100 d-flex align-items-center justify-content-between">
                <div class="flex-grow-1 d-flex align-items-center">
                  <div class="dot mr-3 bg-green"></div>
                  <div class="text">
                    <h6 class="mb-0">Sub Services</h6><span class="text-gray">
                      {{ count(\App\SubService::all()) }}
                    </span>
                  </div>
                </div>
                <div class="icon text-white bg-green"><i class="far fa-clipboard"></i></div>
              </div>
            </a>
          </div>
          <div class="col-xl-3 col-lg-6 mb-4 mb-xl-0">
            <a href="{{ route('cms.members') }}">
              <div class="bg-white shadow roundy p-4 h-100 d-flex align-items-center justify-content-between">
                <div class="flex-grow-1 d-flex align-items-center">
                  <div class="dot mr-3 bg-blue"></div>
                  <div class="text">
                    <h6 class="mb-0">Team Members</h6><span class="text-gray">
                      {{ count(\App\Member::all()) }}
                    </span>
                  </div>
                </div>
                <div class="icon text-white bg-blue"><i class="fa fa-dolly-flatbed"></i></div>
              </div>
            </a>
          </div>
          <div class="col-xl-3 col-lg-6 mb-4 mb-xl-0">
            <a href="{{ route('cms.testimonies') }}">
              <div class="bg-white shadow roundy p-4 h-100 d-flex align-items-center justify-content-between">
                <div class="flex-grow-1 d-flex align-items-center">
                  <div class="dot mr-3 bg-red"></div>
                  <div class="text">
                    <h6 class="mb-0">Testimonials</h6><span class="text-gray">
                      {{ count(\App\Testimonial::all()) }}
                    </span>
                  </div>
                </div>
                <div class="icon text-white bg-red"><i class="fas fa-receipt"></i></div>
              </div>
            </a>
          </div>
        </div>
      </section>
    </div>

    <div class="mb-4">
      <h3>Blog Section</h3>
      <section class="py-5">
        <div class="row">
          <div class="col-xl-3 col-lg-6 mb-4 mb-xl-0">
            <a href="{{ route('cms.categories') }}">
              <div class="bg-white shadow roundy p-4 h-100 d-flex align-items-center justify-content-between">
                <div class="flex-grow-1 d-flex align-items-center">
                  <div class="dot mr-3 bg-violet"></div>
                  <div class="text">
                    <h6 class="mb-0">Blog Categories</h6><span class="text-gray">
                      {{ count(\App\Category::all()) }}
                    </span>
                  </div>
                </div>
                <div class="icon text-white bg-violet"><i class="fas fa-server"></i></div>
              </div>
            </a>
          </div>
          <div class="col-xl-3 col-lg-6 mb-4 mb-xl-0">
            <a href="{{ route('cms.blogs') }}">
              <div class="bg-white shadow roundy p-4 h-100 d-flex align-items-center justify-content-between">
                <div class="flex-grow-1 d-flex align-items-center">
                  <div class="dot mr-3 bg-green"></div>
                  <div class="text">
                    <h6 class="mb-0">Blogs</h6><span class="text-gray">
                      {{ count(\App\Blog::all()) }}
                    </span>
                  </div>
                </div>
                <div class="icon text-white bg-green"><i class="far fa-clipboard"></i></div>
              </div>
            </a>
          </div>
        </div>
      </section>
    </div>

    <div class="mb-4">
      <h3>Shop Section</h3>
      <section class="py-5">
        <div class="row">
          <div class="col-xl-3 col-lg-6 mb-4 mb-xl-0">
            <a href="{{ route('items.categories') }}">
              <div class="bg-white shadow roundy p-4 h-100 d-flex align-items-center justify-content-between">
                <div class="flex-grow-1 d-flex align-items-center">
                  <div class="dot mr-3 bg-violet"></div>
                  <div class="text">
                    <h6 class="mb-0">Item Categories</h6><span class="text-gray">
                      {{ count(\App\ItemCategory::all()) }}
                    </span>
                  </div>
                </div>
                <div class="icon text-white bg-violet"><i class="fas fa-server"></i></div>
              </div>
            </a>
          </div>
          <div class="col-xl-3 col-lg-6 mb-4 mb-xl-0">
            <a href="{{ route('shop.items') }}">
              <div class="bg-white shadow roundy p-4 h-100 d-flex align-items-center justify-content-between">
                <div class="flex-grow-1 d-flex align-items-center">
                  <div class="dot mr-3 bg-green"></div>
                  <div class="text">
                    <h6 class="mb-0">Items</h6><span class="text-gray">
                      {{ count(\App\Item::all()) }}
                    </span>
                  </div>
                </div>
                <div class="icon text-white bg-green"><i class="far fa-clipboard"></i></div>
              </div>
            </a>
          </div>
          <div class="col-xl-3 col-lg-6 mb-4 mb-xl-0">
            <a href="{{ route('item.enquiry') }}">
              <div class="bg-white shadow roundy p-4 h-100 d-flex align-items-center justify-content-between">
                <div class="flex-grow-1 d-flex align-items-center">
                  <div class="dot mr-3 bg-blue"></div>
                  <div class="text">
                    <h6 class="mb-0">Item Enquiries</h6><span class="text-gray">
                      {{ count(\App\Enquiry::where('type', 'item')->get()) }}
                    </span>
                  </div>
                </div>
                <div class="icon text-white bg-blue"><i class="fa fa-dolly-flatbed"></i></div>
              </div>
            </a>
          </div>
        </div>
      </section>
    </div>

    <div class="mb-4">
      <h3>Web Plans Section</h3>
      <section class="py-5">
        <div class="row">
          <div class="col-xl-3 col-lg-6 mb-4 mb-xl-0">
            <a href="{{ route('plans.index') }}">
              <div class="bg-white shadow roundy p-4 h-100 d-flex align-items-center justify-content-between">
                <div class="flex-grow-1 d-flex align-items-center">
                  <div class="dot mr-3 bg-violet"></div>
                  <div class="text">
                    <h6 class="mb-0">Plans</h6><span class="text-gray">
                      {{ count(\App\Plan::all()) }}
                    </span>
                  </div>
                </div>
                <div class="icon text-white bg-violet"><i class="fas fa-server"></i></div>
              </div>
            </a>
          </div>
          <div class="col-xl-3 col-lg-6 mb-4 mb-xl-0">
            <a href="{{ route('plan.enquiries') }}">
              <div class="bg-white shadow roundy p-4 h-100 d-flex align-items-center justify-content-between">
                <div class="flex-grow-1 d-flex align-items-center">
                  <div class="dot mr-3 bg-green"></div>
                  <div class="text">
                    <h6 class="mb-0">Plan Enquiries</h6><span class="text-gray">
                      {{ count(\App\Enquiry::where('type', 'plan')->get()) }}
                    </span>
                  </div>
                </div>
                <div class="icon text-white bg-green"><i class="far fa-clipboard"></i></div>
              </div>
            </a>
          </div>
        </div>
      </section>
    </div>
    
  </div>
</div>


@endsection