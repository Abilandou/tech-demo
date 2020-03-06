<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use App\Enquiry;
use App\Contact;
use Image;
use App\User;

use Exception;
use Illuminate\Foundation\Console\Presets\React;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{
    //

    public function sendEmail($messageData = [], $to_email, $view_path)
    {
        Mail::send($view_path, $messageData, function ($message) use ($to_email) {
            $message->to($to_email)->subject("Enquiry Email From TechRepublic Official Site");
        });
    }

    public function dashboard()
    {
        return view('auth.admin.dashboard');
    }

    public function enquiryMessage(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:3',
            'email' => 'required|email',
            'telephone' => 'required|numeric',
            'message' => 'required|min:5'
        ]);

        $enquiry = new Enquiry();
        $enquiry->name = $request->name;
        $enquiry->email = $request->email;
        $enquiry->item_id = $request->item_id;
        $enquiry->telephone = $request->telephone;
        $enquiry->message = $request->message;
        $enquiry->save();
        if($enquiry){

            $messageData = [
                'user_email' => $request->email,
                'user_name'  => $request->name,
                'telephone'  => $request->telephone,
                'user_message'  => $request->message,
                'item_name' => $request->item_name
            ];
            $view_path = 'emails.enquiry_email';
            $officialEmail = "info@techrepublic.tech";
            // $officialEmail = "godloveabilandou@gmail.com";
            //sendEmail function found in MessageServiceTrait.
            try{
                $this->sendEmail($messageData, $officialEmail, $view_path);
                return redirect()->back()->with('message_success', 'Enquiry made successfully, We will get to you soon');
            }catch(Exception $ex){
                return redirect()->back()->with('message_error', 'Unable to make enquiry, Possible internet error. Please check and make sure you are connected to the internet');
            }

        }

    }

    public function allContacts()
    {
        $contacts = Contact::all();
        return view('auth.admin.cms.contacts')->with(compact('contacts'));
    }

    public function deleteContact(Request $request){

        $contact_id = $request->contact_id;
        $contact = Contact::where(['id'=>$contact_id])->delete();
        if($contact){
            
            session()->flash('success', "Contact Deleted Successfully");
            return redirect()->back();
        }else{
            session()->flash('error', 'Unable to delete Contact. possible internet error');
            return redirect()->back();
        }

    }

    public function showSettingForm()
    {
        return view('auth.admin.setting');
    }

    public function updatePassword(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'current_password' => 'required|min:8',
            'new_password' => 'required|min:8|confirmed'
        ]);

        $admin_id = $request->admin_id;
        $current_password = $request->current_password;
        $admin = User::where(['id'=>$admin_id])->first();

        if($admin){
            $password = $admin->password;

            if (Hash::check($current_password, $password)) {

                $new_password = Hash::make($request->new_password);
                User::where(['id'=>$admin_id])->update([
                    'password' => $new_password
                ]);
                session()->flash('success', ' Password Updated Successfully');
                return redirect()->route('admin.dashboard');
            }else{
                session()->flash('error', 'Passwords do not match');
                return redirect()->back();
            }
        }else{
            session()->flash('error', 'Password Not found');
            return redirect()->back();
        }

    } 

    public function showProfileForm()
    {
        $admins = User::all();
        return view('auth.admin.profile')->with(compact('admins'));
    }

    public function addAdmin(Request $request){
        
        $this->validate($request, [
            'name'     => 'required|min:3',
            'email'    => 'required|unique:users|email',
            'password' => 'required|min:8|confirmed',
        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        if($user){
            session()->flash('success', 'Administrator Added successfully');
            return redirect()->back();
        }else{
            session()->flash('error', 'Unable to Add Administrator, please check and make sure you are connected to internet');
        }

    }

    public function updateProfile(Request $request)
    {
        $this->validate($request, [
            'name'     => 'required|min:3',
            'email'    => 'required|email',
        ]);
        $admin_id = $request->admin_id;

         //Handle file upload for the avatar
        if($request->hasFile('avatar')){
            // filename with extension
            $fileNameWithExt = $request->file('avatar')->getClientOriginalName();
            // filename
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            // extension
            $extension = $request->file('avatar')->getClientOriginalExtension();
            // filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;

            $path = $request->file('avatar')->move('avatars/admins/', $fileNameToStore);

            $path_name = $path->getPathname();
       }
       // Incase no image was not selected when trying to update profile information, maintain the previous image.
       if(empty($path_name)){
           $the_path = User::where(['id'=>$admin_id])->first();
           $get_path = $the_path->avatar;
           $path_name = $get_path;
       }
       $admin = User::where(['id'=>$admin_id])->update([
           'name' => $request->name,
           'email' => $request->email,
           'avatar' => $path_name
       ]);
       if($admin){
           session()->flash('success', 'Admin Updated successfully');
           return redirect()->back();
       }else{
           session()->flash('error', 'Unable to update Admin, Possible internet error');
           return redirect()->back();
       }
    }

    public function deleteAdmin(Request $request)
    {
        $admin_id = $request->admin_id;
        $admin = User::where(['id'=>$admin_id])->delete();
        if($admin){
            
            session()->flash('success', "Admin Deleted Successfully");
            return redirect()->back();
        }else{
            session()->flash('error', 'Unable to delete Admin. possible internet error');
            return redirect()->back();
        }
    }


}
