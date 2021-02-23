<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Service;
use App\SubService;
use App\Member;
use App\Testimonial;

class CmsPagesController extends Controller
{
    //

    public function service()
    {

        $services = Service::all();
        return view('auth.admin.cms.services')->with(compact('services'));
    }

    public function deleteService(Request $request){

        $service_id = $request->service_id;
        $service = Service::where(['id'=>$service_id])->delete();
        if($service){
            
            session()->flash('success', "Service Deleted Successfully");
            return redirect()->back();
        }else{
            session()->flash('error', 'Unable to delete service. possible internet error');
            return redirect()->back();
        }

    }


    public function addService(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:3|unique:services',
        ]);

        $service = new Service();
        $service->name = $request->name;
        $service->description = $request->description;
        $service->url = strtolower(str_replace(' ', '-', $request->name));
        if($request->hasFile('avatar'))
        {
            // $path = $request->file('profile')->move(storage_path('profiles/users'));
            // $file_name = basename($path);
            $fileNameWithExt = $request->file('avatar')->getClientOriginalName();
            // filename
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            // extension
            $extension = $request->file('avatar')->getClientOriginalExtension();
            // filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('avatar')->store('public/service');
            $file_name = basename($path);
        }
        $service->avatar = $file_name;
        $service->save();
        if($service){
            session()->flash('success', 'Service Added successfully');
            return redirect()->back();
        }else{
            session()->flash('error', 'Unable to add service, possible internet error');
            return redirect()->back();
        }
    }

    public function updateService(Request $request, $service_id)
    {
        $this->validate($request, [
            'name' => 'required|min:3',
        ]);

        if($request->hasFile('avatar'))
        {
            $fileNameWithExt = $request->file('avatar')->getClientOriginalName();
            // filename
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            // extension
            $extension = $request->file('avatar')->getClientOriginalExtension();
            // filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('avatar')->store('public/service');
            $file_name = basename($path);
        }
        
        if(empty($file_name)){
            $the_file = Service::where(['id'=>$service_id])->first();
            $file_name = $the_file->photo;
        }
        
        try {
            Service::where(['id'=>$service_id])->update([
                'name' => $request->name,
                'description' => $request->description,
                'url'  => strtolower(str_replace(' ', '-', $request->name)),
                'avatar' => $file_name
            ]);
            session()->flash('success', 'Service Updated successfully');
           return redirect()->back();
        }catch(\Exception $ex){
            session()->flash('error', 'Unable to update Service, Possible internet error');
            return redirect()->back();
        }

    }


    public function subService()
    {

        $sub_services = SubService::all();
        $services = Service::all(); 
        return view('auth.admin.cms.sub_services')->with(compact('sub_services', 'services'));
    }

    public function deleteSubService(Request $request)
    {

        $sub_service_id = $request->sub_service_id;
        $sub_service = Service::where(['id'=>$sub_service_id])->delete();
        if($sub_service){
            
            session()->flash('success', "Service Deleted Successfully");
            return redirect()->back();
        }else{
            session()->flash('error', 'Unable to delete service. possible internet error');
            return redirect()->back();
        }

    }


    public function addSubService(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:3|unique:sub_services',
            'service_id' => 'required'
        ]);

        $sub_service = new SubService();
        $sub_service->name = $request->name;
        $sub_service->service_id = $request->service_id;
        $sub_service->description = $request->description;
        $sub_service->url = strtolower(str_replace(' ', '-', $request->name));
        if($request->hasFile('avatar'))
        {
            // $path = $request->file('profile')->move(storage_path('profiles/users'));
            // $file_name = basename($path);
            $fileNameWithExt = $request->file('avatar')->getClientOriginalName();
            // filename
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            // extension
            $extension = $request->file('avatar')->getClientOriginalExtension();
            // filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('avatar')->store('public/service');
            $file_name = basename($path);
        }
        $sub_service->avatar = $file_name;
        $sub_service->save();
        if($sub_service){
            session()->flash('success', 'Service Added successfully');
            return redirect()->back();
        }else{
            session()->flash('error', 'Unable to add service, possible internet error');
            return redirect()->back();
        }
    }

    public function updateSubService(Request $request, $sub_service_id)
    {
        $this->validate($request, [
            'name' => 'required|min:3',
            'service_id' => 'required'
        ]);


        if($request->hasFile('avatar'))
        {
            $fileNameWithExt = $request->file('avatar')->getClientOriginalName();
            // filename
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            // extension
            $extension = $request->file('avatar')->getClientOriginalExtension();
            // filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('avatar')->store('public/service');
            $file_name = basename($path);
        }
        
        if(empty($file_name)){
            $the_file = SubService::where(['id'=>$sub_service_id])->first();
            $file_name = $the_file->photo;
        }
        
        try {
            SubService::where(['id'=>$sub_service_id])->update([
                'name' => $request->name,
                'description' => $request->description,
                'service_id' => $request->service_id,
                'url'  => strtolower(str_replace(' ', '-', $request->name)),
                'avatar' => $file_name
            ]);
            session()->flash('success', 'Service Updated successfully');
           return redirect()->back();
        }catch(\Exception $ex){
            session()->flash('error', 'Unable to update Service, Possible internet error');
            return redirect()->back();
        }

    }


    public function testimonials()
    {

        $testimonies = Testimonial::all();
        return view('auth.admin.cms.testimonies')->with(compact('testimonies'));
    }

    public function deleteTestimony(Request $request){

        $testimony_id = $request->testimony_id;
        $testimony = Testimonial::where(['id'=>$testimony_id])->delete();
        if($testimony){
            
            session()->flash('success', "testimony Deleted Successfully");
            return redirect()->back();
        }else{
            session()->flash('error', 'Unable to delete testimony. possible internet error');
            return redirect()->back();
        }

    }


    public function addTestimony(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:3|unique:testimonials',
            'profession' => 'required|min:3|',
            'testimony' => 'required'
        ]);

        $testimony = new Testimonial();
        $testimony->name = $request->name;
        $testimony->profession = $request->profession;
        $testimony->testimony = $request->testimony;
        $file_name = "default.jpg";
        if($request->hasFile('avatar'))
        {
            // $path = $request->file('profile')->move(storage_path('profiles/users'));
            // $file_name = basename($path);
            $fileNameWithExt = $request->file('avatar')->getClientOriginalName();
            // filename
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            // extension
            $extension = $request->file('avatar')->getClientOriginalExtension();
            // filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('avatar')->store('public/testimony');
            $file_name = basename($path);
        }
        $testimony->avatar = $file_name;
        $testimony->save();
        if($testimony){
            session()->flash('success', 'testimony Added successfully');
            return redirect()->back();
        }else{
            session()->flash('error', 'Unable to add testimony, possible internet error');
            return redirect()->back();
        }
    }


    public function updateTestimony(Request $request, $testimony_id)
    {
        
        $this->validate($request, [
            'name' => 'required|min:3',
            'profession' => 'required|min:3|',
            'testimony' => 'required'
        ]);

        if($request->hasFile('avatar'))
        {
            $fileNameWithExt = $request->file('avatar')->getClientOriginalName();
            // filename
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            // extension
            $extension = $request->file('avatar')->getClientOriginalExtension();
            // filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('avatar')->store('public/testimony');
            $file_name = basename($path);
        }

        if(empty($file_name)){
            $the_file = Testimonial::where(['id'=>$testimony_id])->first();
            $file_name = $the_file->photo;
        }

        try {
            Testimonial::where(['id'=>$testimony_id])->update([
                'name' => $request->name,
                'profession' => $request->profession,
                'testimony' => $request->testimony,
                'avatar' => $file_name
            ]);
            session()->flash('success', 'Testimony Updated successfully');
           return redirect()->back();
        }catch(\Exception $ex){
            session()->flash('error', 'Unable to update Testimony, Possible internet error');
            return redirect()->back();
        }
    }


    public function members()
    {

        $members = Member::all();
        return view('auth.admin.cms.members')->with(compact('members'));
    }

    public function deleteMember(Request $request){

        $member_id = $request->member_id;
        $member = Member::where(['id'=>$member_id])->delete();
        if($member){
            
            session()->flash('success', "member Deleted Successfully");
            return redirect()->back();
        }else{
            session()->flash('error', 'Unable to delete member. possible internet error');
            return redirect()->back();
        }

    }


    public function addMember(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:3|unique:members',
            'position' => 'required|min:3|',
        ]);

        $member = new Member();
        $member->name = $request->name;
        $member->position = $request->position;
        $member->description = $request->description;
        $member->url = strtolower(str_replace(' ', '-', $request->name));
        $member->youtube = $request->youtube;
        $member->facebook = $request->facebook;
        $member->twitter = $request->twitter;
        if($request->hasFile('avatar'))
        {
            // $path = $request->file('profile')->move(storage_path('profiles/users'));
            // $file_name = basename($path);
            $fileNameWithExt = $request->file('avatar')->getClientOriginalName();
            // filename
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            // extension
            $extension = $request->file('avatar')->getClientOriginalExtension();
            // filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('avatar')->store('public/users');
            $file_name = basename($path);
        }
        $member->avatar = $file_name;
        $member->save();
        if($member){
            session()->flash('success', 'member Added successfully');
            return redirect()->back();
        }else{
            session()->flash('error', 'Unable to add member, possible internet error');
            return redirect()->back();
        }
    }

    public function updateMember(Request $request, $member_id)
    {
        
        $this->validate($request, [
            'name' => 'required|min:3',
            'position' => 'required|min:3',
        ]);

         if($request->hasFile('avatar'))
        {
            $fileNameWithExt = $request->file('avatar')->getClientOriginalName();
            // filename
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            // extension
            $extension = $request->file('avatar')->getClientOriginalExtension();
            // filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('avatar')->store('public/users');
            $file_name = basename($path);
        }
        
        if(empty($file_name)){
            $the_file = Member::where(['id'=>$member_id])->first();
            $file_name = $the_file->photo;
        }
        
        try {
            Member::where(['id'=>$member_id])->update([
                'name' => $request->name,
                'position' => $request->position,
                'description' => $request->description,
                'url'  => strtolower(str_replace(' ', '-', $request->name)),
                'youtube' => $request->youtube,
                'facebook' => $request->facebook,
                'twitter' => $request->twitter,
                'avatar' => $file_name
            ]);
            session()->flash('success', 'Member Updated successfully');
           return redirect()->back();
        }catch(\Exception $ex){
            session()->flash('error', 'Unable to update Member, Possible internet error');
            return redirect()->back();
        }

    }


}