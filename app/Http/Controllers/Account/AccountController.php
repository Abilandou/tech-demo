<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Admin;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
//Call in the general message trait
use App\Traits\MessageServiceTrait;


class AccountController extends Controller
{
    //

    use MessageServiceTrait;
    
    public function emailToUser($email, $user_name, $token)
    {

        $messageData = [
            'user_email' => $email,
            'username'  => $user_name,
            'token'  => $token
        ];
        $view_path = 'auth.admin.emails.send_reset_password';
        //sendEmail function found in MessageServiceTrait.
        $this->sendEmail($messageData, $email, $view_path);
    }

    public function setting()
    {
        return view('auth.admin.account.setting');
    }

    public function profile()
    {
        return view('auth.admin.account.profile');
    }
    
    public function changePassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'existing_password' => 'required',
            'password'          => 'required|min:6|confirmed',
        ]);

        // Ensure that user's password matches password from the form
        $validator->after(function ($validator) use ($request) {
            $existing_password = Auth::guard('admin')->user()->password;
            if (!Hash::check($request['existing_password'], $existing_password)) {
                $validator->errors()->add('existing_password', __('Your current password does not match with the password you provided'));
            }
        });

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $admin = Admin::where('id', Auth::guard('admin')->user()->id)->update([
            'password' => Hash::make($request->password)
        ]);
        if ($admin) {
            return redirect()->back()->with('success', 'Password successfully changed');
        } else {
            return redirect()->back()->with('error', 'Unable to update password pleasetry again later');
        }
    }

    public function updateProfile(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'   => 'required',
            'email'  => 'required',
        ]);

        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try{
            Admin::where('id', Auth::guard('admin')->user()->id)->update([
                'name' => $request->name,
                'email' => $request->email
            ]);
            session()->flash('info', 'Profile Updated successfully');
            return redirect()->back();
        }catch(\Exception $ex){
            session()->flash('error', 'Unable to update profile possible internet error, if problem persists please contact the developer at godloveabilandou@gmail.com');
            return redirect()->back();
        }
       

        
    }

    public function showVerifyEmailForm()
    {
        return view('auth.admin.verify_email');
    }


    public function getPasswordResetLink(Request $request)
    {
        //validate user email
        $validator = Validator::make($request->all(), [
            'email' => 'required|email'
        ]);

        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }
        //Get user email and check if it exists in the database
        $getAdmin = Admin::where(['email'=>$request->email])->first();

        if($getAdmin)
        {
            //generate and insert token in admins table
            $token = Str::random(132);

            DB::table('password_resets')->insert([
                'email' => $request->email,
                'token' => $token
            ]);

            $user_email = $getAdmin->email;
            $user_name = $getAdmin->name;

            try{
                $this->emailToUser($user_email, $user_name, $token);
                return redirect()->back()->with('link-sent', 'Please check your email for a password reset link');
            }catch(\Exception $ex){
                session()->flash('error', 'Sorry email could not be sent at the moment');
                $validator->errors()->add('email', 'Sorry, Email could not be sent, please make sure you are connected to the internet');
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }
        }else{
            $validator->errors()->add('email', 'Sorry this email does not exist in our record');
        return redirect()->back()
            ->withErrors($validator)
            ->withInput();
        }
    }

    public function showPasswordResetForm($token)
    {
        $adminEmail = DB::table('password_resets')->where('token', $token)->first();
        if($adminEmail){
            $email = $adminEmail->email;
            return view('auth.admin.reset_password')->with(compact('email', 'token'));
        }else{
            return redirect()->route('show.verify.email')->with('invalid_link', 'Password Reset Link is Invalid');
        }
        
    }

    public function resetPassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed'
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $token = $request->token;

             // Get User email and update password accordingly
        $getAdmin = DB::table('password_resets')->where(['email'=>$request->email])->where(['token'=>$token])->first();

            if($getAdmin){
                //Update the password
                Admin::where(['email'=>$request->email])->update([
                    'password' => Hash::make($request->password),
                ]);
                DB::table('password_resets')->where(['email'=>$request->email])->where(['token'=>$token])->delete();
                return redirect()->route('admin.login.form')->with('password-updated', 'Successfully updated your password, please login to continue');
            }else{
                $validator->errors()->add('email', 'Sorry This Email Does Not Match Any Record or Password Reset Token is invalid');
                return redirect()->back()->withErrors($validator)->withInput();
            }
    }

}