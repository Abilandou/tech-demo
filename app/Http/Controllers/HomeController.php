<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;
use App\Member;
use App\Blog;
use App\Category;
use App\SubService;
use App\Testimonial;
use Illuminate\Support\Facades\Validator;
use App\Item;
use App\Enquiry;
use App\ItemCategory;
use App\Contact;
use App\Traits\MessageServiceTrait;

class HomeController extends Controller
{
    use MessageServiceTrait;
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
         $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'message' => 'required',
            'subject' => 'required'
        ]);
        
        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $contact = new Contact();
        $contact->name  = $request->name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->subject = $request->subject;
        $contact->message = $request->message;

        $contact->save();

        $messageData = [
            'email'=>$request->email, 
            'name'=>$request->name, 
            'subject' => $request->subject,
            'phone'  => $request->phone,
            'message' => $contact->message
        ];
        $view_path = 'site.mails.contact_us';
        try{
            $to_email = 'testdeve123t@gmail.com';
            $this->sendEmail($messageData, $to_email, $view_path);
            session()->flash('success', 'Thanks for contacting us we will get back to you shortly');
            return redirect()->back();
            //Try to send email
        }catch(\Exception $ex){
            session()->flash('info', 'Thanks for contacting us we will get back to you shortly');
            return redirect()->back();
        }
    }


    

    public function shopItems()
    {
        $items = Item::paginate(15);
        return view('home.shop')->with(compact('items'));
    }
    
    public function showItem($url){
        $item = Item::where('url', $url)->first();
        if($item){
            return view('home.show_item')->with(compact('item'));
        }else{
            abort(404);
        }
    }

    public function makeEnquiry(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required|min:3',
            'email' => 'required|email',
            'phone' => 'required',
            'enquiry' => 'required|min:10'
        ]);
        
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $enq = new Enquiry();
        $enq->name = $request->name;
        $enq->email = $request->email;
        $enq->phone = $request->phone;
        $enq->enquiry = $request->enquiry;
        $enq->item = $request->item;
        $enq->save();
        if($enq){
            session()->flash('info', 'Enquiry Placed successfully');
            return redirect()->back();
        }else{
            session()->flash('error', 'Unable to Place enquiry');
            return redirect()->back();
        }
    }

    public function itemByCategory(Request $request, $category){
        $item = ItemCategory::where('name', $category)->first();
        if ($item) {
            $cat_id = $item->id;
            $items = Item::where('item_category_id', $cat_id)->paginate(15);
            return view('home.item_by_category')->with(compact('items', 'category'));
        }else{
            abort(404);
        }
    }

}