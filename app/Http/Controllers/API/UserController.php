<?php

namespace App\Http\Controllers\API;
use App\Admin;
use App\Models\CartAddition;

use App\Models\Order;
use App\Models\Cart;
use App\Models\Code;
use App\Notifications\ResetPassword;
use Carbon\Carbon;
use Illuminate\Support\Facades\Password;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Token;
use App\Models\OrderProduct;
use App\Models\UserAddress;
use App\Models\Setting;


use App\Models\Notify;
use App\Models\City;
use App\Models\Reminder;
use App\Models\SpecialRequest;
use App\Models\Notifiy;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

use Image;
use DB;
use Twilio;

class UserController extends Controller
{
    use SendsPasswordResetEmails;

    public function broker()
    {
        return Password::broker('users');
    }
    public function image_extensions()
    {
        return array('jpg', 'png', 'jpeg', 'gif', 'bmp');
    }




    public function loginBySocial(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'provider' => 'required',
            'social_token' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => false, 'code' => 201, 'message' =>implode("\n",$validator->messages()->all())]);
        }
        
        if($request->provider == 'apple'){
            $checkUser = User::where('social_token', $request->social_token)->first();

            if($checkUser){
                if($request->has('fcm_token')) {
                    Token::updateOrCreate(['device_type' => $request->get('device_type'),'fcm_token' => $request->get('fcm_token')],['user_id' => $checkUser->id]);
                }
                
                $checkUser['access_token'] = $checkUser->createToken('mobile')->accessToken;
                return response()->json(['status' => true, 'code' => 200, 'message' => __('api.ok'), 'user' => $checkUser]);
            }
        }
        
        
        $checkUser = User::where('email', $request->email)->first();
        
        if($checkUser){
            $checkUser->name = $request->first_name . ' ' . $request->last_name;
            $checkUser->image_profile = $request->social_img;
            $checkUser->provider = $request->provider;
            $checkUser->social_token = $request->social_token;

            $checkUser->status = 'active';
            $checkUser->save();
            
            if($request->has('fcm_token')) {
                Token::updateOrCreate(['device_type' => $request->get('device_type'),'fcm_token' => $request->get('fcm_token')],['user_id' => $checkUser->id]);
            }
            
            $checkUser['access_token'] = $checkUser->createToken('mobile')->accessToken;
            return response()->json(['status' => true, 'code' => 200, 'message' => __('api.ok'), 'user' => $checkUser]);
        }

        $newUser = new User();
        $newUser->name = $request->first_name . ' ' . $request->last_name;
        $newUser->email = $request->email;
        $newUser->provider = $request->provider;
        $newUser->image_profile = $request->social_img;
        $newUser->social_token = $request->social_token;
        $newUser->status = 'active';
        $newUser->save();


        if ($newUser) {
            if($request->has('fcm_token')) {
                Token::updateOrCreate(['device_type' => $request->get('device_type'),'fcm_token' => $request->get('fcm_token')],['user_id' => $newUser->id]);
            }

            $newUser['access_token'] = $newUser->createToken('mobile')->accessToken;

            return response()->json(['status' => true, 'code' => 200, 'message' => __('api.ok'), 'user' => $newUser]);
        }
        return response()->json(['status' => false, 'code' => 201, 'message' => __('api.whoops')]);
    }




 public function signUpUsers(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'mobile' => 'required|unique:users,mobile,NULL,id,deleted_at,NULL',
            'password' => 'required|min:6',
            'confirm_password' => 'required|min:6|same:password',
            'type' => 'required',
        ]);


        if ($validator->fails()) {
            return response()->json(['status' => false, 'code' => 201, 'message' =>implode("\n",$validator->messages()->all())]);
        }


        $newUser = new User();
        $newUser->name = $request->name;
        $newUser->email = $request->email;
        $newUser->mobile = $request->mobile;
        $newUser->phone = $request->phone;
        $newUser->address = $request->address;
        $newUser->latitude = $request->latitude;
        $newUser->longitude = $request->longitude;
        $newUser->password = bcrypt($request->password);
        $newUser->type = $request->type;

        if ($request->hasFile('image_profile')) {
            $image = $request->file('image_profile');
            $extention = $image->getClientOriginalExtension();
            $file_name = rand(1000000, 9999999) . "_" . time() . "_" . rand(1000000, 9999999) . "." . $extention;
            Image::make($image)->save("uploads/users/$file_name");
            $newUser->image_profile = $file_name;
        }

        $newUser->save();

        if ($newUser) {
            if ($request->has('fcm_token')) {
                Token::updateOrCreate(['device_type' => $request->get('device_type'),'fcm_token' => $request->get('fcm_token')],['user_id' => $newUser->id]);
            }


            // $code = rand(1000, 9999);
            $code = 1111;
            $conf = new Code();
            $conf->code = $code;
            $conf->user_id = $newUser->id;
            $conf->save();
            
            // $mobileMsg = __('api.YourActivationCodeIs') . ' ' . $code;  
            // Twilio::message(substr($request->mobile, 2), $mobileMsg);    
            
            return response()->json(['status' => true, 'code' => 200, 'message' => __('api.ok'), 'user' => $newUser]);
        }
        return response()->json(['status' => false, 'code' => 201, 'message' => __('api.whoops')]);
    }






    public function loginForUsers(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'mobile' => 'required',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => false, 'code' => 201, 'message' =>implode("\n",$validator->messages()->all())]);
        }
        

        Auth::once(['mobile' => $request->mobile, 'password' => $request->password]);
        

        if (Auth::user()) {
            $user = Auth::user();

            if ($request->has('fcm_token')) {
                    Token::updateOrCreate(['device_type' => $request->get('device_type'), 'fcm_token' => $request->get('fcm_token')], ['user_id' => $user->id]);
                }
                if ($user->status != 'active') {
                    return response()->json(['status' => false, 'code' => 201, 'message' => __('api.yourAccountNotActive')]);
                } else {
             
                    $user['access_token'] = $user->createToken('mobile')->accessToken;
                    return response()->json(['status' => true, 'code' => 200, 'message' => '', 'user' => $user]);
                }
            
        } else {
            return response()->json(['status' => false, 'code' => 201, 'message' =>__('api.wrongLogin')]);
        }
    }



    
    
    public function profile(){
        if(isset(auth('api')->user()->id)) {
            $user = auth('api')->user();
            $user['access_token'] = $user->createToken('mobile')->accessToken;
            return response()->json(['status' => true, 'code' => 200, 'message' =>__('api.ok'), 'user' => $user]);
        }
        return response()->json(['status' => false, 'code' => 201, 'message' =>__('api.nopermission')]);
    } 
    
    
    
    public function checkCode(Request $request)
    {

        $rules = [
            'code' => 'required|min:4',
            'mobile' => 'required',
        ];
    
        $validator = Validator::make($request->all(), $rules);
    
        if ($validator->fails()) {
             return response()->json(['status' => false, 'code' => 200, 'message' =>implode("\n",$validator->messages()->all())]);
        }
    
        $checkUser = User::where('mobile', $request->mobile)->first();

        if ($checkUser) {
            $checkCode = Code::where(['user_id' => $checkUser->id, 'code' => $request->code, 'used' => 0])->orderBy('id', 'desc')->first();
            
            if ($checkCode) {
                Code::where('id', $checkCode->id)->update(array('used' => 1));
                Code::where('user_id', $checkUser->id)->delete();
                $checkUser->status = "active";
                $checkUser->save();
                
                $checkUser['access_token'] = $checkUser->createToken('mobile')->accessToken;
                return response()->json(['status' => true, 'code' => 200, 'message' => __('api.ok'),'user' => $checkUser]);
            }
            else {
                return response()->json(['status' => false, 'code' => 201, 'message' => __('api.not_valid_code')]);
            }
        }

        return response()->json(['status' => false, 'code' => 201, 'message' => __('api.wrongMobile')]);
    }
    
    
    

    public function forgotPassword(Request $request)
    {
        $rules = [
            'mobile' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);
        
        if ($validator->fails()) {
            return response()->json(['status' => false, 'code' => 201, 'message' =>implode("\n",$validator->messages()->all())]);
        }
        
        $checkUser = User::where('mobile', $request->mobile)->first();

        if ($checkUser) {
            // $new_password = rand(11111111, 999999999);
            $new_password = 123456;
            $checkUser->password = bcrypt($new_password);
            $checkUser->save();
            
            // $mobileMsg = __('api.YourNewPasswordIs') . ' ' . $new_password;  
            // Twilio::message(substr($request->mobile, 2), $mobileMsg);    

            return response()->json(['status' => true, 'code' => 200, 'message' =>__('api.new_password_sent')]);
        }
        return response()->json(['status' => false, 'code' => 201, 'message' =>__('api.pleaseEnterTrueEmail')]);
    }

    
    
    
    public function resetPassword(Request $request)
    {
    
        $rules = [
            'password' => 'required|min:6',
            'confirm_password' => 'required|min:6|same:password',
        ];

        $validator = Validator::make($request->all(), $rules);
    
        if ($validator->fails()) {
            return mainResponse(false, '', null, 200, 'items', $validator);
        }
            
        $checkUser = auth('api')->user();
    
        $checkUser->password = bcrypt($request->get('password'));
        if($checkUser->save()) {
            $checkUser->refresh();
            $message = __('api.ok');
            return mainResponse(true, $message, null, 200, 'items', $validator);
        }
        
    }
    


    public function editProfile(Request $request)
    {
        
        $user_id = auth('api')->id();
        $user = User::findOrFail($user_id);

        $validator = Validator::make($request->all(), [
            'mobile' => 'required|unique:users,mobile,'.$user_id,
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => false, 'code' => 201, 'message' =>implode("\n",$validator->messages()->all())]);
        }

        $user->name = $request->name;
        $user->mobile = $request->mobile;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->latitude = $request->latitude;
        $user->longitude = $request->longitude;
        
        if ($request->hasFile('image_profile')) {
            $image = $request->file('image_profile');
            $extention = $image->getClientOriginalExtension();
            $file_name = rand(1000000, 9999999) . "_" . time() . "_" . rand(1000000, 9999999) . "." . $extention;
            Image::make($image)->save("uploads/users/$file_name");
            $user->image_profile = $file_name;
        }
        
        $done =  $user->save();

        $user['access_token'] = $user->createToken('mobile')->accessToken;
        return response()->json(['status' => true, 'code' => 200, 'message' =>__('api.ok'), 'user' => $user]);
        }



    

    public function changePassword(Request $request)
    {
        
        $rules = [
            'old_password' => 'required|min:6',
            'password' => 'required|min:6',
            'confirm_password' => 'required|min:6|same:password',
        ];
        
        $validator = Validator::make($request->all(), $rules);
        
        if ($validator->fails()) {
            return response()->json(['status' => false, 'code' => 201, 'message' =>implode("\n",$validator-> messages()-> all())]);
        }
        
        $user = auth('api')->user();

        if (!Hash::check($request->get('old_password'), $user->password)) {
            $message = __('api.old_password'); //wrong old
            return response()->json(['status' => false, 'code' => 201,'message' => $message ]);
        }

        $user->password = bcrypt($request->get('password'));

        if ($user->save()) {
            $user->refresh();
            $message = __('api.ok');
            return response()->json(['status' => true, 'code' => 200,'message' => $message ]);
        }
        $message = __('api.whoops');
        return response()->json(['status' => false, 'code' => 201,'message' => $message ]);
    }
    
    
    

    

    public function logout()
    {
        $user_id = auth('api')->id();
        Token::where('user_id', $user_id)->delete();
        if (auth('api')->user()->token()->revoke()) {
            $message = 'logged out successfully';
            return response()->json(['status' => true, 'code' => 200,
                'message' => $message ]);
        } else {
            $message = 'logged out successfully';
            return response()->json(['status' => true, 'code' => 202,
                'message' => $message ]);
        }
    }
    
    
    
    
    public function reSendCode(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'mobile' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => false, 'code' => 200, 'message' =>implode("\n",$validator->messages()->all())]);
        }

        $checkUser = User::where('mobile', $request->mobile)->first();
        if ($checkUser) {

            Code::where('user_id', $checkUser->id)->delete();

            // $code = rand(1000, 9999);
            $code = 1111;
            $conf = new Code();
            $conf->code = $code;
            $conf->user_id = $checkUser->id;
            $conf->save();
            
            // $mobileMsg = __('api.YourActivationCodeIs') . ' ' . $code;  
            // Twilio::message(substr($request->mobile, 2), $mobileMsg); 
            
            return response()->json(['status' => true, 'code' => 200, 'message' => __('api.ok'), 'code' => $conf->code]);
        }    

        return response()->json(['status' => false, 'code' => 201, 'message' => __('api.wrongMobile')]);
    }
    


    public function getMyAddresses(Request $request){
        $addresses = UserAddress::where('user_id', auth('api')->user()->id)->latest('id')->first();
        $setting =  Setting::orderBy('id','desc')->first();

        $lat1 = $setting->latitude;
        $lon1 = $setting->longitude;
        $lat2 = $addresses->latitude; 
        $lon2 = $addresses->longitude;

        $theta = $lon1 - $lon2;
        $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
        $dist = acos($dist);
        $dist = rad2deg($dist);
        $miles = $dist * 60 * 1.1515;
        $distanceBymeter = round($miles * 1.609344); // meter
        
        $addresses->distanceBymeter = $distanceBymeter;
        $addresses->delivery_cost_by_meter = $setting->delivery_cost_by_meter;
        $addresses->final_delivery_cost = $setting->delivery_cost_by_meter * $distanceBymeter;

        
        return response()->json(['status' => true, 'code' => 200, 'message' =>__('api.ok'), 'addresses' => $addresses]);
    }
    
    
    
    public function addNewAddress(Request $request){

        $rules = [
            'name' => 'required',
            'address' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()){
            return response()->json(['status' => false, 'code' => 200, 'message' =>implode("\n",$validator->messages()->all())]);
        }

        $address = new UserAddress();
        $address->user_id = auth('api')->user()->id;
        $address->name = $request->name;
        $address->address = $request->address;
        $address->mobile = $request->mobile;
        $address->latitude = $request->latitude;
        $address->longitude = $request->longitude;
        $address->save();

        return response()->json(['status' => true, 'code' => 200, 'message' =>__('api.ok'),'address' => $address]);
    }

    
    public function editMyAddress(Request $request){

        $rules = [
            'name' => 'required',
            'address' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()){
            return response()->json(['status' => false, 'code' => 200, 'message' =>implode("\n",$validator->messages()->all())]);
        }

        $address = UserAddress::findOrFail($request->address_id);
        $address->name = $request->name;
        $address->address = $request->address;
        $address->mobile = $request->mobile;
        $address->latitude = $request->latitude;
        $address->longitude = $request->longitude;
        $address->save();

        return response()->json(['status' => true, 'code' => 200, 'message' =>__('api.ok'), 'address' => $address]);
    }



    public function deleteMyAddress(Request $request){

        $rules = [
            'address_id' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);
        
        if ($validator->fails()){
            return response()->json(['status' => false, 'code' => 200, 'message' =>implode("\n",$validator->messages()->all())]);
        }

        $address = UserAddress::findOrFail($request->address_id)->delete();

        return response()->json(['status' => true, 'code' => 200, 'message' => __('api.ok'), 'address' => $address]);

    }


}
