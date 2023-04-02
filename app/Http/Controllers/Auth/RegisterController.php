<?php

namespace App\Http\Controllers\Auth;

use App\Models\Language;
use App\Models\Setting;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after login / registration.
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
        $this->locales = Language::all();
        $this->settings = Setting::query()->first();
        view()->share(['locales' => $this->locales, 'settings' => $this->settings]);
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => 'required|max:255',
//            'last_name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return Admin
     */
    protected function create(Request $request)
    {
         $request->validate([
            'first_name' => 'required|max:255',
//            'last_name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',

            ],
            [
                'email.unique' => 'البريد الإلكتروني موجود مسبقاً',
                'first_name.max' => 'الاسم يجب ان لا يزيد عن 255 حرف ',
                'password.min' => 'كلمة المرور يجب ان تتكون من 6 أحرف أو أرقام على الاقل',
                'password.required' => 'كلمة المرور مطلوبة',
                'password.confirmed' => 'كلمة المرور غير متطابقة مع تأكيد كلمة المرور',
            ]);
        $user = User::create([
            'name' => $request->first_name,
//            'last_name' => $data['last_name'],
            'email' => $request->email,
            'status' => 'active',
            'password' => Hash::make($request->password),
        ]);

         Auth::login($user);
//        Auth::attempt(['email' => $request->email, 'password' => $request->password]);
        return redirect()->route('home')->with('status', true);
//         return $redirectTo;
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
//    public function showRegistrationForm()
//    {
//        return view('auth.register');
//    }

    /**
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard();
    }
}
