<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    //

    use AuthenticatesUsers;

    protected $guard = 'admin';

      /**
     * Where to redirect admin after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::ADMIN_DASHBOARD;

    public function __construct()
    {
        // $this->middleware('guest')->except('logout');
    }
    
    

    public function dashboard()
    {
        return view('auth.admin.dashboard');
    }



}