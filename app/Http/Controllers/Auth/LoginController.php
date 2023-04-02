<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Language;
use App\Models\Setting;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');

        $this->locales = Language::all();
        $this->settings = Setting::query()->first();
        view()->share(['locales' => $this->locales, 'settings' => $this->settings]);
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $this->validator($request);

        if (auth()->attempt(['email' => $request->email, 'password' => $request->password ], $request->get('remember'))) {
            return redirect()->intended('/home');
        }
//        elseif(auth()->attempt(['email' => $request->email, 'password' => $request->password , 'is_active' => 0], $request->get('remember'))){
////            return view('website.auth.login_active');
//            auth()->logout();
//            return redirect()->back()->with('warning', ' هذا الحساب تم تعطيله من قبل المشرف.');
//        }
        else{
            return view('auth.login');
        }
        return back()->withInput($request->only('email', 'remember'));
    }

    protected function guard()
    {
        return auth()->user();
    }

    public function logout()
    {
        auth()->logout();
        return redirect('login');
    }

    private function validator(Request $request)
    {
        //validation rules.

        $rules = [
            'email' => 'required|email|exists:users',
            'password' => 'required|min:6',
//            'password' => 'required|min:6|confirmed',
        ];

        //custom validation error messages.
        $messages = [
            'email.exists' => 'البريد الإلكتروني لا يتطابق مع سجلاتُنا',
            'password.min' => 'كلمة المرور يجب ان تتكون من 6 أحرف أو أرقام على الاقل',
            'password.required' => 'كلمة المرور مطلوبة',
//            'password.confirmed' => 'يرجى التأكد من كلمة المرور'
        ];

        //validate the request.
        $request->validate($rules,$messages);
    }





}
