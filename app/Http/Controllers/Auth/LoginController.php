<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;
    
    protected $guard = 'admin';

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;


    protected $redirectTo = RouteServiceProvider::ADMIN_DASHBOARD;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('guest')->except('logout');
    }

    public function adminLoginForm(){
        if(Auth::guard('admin')->check()){
            return redirect()->route('admin.dashboard');
        }
        return view('auth.admin.login');
    }

    public function adminLogin(Request $request)
    {

        // $validator = Validator::make($request->all(), [
        //     'email'    => 'required|email',
        //     'password' => 'required|min:8'
        // ]);
        

        // if ($validator->fails()) {
        //     return redirect()->back()
        //         ->withErrors($validator)
        //         ->withInput();
        // }

        // if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
        //     return redirect()->route('admin.dashboard');
        // }else{
        //     $validator->errors()->add('email', 'Invalid Email or Password.');
        // return redirect()->back()
        //     ->withErrors($validator)
        //     ->withInput();
        // }

        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        if (auth()->guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
            // return redirect()->intended($this->redirectPath());
            return redirect()->route('admin.dashboard');
        }
        return $this->sendFailedLoginResponse($request);
    }

    public function adminLogout()
    {
        // Auth::logout();
        // return redirect()->route('admin.login.form');
        Auth('admin')->logout();
        return redirect()->route('admin.login.form');
    }

    

}