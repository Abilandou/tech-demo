<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Enquiry;
use App\Contact;

use Exception;
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

    

}
