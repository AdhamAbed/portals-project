<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Language;
use App\Models\Setting;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Validator;
use App\Admin;
use App\User;
use App\Mail\ResetPasswordEmail;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

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
        $this->middleware('guest', ['except' => ['logout']]);
    }

    /**
     * Display the form to request a password reset link.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLinkRequestForm()
    {
        return view('auth.passwords.email');
    }

    /**
     * Get the broker to be used during password reset.
     *
     * @return \Illuminate\Contracts\Auth\PasswordBroker
     */
    public function broker()
    {
        return Password::broker();
    }
    public function forget(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email', Rule::exists('users', 'email')],
        ],[

            'email.required'=>__('cp.Email Is Required'),
            'email.exists'=>__('cp.Email Is Not Exists')

        ]);
        $user = User::query()->where('email',$request['email'])->firstOrFail();
        {
            $hiddenCode = Str::random(8);
        }while(User::query()->where('forget_code',$hiddenCode)->first());

        $user->forget_code = $hiddenCode;
        $user->save();
//        $app_name = optional(GeneralSetting::query()->find(1))->name?? '';
        Mail::to($user->email)->send(new ResetPasswordEmail('Life Industry',$user,$hiddenCode));
//        return [
//            'result'=>'ok',
//            'message'=>__('cp.Please check your email to reset your password'),
//            //'url'=> route('admin.changePassword',['forgetCode'=>$hiddenCode, 'email'=>$user->email,]),
//        ];
        alert()->success('تم ارسال رابط اعادة تعيين كلمة المرور على بريدك الالكتوني', 'تم');
        return redirect()->back();
    }

    public function changePasswordForm($forgetCode,$email)
    {
        return view('auth.passwords.reset',[
            'forgetCode'=>$forgetCode,
            'email'=>$email,
        ]);
    }
    public function reset(Request $request)
    {

        $request->validate([
            'password' => 'required|confirmed',
//            'confirm_password' => 'required|same:password',
        ],[
            'password.required' =>__('cp.New Password Is Required'),
            'confirm_password.required' =>__('cp.Confirm Password Is Required'),
            'confirm_password.same' =>__('cp.Check Confirmation'),
        ]);
        $user = User::query()->where('email',$request['email'])->firstOrFail();
//        dd($request->forgetCode);
        if($user->forget_code == $request->forgetCode){
            $user->password = Hash::make($request->password);
            $user->forget_code = null;
            $user->save();

            alert()->success('تم اعادة تعيين كلمة المرور بنجاح', 'تم');
            return redirect()->route('user.login.form');
//            return ['result'=>'ok','message'=> __('cp.Your Password Has Been Changed Successfuly'),'url'=>route('user.login.form')];
        }else{
            alert()->warning(__('cp.you can\'t reset password please contact support for more details'), 'خطأ');
            return redirect()->back();
//            return ['result'=>'error','message'=> __('cp.you can\'t reset password please contact support for more details')];

        }

    }

}
