<?php

namespace App\Http\Controllers\AdminAuth;

use Session;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;


    public $redirectTo = '/admin/home';


    public function __construct()
    {
        $this->middleware('guest:admin', ['except' => ['logout']]);
    }



    public function showLoginForm()
    {
        return view('admin.auth.login');
    }



    protected function guard()
    {
        return Auth::guard('admin');
    }




    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();

        return redirect('/admin/login');
    }


}
