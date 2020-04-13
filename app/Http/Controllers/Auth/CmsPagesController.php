<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Service;
use App\SubService;
use App\Member;
use App\Testimonial;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

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
        $service = Service::where(['id'=>$service_id])->first();
        if($service){
            $char = Service::where(['id'=>$service_id])->first();
            $image = $char->avatar;
            unlink($image);
            $service->delete();
            session()->flash('success', "Service Deleted Successfully");
            return redirect()->back();
        }else{
            session()->flash('error', 'Unable to delete service. possible internet error');
            return redirect()->back();
        }

    }


    public function addService(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3|unique:services',
            'description' => 'required|min:50',
            'avatar'  => 'required|max:5068'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
         //GEt all the clients uploaded files and validate them to make sure they are of correct type.
        $extension =$request->file('avatar')->getClientOriginalExtension();
        $allowedFileExtension=['jpg','png', 'jpeg', 'gif', 'svg'];
        $check = in_array($extension, $allowedFileExtension);
        if($check){
            $service = new Service();
            $service->name = $request->name;
            $service->description = $request->description;
            $service->url = strtolower(str_replace(' ', '-', $request->name));
            if($request->hasFile('avatar')){
                // filename with extension
                $fileNameWithExt = $request->file('avatar')->getClientOriginalName();
                // filename
                $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                // extension
                $extension = $request->file('avatar')->getClientOriginalExtension();
                // filename to store
                $fileNameToStore = $filename.'_'.time().'.'.$extension;

                $path = $request->file('avatar')->move('avatars/services/', $fileNameToStore);

                $path_name = $path->getPathname();
            }
            $service->avatar = $path_name;
            $service->save();
            session()->flash('success', 'Service Added successfully');
            return redirect()->back();
        }else{
            $validator->errors()->add('avatar', "Avatar Should be of either type , ['jpg','png','bmp', 'jpeg', 'gif', 'svg']");
            return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
        }
    }

    public function serviceDetail($service_id)
    {
        $service = Service::where(['id'=>$service_id])->first();
        if($service){
            return view('auth.admin.cms.service_detail')->with(compact('service'));
        }else{
            abort(404);
        }
    }

    public function updateService(Request $request, $service_id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3',
            'description' => 'required|min:50',
            'avatar'  => 'max:5068'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
         //Give a default image extension of png
         $extension = $request->avatar == null ? 'png': $request->avatar->getClientOriginalExtension();
 
         $allowedFileExtension=['jpg','png', 'jpeg', 'gif', 'svg'];
         $check = in_array($extension, $allowedFileExtension);

         if($check){
            //Handle file upload for the avatar
            if($request->hasFile('avatar')){

                //get image and delete it from the server
                $char = Service::where(['id'=>$service_id])->first();
                if($char){
                    $image = $char->avatar;
                    unlink($image);
                }
                // filename with extension
                $fileNameWithExt = $request->file('avatar')->getClientOriginalName();
                // filename
                $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                // extension
                $extension = $request->file('avatar')->getClientOriginalExtension();
                // filename to store
                $fileNameToStore = $filename.'_'.time().'.'.$extension;

                $path = $request->file('avatar')->move('avatars/services/', $fileNameToStore);

                $path_name = $path->getPathname();
            }
            // Incase no image was not selected when trying to update profile information, maintain the previous image.
            if(empty($path_name)){
                $the_path = Service::where(['id'=>$service_id])->first();
                $get_path = $the_path->avatar;
                $path_name = $get_path;
            }
            Service::where(['id'=>$service_id])->update([
                'name' => $request->name,
                'description' => $request->description,
                'url'  => strtolower(str_replace(' ', '-', $request->name)),
                'avatar' => $path_name
            ]);
            session()->flash('success', 'Service Updated successfully');
            return redirect()->back();
         }else{
            $validator->errors()->add('avatar', "Avatar Should be of either type , ['jpg','png','bmp', 'jpeg', 'gif', 'svg']");
            return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
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
        $sub_service = SubService::where(['id'=>$sub_service_id])->first();
        if($sub_service){

            //get image and delete it from server too
            $char = SubService::where(['id'=>$sub_service_id])->first();
            $image = $char->avatar;
            unlink($image);
            $sub_service->delete();
            session()->flash('success', "Service Deleted Successfully");
            return redirect()->back();
        }else{
            session()->flash('error', 'Unable to delete service. possible internet error');
            return redirect()->back();
        }

    }


    public function addSubService(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3|unique:sub_services',
            'main_service' => 'required',
            'description' => 'required|min:50',
            'avatar' => 'required|max:5069'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
         //GEt all the clients uploaded files and validate them to make sure they are of correct type.
        $extension =$request->file('avatar')->getClientOriginalExtension();
        $allowedFileExtension=['jpg','png', 'jpeg', 'gif', 'svg'];
        $check = in_array($extension, $allowedFileExtension);

        if($check){
            $sub_service = new SubService();
            $sub_service->name = $request->name;
            $sub_service->service_id = $request->main_service;
            $sub_service->description = $request->description;
            $sub_service->url = Str::slug($request->name).'-'.time();
            if($request->hasFile('avatar')){
                // filename with extension
                $fileNameWithExt = $request->file('avatar')->getClientOriginalName();
                // filename
                $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                // extension
                $extension = $request->file('avatar')->getClientOriginalExtension();
                // filename to store
                $fileNameToStore = $filename.'_'.time().'.'.$extension;

                $path = $request->file('avatar')->move('avatars/sub_services/', $fileNameToStore);

                $path_name = $path->getPathname();
            }
            $sub_service->avatar = $path_name;
            $sub_service->save();
            session()->flash('success', 'subService Added successfully');
            return redirect()->back();
        }else{
            $validator->errors()->add('avatar', "Avatar Should be of either type , ['jpg','png','bmp', 'jpeg', 'gif', 'svg']");
            return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
        }
    }

    public function updateSubService(Request $request, $sub_service_id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3',
            'avatar' => 'max:5069'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

         //Give a default image extension of png
         $extension = $request->avatar == null ? 'png': $request->avatar->getClientOriginalExtension();
 
         $allowedFileExtension=['jpg','png', 'jpeg', 'gif', 'svg'];
         $check = in_array($extension, $allowedFileExtension);

         if($check){

         //Handle file upload for the avatar
         if($request->hasFile('avatar')){

            //Get sub service image and delete it from the server
            $char = SubService::where(['id'=>$sub_service_id])->first();
            if($char){
                $image = $char->avatar;
                unlink($image);
            }
            // filename with extension
            $fileNameWithExt = $request->file('avatar')->getClientOriginalName();
            // filename
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            // extension
            $extension = $request->file('avatar')->getClientOriginalExtension();
            // filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;

            $path = $request->file('avatar')->move('avatars/sub_services/', $fileNameToStore);

            $path_name = $path->getPathname();
            }
            // Incase no image was not selected when trying to update profile information, maintain the previous image.
            if(empty($path_name)){
                $the_path = SubService::where(['id'=>$sub_service_id])->first();
                $get_path = $the_path->avatar;
                $path_name = $get_path;
            }
            SubService::where(['id'=>$sub_service_id])->update([
                'name' => $request->name,
                'description' => $request->description,
                'service_id' => $request->service_id,
                'url'  => Str::slug($request->name).'-'.time(),
                'avatar' => $path_name
            ]);
            session()->flash('success', 'Service Updated successfully');
            return redirect()->back();
         }else{
            $validator->errors()->add('avatar', "Avatar Should be of either type , ['jpg','png','bmp', 'jpeg', 'gif', 'svg']");
            return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
         }
    }


    public function testimonials()
    {

        $testimonies = Testimonial::all();
        return view('auth.admin.cms.testimonies')->with(compact('testimonies'));
    }

    public function deleteTestimony(Request $request){

        $testimony_id = $request->testimony_id;
        $testimony = Testimonial::where(['id'=>$testimony_id])->first();
        if($testimony){

            $char = Testimonial::where(['id'=>$testimony_id])->first();
            unlink($char->avatar);
            $testimony->delete();
            session()->flash('success', "testimony Deleted Successfully");
            return redirect()->back();
        }else{
            session()->flash('error', 'Unable to delete testimony. possible internet error');
            return redirect()->back();
        }

    }


    public function addTestimony(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3|unique:testimonials',
            'profession' => 'required|min:3|',
            'testimony' => 'required',
            'avatar'  => 'required|max:5068'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
         //GEt all the clients uploaded files and validate them to make sure they are of correct type.
        $extension =$request->file('avatar')->getClientOriginalExtension();
        $allowedFileExtension=['jpg','png', 'jpeg', 'gif', 'svg'];
        $check = in_array($extension, $allowedFileExtension);

        if($check){
            $testimony = new Testimonial();
            $testimony->name = $request->name;
            $testimony->profession = $request->profession;
            $testimony->testimony = $request->testimony;
            if($request->hasFile('avatar')){
                // filename with extension
                $fileNameWithExt = $request->file('avatar')->getClientOriginalName();
                // filename
                $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                // extension
                $extension = $request->file('avatar')->getClientOriginalExtension();
                // filename to store
                $fileNameToStore = $filename.'_'.time().'.'.$extension;

                $path = $request->file('avatar')->move('avatars/testimonies/', $fileNameToStore);

                $path_name = $path->getPathname();
            }
            $testimony->avatar = $path_name;
            $testimony->save();
            session()->flash('success', 'testimony Added successfully');
            return redirect()->back();

        }else{
            $validator->errors()->add('avatar', "Avatar Should be of either type , ['jpg','png','bmp', 'jpeg', 'gif', 'svg']");
            return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
        }
    }


    public function updateTestimony(Request $request, $testimony_id)
    {
        
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3',
            'profession' => 'required|min:3|',
            'testimony' => 'required',
            'avatar'  => 'max:5068'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
          //Validate Image extension.
         //Give a default image extension of png
         $extension = $request->avatar == null ? 'png': $request->avatar->getClientOriginalExtension();
 
         $allowedFileExtension=['jpg','png', 'jpeg', 'gif', 'svg'];
         $check = in_array($extension, $allowedFileExtension);

         if($check){
             //Handle file upload for the avatar
            if($request->hasFile('avatar')){

                 //delete old image from server
                 $char = Testimonial::where(['id'=>$testimony_id])->first();
                 if($char){
                     $image = $char->avatar;
                     //Finally Deletes Image From Folder/Server.
                     unlink($image);
                 }
 
                // filename with extension
                $fileNameWithExt = $request->file('avatar')->getClientOriginalName();
                // filename
                $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                // extension
                $extension = $request->file('avatar')->getClientOriginalExtension();
                // filename to store
                $fileNameToStore = $filename.'_'.time().'.'.$extension;

                $path = $request->file('avatar')->move('avatars/testimonies/', $fileNameToStore);

                $path_name = $path->getPathname();
            }
            // Incase no image was not selected when trying to update profile information, maintain the previous image.
            if(empty($path_name)){
                $the_path = Testimonial::where(['id'=>$testimony_id])->first();
                $get_path = $the_path->avatar;
                $path_name = $get_path;
            }
            Testimonial::where(['id'=>$testimony_id])->update([
                'name' => $request->name,
                'profession' => $request->profession,
                'testimony' => $request->testimony,
                'avatar' => $path_name
            ]);
            session()->flash('success', 'testimony Updated successfully');
            return redirect()->back();
         }else{
            $validator->errors()->add('avatar', "Avatar Should be of either type , ['jpg','png','bmp', 'jpeg', 'gif', 'svg']");
            return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
         }
    }


    public function members()
    {

        $members = Member::all();
        return view('auth.admin.cms.members')->with(compact('members'));
    }

    public function deleteMember(Request $request){

        $member_id = $request->member_id;
        $member = Member::where(['id'=>$member_id])->first();
        if($member){
            $image = $member->avatar;
            unlink($image);
            $member->delete();
            session()->flash('success', "member Deleted Successfully");
            return redirect()->back();
        }else{
            session()->flash('error', 'Unable to delete member. possible internet error');
            return redirect()->back();
        }

    }

    public function addMemberForm()
    {
        return view('auth.admin.cms.add_member');
    }

    public function addMember(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3|unique:members',
            'email' => 'required|email|unique:members',
            'phone' => 'required|numeric|unique:members',
            'position' => 'required|min:3|',
            'description' => 'required|min:50',
            'avatar'  => 'required|max:5068'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
         //GEt all the clients uploaded files and validate them to make sure they are of correct type.
        $extension =$request->file('avatar')->getClientOriginalExtension();
        $allowedFileExtension=['jpg','png', 'jpeg', 'gif', 'svg'];
        $check = in_array($extension, $allowedFileExtension);
        if($check){

            try{
                DB::beginTransaction();

                $member = new Member();
                $member->name = $request->name;
                $member->email = $request->email;
                $member->phone = $request->phone;
                $member->position = $request->position;
                $member->description = $request->description;
                $member->url = Str::slug($request->name).'-'.time();
                $member->youtube = $request->youtube;
                $member->facebook = $request->facebook;
                $member->twitter = $request->twitter;
                if($request->hasFile('avatar')){
                    // filename with extension
                    $fileNameWithExt = $request->file('avatar')->getClientOriginalName();
                    // filename
                    $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                    // extension
                    $extension = $request->file('avatar')->getClientOriginalExtension();
                    // filename to store
                    $fileNameToStore = $filename.'_'.time().'.'.$extension;

                    $path = $request->file('avatar')->move('avatars/members/', $fileNameToStore);

                    $path_name = $path->getPathname();
                }
                $member->avatar = $path_name;
                $member->save();
                DB::commit();
                session()->flash('success', 'member Added successfully');
                return redirect()->route('cms.members');
            }catch(\Illuminate\Database\QueryException $e){
                DB::rollBack();
                session()->flash('error', 'Unable to process Database query, Check and make sure your fields are all correct');
                return redirect()->back()->withInput();
            }
            
        }else{
            $validator->errors()->add('avatar', "Avatar Should be of either type , ['jpg','png','bmp', 'jpeg', 'gif', 'svg']");
            return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
        }

        
        if($member){
            session()->flash('success', 'member Added successfully');
            return redirect()->back();
        }else{
            session()->flash('error', 'Unable to add member, possible internet error');
            return redirect()->back();
        }
    }

    public function memberDetail($member_id)
    {
        $member = Member::where('id',$member_id)->first();
        if($member){
            return view('auth.admin.cms.member_detail')->with(compact('member'));
        }else{                       
            abort(404);
        }
    }

    public function updateMember(Request $request, $member_id)
    {
        
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'position' => 'required|min:3',
            'description' => 'required|min:50',
            'avatar'  => 'max:5068'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
          //Validate Image extension.
         //Give a default image extension of png
         $extension = $request->avatar == null ? 'png': $request->avatar->getClientOriginalExtension();
 
         $allowedFileExtension=['jpg','png', 'jpeg', 'gif', 'svg'];
         $check = in_array($extension, $allowedFileExtension);

         if($check){
             //Handle file upload for the avatar
            if($request->hasFile('avatar')){
                // filename with extension
                //delete old image from server
                $char = Member::where(['id'=>$member_id])->first();
                if($char){
                    $image = $char->avatar;
                    //Finally Deletes Image From Folder/Server.
                    unlink($image);
                }

                $fileNameWithExt = $request->file('avatar')->getClientOriginalName();
                // filename
                $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                // extension
                $extension = $request->file('avatar')->getClientOriginalExtension();
                // filename to store
                $fileNameToStore = $filename.'_'.time().'.'.$extension;

                $path = $request->file('avatar')->move('avatars/members/', $fileNameToStore);

                $path_name = $path->getPathname();
            }
            // Incase no image was not selected when trying to update profile information, maintain the previous image.
            if(empty($path_name)){
                $the_path = Member::where(['id'=>$member_id])->first();
                $get_path = $the_path->avatar;
                $path_name = $get_path;
            }
            Member::where(['id'=>$member_id])->update([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'position' => $request->position,
                'description' => $request->description,
                'url'  => strtolower(str_replace(' ', '-', $request->name)),
                'youtube' => $request->youtube,
                'facebook' => $request->facebook,
                'twitter' => $request->twitter,
                'avatar' => $path_name
            ]);
            session()->flash('success', 'member Updated successfully');
           return redirect()->back();
         }else{
            $validator->errors()->add('avatar', "Avatar Should be of either type , ['jpg','png','bmp', 'jpeg', 'gif', 'svg']");
            return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
         }
    }


}
