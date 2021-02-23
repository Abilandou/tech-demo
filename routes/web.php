<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use Illuminate\Support\Facades\Route;


Route::get('/', 'HomeController@home')->name('home.page');
Route::get('about/', 'HomeController@about')->name('about.page');
Route::get('contact/', 'HomeController@contact')->name('contact.page');
Route::get('blog/', 'HomeController@blog')->name('blog.page');
Route::get('service/', 'HomeController@service')->name('service.page');
Route::get('home/', 'HomeController@index')->name('home');

 //!Service
 Route::get('service/{url}/', 'HomeController@singleService')->name('single.service');
 Route::get('blog/{url}/', 'HomeController@singleBlog')->name('single.blog');
 Route::get('category/{category_name}/', 'HomeController@blogCategories')->name('category.with.blog');
 Route::post('contact/us/', 'HomeController@contactUs')->name('user.contact');
 Route::get('plans', 'PlanController@webPlans')->name('site.plans.index');

 //!global shop
 Route::get('shop/items', 'HomeController@shopItems')->name('home.shop.items');
 Route::get('shop/item/{url}/', 'HomeController@showItem')->name('item.show');
 Route::get('shop/category/{category}', 'HomeController@itemByCategory')->name('home.item.by.category');

 //!enquiry
 Route::post('enquiry', 'HomeController@makeEnquiry')->name('make.enquiry');

 //!View images using a link
Route::get('blog/image/{filename}', 'HomeController@blogImage')->name('blog.image');
Route::get('user/image/{filename}', 'HomeController@userImage')->name('user.image');
Route::get('item/image/{filename}', 'HomeController@itemImage')->name('item.image');
Route::get('service/image/{filename}', 'HomeController@serviceImage')->name('service.image');
Route::get('testimony/image/{filename}', 'HomeController@testimonyImage')->name('testimony.image');

//!Forget password

Route::get('password/forget', 'Account\AccountController@showVerifyEmailForm')->name('show.verify.email');
Route::post('get/reset/link', 'Account\AccountController@getPasswordResetLink')->name('get.password.reset.link');
Route::get('admin/password/reset/form/{token}', 'Account\AccountController@showPasswordResetForm')->name('confirm.reset.password');
Route::post('reset/password/', 'Account\AccountController@resetPassword')->name('reset.password');

// Auth::routes();
Route::group(['prefix' => 'admin'], function () {
    Route::get('login/', 'Auth\LoginController@adminLoginForm')->name('admin.login.form');
    Route::post('login-admin/', 'Auth\LoginController@adminLogin')->name('admin.login');
    Route::get('register/', 'Auth\RegisterController@adminRegisterForm')->name('admin.register.form');
    Route::post('admin-register/', 'Auth\RegisterController@adminRegister')->name('admin.register');

   Route::group(['middleware' => ['admin']], function(){
        Route::get('/dashboard', 'Auth\AdminController@dashboard')->name('admin.dashboard');
        Route::get('logout/', 'Auth\LoginController@adminLogout')->name('admin.logout');

        //!Services Area
        Route::get('services/', 'Auth\CmsPagesController@service')->name('cms.services');
        Route::post('delete/service/', 'Auth\CmsPagesController@deleteService')->name('admin.delete.service');
        Route::post('add/service/', 'Auth\CmsPagesController@addService')->name('service.add');
        Route::post('update/service/{service_id}/', 'Auth\CmsPagesController@updateService')->name('service.update');

         //!Sub Services Area
         Route::get('sub_services/', 'Auth\CmsPagesController@subService')->name('cms.sub_services');
         Route::post('delete/sub_service/', 'Auth\CmsPagesController@deleteSubService')->name('admin.delete.sub_service');
         Route::post('add/sub_service/', 'Auth\CmsPagesController@addSubService')->name('sub_service.add');
         Route::post('update/sub_service/{sub_service_id}/', 'Auth\CmsPagesController@updateSubService')->name('sub_service.update');

         //!Team Members
         Route::get('members/', 'Auth\CmsPagesController@members')->name('cms.members');
         Route::post('delete/member/', 'Auth\CmsPagesController@deleteMember')->name('admin.delete.member');
         Route::post('add/member/', 'Auth\CmsPagesController@addMember')->name('member.add');
         Route::post('update/member/{member_id}/', 'Auth\CmsPagesController@updateMember')->name('member.update');

          //!Blog Category
          Route::get('categories/', 'Auth\BlogController@Categories')->name('cms.categories');
          Route::post('delete/category/', 'Auth\BlogController@deleteCategory')->name('admin.delete.category');
          Route::post('add/category/', 'Auth\BlogController@addCategory')->name('category.add');
          Route::post('update/category/{category_id}/', 'Auth\BlogController@updateCategory')->name('category.update');

          //!Plans
          Route::get('plans', 'PlanController@index')->name('plans.index');
          Route::post('delete/plan', 'PlanController@destroy')->name('admin.delete.plan');
          Route::post('update/plan/{plan_id}/', 'PlanController@update')->name('plan.update');
          Route::post('add/plan/', 'PlanController@addPlan')->name('plan.add');

          Route::get('plan/enquiries', 'PlanController@enquiries')->name('plan.enquiries');
          Route::post('delete/plan/enquiry', 'PlanController@deleteEnquiry')->name('delete.plan.enquiry');


           //!Blogs
           Route::get('blogs/', 'Auth\BlogController@Blogs')->name('cms.blogs');
           Route::post('delete/blog/', 'Auth\BlogController@deleteBlog')->name('admin.delete.blog');
           Route::post('add/blog/', 'Auth\BlogController@addBlog')->name('blog.add');
           Route::post('update/blog/{blog_id}/', 'Auth\BlogController@updateBlog')->name('blog.update');

            //!Testimonials
            Route::get('testimonies/', 'Auth\CmsPagesController@Testimonials')->name('cms.testimonies');
            Route::post('delete/testimony/', 'Auth\CmsPagesController@deleteTestimony')->name('admin.delete.testimony');
            Route::post('add/testimony/', 'Auth\CmsPagesController@addTestimony')->name('testimony.add');
            Route::post('update/testimony/{testimony_id}/', 'Auth\CmsPagesController@updateTestimony')->name('testimony.update');

            //!Shop Section
            Route::get('/items', 'Auth\ShopController@allShopItems')->name('shop.items');
            Route::post('/add/item', 'Auth\ShopController@addShopItem')->name('shop.add.item');
            Route::post('item/update/{shop_item_id}', 'Auth\ShopController@updateShopItem')->name('shop.update.item');
            Route::post('/item/delete', 'Auth\ShopController@deleteShopItem')->name('shop.delete.item');
            Route::post('/add/item-attribute/{item_id}', 'Auth\ShopController@addItemAttribute')->name('shop.item.add.attribute');

            //!Item Category
            Route::get('item-categories', 'Auth\ShopController@shopItemCategories')->name('items.categories');
            Route::post('add/item-category', 'Auth\ShopController@addItemCategory')->name('item.category.add');
            Route::post('item-category/update/{item_category_id}', 'Auth\ShopController@updateItemCategory')->name('item.category.update');
            Route::post('item-category/delete', 'Auth\ShopController@deleteItemCategory')->name('item.category.delete');

            //!Enquiries
            Route::get('/enquiries', 'Auth\ShopController@enquiries')->name('item.enquiry');
            Route::post('delete/enq', 'Auth\ShopController@deleteEnquiry')->name('enquiry.delete');

        //!Account & Settings
        Route::get('setting', 'Account\AccountController@setting')->name('admin.setting');
        Route::post('update/password', 'Account\AccountController@changePassword')->name('admin.update.password');
        Route::get('profile', 'Account\AccountController@profile')->name('admin.profile');
        Route::post('update/profile', 'Account\AccountController@updateProfile')->name('admin.update.profile');

   });

});