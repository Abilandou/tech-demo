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

 //!Filter items by category
 Route::get('/items/{item_category}', 'HomeController@itemsByCategory')->name('item.name.by.category');
 Route::get('/item/{url}', 'HomeController@itemDetail')->name('item.show.detail');

//Enquiry Message
Route::post('send/enquiry', 'Auth\AdminController@enquiryMessage')->name('client.enquiry.message');


// Auth::routes();
Route::group(['prefix' => 'admin'], function () {


    Route::get('login/', 'Auth\LoginController@adminLoginForm')->name('admin.login.form');
    Route::post('login-admin/', 'Auth\LoginController@adminLogin')->name('admin.login');
    Route::get('register/', 'Auth\RegisterController@adminRegisterForm')->name('admin.register.form');
    Route::post('admin-register/', 'Auth\RegisterController@adminRegister')->name('admin.register');
    
   Route::group(['middleware' => ['auth']], function(){
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
            
            //!enquiry
            Route::get('/enquiries', 'Auth\ShopController@allEnquiries')->name('shop.enquiries');
            Route::post('/enquiry/delete', 'Auth\ShopController@deleteEnquiry')->name('shop.delete.enquiry');

            //!contact messages
            Route::get('/contacts', 'Auth\AdminController@allContacts')->name('cms.contacts');
            Route::post('/contact/delete', 'Auth\AdminController@deleteContact')->name('cms.contact.delete');

            //!Item Category
            Route::get('item-categories', 'Auth\ShopController@shopItemCategories')->name('items.categories');
            Route::post('add/item-category', 'Auth\ShopController@addItemCategory')->name('item.category.add');
            Route::post('item-category/update/{item_category_id}', 'Auth\ShopController@updateItemCategory')->name('item.category.update');
            Route::post('item-category/delete', 'Auth\ShopController@deleteItemCategory')->name('item.category.delete');


   });

});






