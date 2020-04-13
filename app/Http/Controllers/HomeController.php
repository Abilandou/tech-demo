<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;
use App\Member;
use App\Blog;
use App\Category;
use App\ItemCategory;
use App\SubService;
use App\Item;
use App\Contact;
use App\Testimonial;
use Illuminate\Support\Facades\Mail;
use Exception;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function sendEmail($messageData = [], $to_email, $view_path)
    {
        Mail::send($view_path, $messageData, function ($message) use ($to_email) {
            $message->to($to_email)->subject("Contact Email From TechRepublic Official Site");
        });
    }

    public function index(){
        $page_name = "Home";
        $services = Service::paginate(3);
        $testimonies = Testimonial::all();
        return view('welcome')->with(compact('page_name', 'services', 'testimonies'));
    }

    public function home()
    {
        $page_name = "Home";
        $testimonies = Testimonial::all();
        $services = Service::paginate(3);
        return view('welcome')->with(compact('page_name', 'services', 'testimonies'));
    }

    public function about(){
        $page_name = "About";
        $members = Member::all();
        return view('home.about')->with(compact('page_name', 'members'));
    }

    public function contact(){
        $page_name = "Contact";

        return view('home.contact')->with(compact('page_name'));
    }

    public function blog(){
        $page_name = "Blog";
        $blogs = Blog::orderBy('id', 'DESC')->paginate(2);
        return view('home.blog')->with(compact('page_name', 'blogs'));
    }

    public function service(){
        $page_name = "Service";
        $services = Service::all();
        return view('home.service')->with(compact('page_name', 'services'));
    }

    public function singleService($url){

        $service = Service::where(['url'=>$url])->first();
        $service_id = $service->id;
        $page_name = $service->name;
        $services = Service::all();

        $subServices = SubService::where(['service_id'=>$service_id])->get();

        return view('home.show_service')->with(compact('service', 'services', 'page_name', 'subServices'));
    }

    public function singleBlog($url){

        $blog = Blog::where(['url'=>$url])->first();
        $page_name = $blog->title;
        $categories = Category::all();
        return view('home.show_blog')->with(compact('blog', 'categories', 'page_name'));
    }

    public function blogCategories($category_name)
    {

        $category = Category::where(['name'=>$category_name])->first();
        $category_id = $category->id;
        $categoryBlog = Blog::where(['category_id'=>$category_id])->orderBy('id', 'DESC')->paginate(12);
        $page_name = $category_name;
        return view('home.category_with_blogs')->with(compact('categoryBlog', 'page_name', 'category_name'));
    }

    public function contactUs(Request $request)
    {

        $this->validate($request, [
            'name' => 'required|min:3',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'message' => 'required|min:10',
            'subject' => 'required|min:3'
        ]);
        
        $contact = new Contact();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->message = $request->message;
        $contact->subject = $request->subject;
        $contact->save();
        if($contact){

            $messageData = [
                'user_email' => $request->email,
                'user_name'  => $request->name,
                'telephone'  => $request->phone,
                'subject'    => $request->subject,
                'user_message'  => $request->message,
            ];
            $view_path = 'emails.contact_email';
            // $officialEmail = "info@techrepublic.tech";
            $officialEmail = "godloveabilandou@gmail.com";
            //sendEmail function found in MessageServiceTrait.
            try{
                $this->sendEmail($messageData, $officialEmail, $view_path);
                return redirect()->back()->with('message_success', 'Message sent successfully, We will get to you soon');
            }catch(Exception $ex){
                return redirect()->back()->with('message_error', 'Unable to send message, Possible internet error. Please check and make sure you are connected to the internet');
            }

        }

       
        
    }


    public function itemsByCategory($item_category)
    {
        $category = ItemCategory::where(['name'=>$item_category])->first();
        $category_id = $category->id;
        $page_name = $item_category;
        $itemsByCategory = Item::where(['item_category_id'=>$category_id])->paginate(12);
        return view('home.item_by_category')->with(compact('itemsByCategory', 'page_name', 'item_category'));
    }

    public function itemDetail($url)
    {
        $item = Item::where(['url'=>$url])->first();
        
        $page_name = $item->name;
        $itemCategories = ItemCategory::all();
        
        return view('home.item_detail')->with(compact('item','page_name', 'itemCategories'));
       
    }
}


//blue color code for afrotalkblog: #1560bd
