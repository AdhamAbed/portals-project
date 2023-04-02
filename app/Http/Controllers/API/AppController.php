<?php
namespace App\Http\Controllers\API;

use App\Models\Category;
use App\Models\Page;
use App\Models\Contact;
use App\Models\Setting;
use App\Models\Ad;
use App\Models\Order;
use App\Models\Notification;
use App\Models\Token;
use App\Models\Coupon;
use App\Models\Cart;
use App\Models\UserPackage;
use App\Models\PaymentMethod;
use App\Models\Package;
use App\Models\Rate;
use App\Models\UserContract;
use App\Models\Service;
use App\Models\UserPoint;
use App\Models\Chat;
use App\Models\ChatMessage;
use App\Models\UserInvoice;
use Carbon\Carbon;

use App\User;
use DB;
use Image;
use QrCode;

use Mail;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class AppController extends Controller
{


    public function settings()
    {
        $data = Setting::orderBy('id','desc')->first();
        
        $data->about_us = Page::where('id', 1)->first();
        $data->privacy = Page::where('id', 2)->first();
        $data->terms_conditions = Page::where('id', 3)->first();
        $data->about_loyalty_points = Page::where('id', 4)->first();
        $data->how_to_request_services = Page::where('id', 5)->first();
        $data->price_details = Page::where('id', 6)->first();
        $data->service_details = Page::where('id', 7)->first();
        $data->contact_technical_support = Page::where('id', 8)->first();
        $data->service_policies = Page::where('id', 9)->first();
        $data->special_orders = Page::where('id', 10)->first();

        $data->payment_methods = PaymentMethod::active()->get();        

        return response()->json(['status' => true, 'code' => 200, 'message' => __('api.ok'), 'settings' => $data ]);
    }

 
    public function getAds()
    {
        $ads = Ad::active()->latest('id')->get();
        return response()->json(['status' => true, 'code' => 200, 'message' => __('api.ok'), 'ads' => $ads]);
    }
    
    
    public function getPackages()
    {
        $packages = Package::active()->latest('id')->get();
        return response()->json(['status' => true, 'code' => 200, 'message' => __('api.ok'), 'packages' => $packages]);
    }
    

    public function pageDetails(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'page_id' => 'required',
        ]);
            
        if ($validator->fails()) {
            return response()->json(['status' => false, 'code' => 200, 'validator' => implode("\n", $validator->messages()->all())]);
        }

        $page = Page::where('id', $request->page_id)->first();
        return response()->json(['status' => true, 'code' => 200, 'message' => __('api.ok'), 'page' => $page]);
    }
    
    
    public function getMyProjectDetails(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'project_id' => 'required',
        ]);
            
        if ($validator->fails()) {
            return response()->json(['status' => false, 'code' => 200, 'validator' => implode("\n", $validator->messages()->all())]);
        }

        $project = Order::where('id', $request->project_id)->first();
        return response()->json(['status' => true, 'code' => 200, 'message' => __('api.ok'), 'project' => $project]);
    }
    
    
    public function getPackageDetails(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'package_id' => 'required',
        ]);
            
        if ($validator->fails()) {
            return response()->json(['status' => false, 'code' => 200, 'validator' => implode("\n", $validator->messages()->all())]);
        }

        $package = Package::where('id', $request->package_id)->first();
        return response()->json(['status' => true, 'code' => 200, 'message' => __('api.ok'), 'package' => $package]);
    }
    
    
    public function getServicesByCategory(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'category_id' => 'required',
        ]);
            
        if ($validator->fails()) {
            return response()->json(['status' => false, 'code' => 200, 'validator' => implode("\n", $validator->messages()->all())]);
        }

        $category = Category::findOrFail($request->category_id);
        
        
        $services = Service::query()->active();
        
        if($request->get('txt')){
            $services = $services->where('type', 'fixed_price')->whereTranslationLike('title', '%' . $request->get('txt') . '%', 'en')
                        ->orWhereTranslationLike('title', '%' . $request->get('txt') . '%', 'ar')
                        ->orWhereTranslationLike('details', '%' . $request->get('txt') . '%', 'en')
                        ->orWhereTranslationLike('details', '%' . $request->get('txt') . '%', 'ar');
        }
        
        $services = $services->where('type', 'fixed_price')->where('category_id', $request->category_id)->latest('id')->get();
        $services = Service::whereIn('id', $services->pluck('id'))->where('type', 'fixed_price')->where('category_id', $request->category_id)->latest('id')->get();        
        
        
        return response()->json(['status' => true, 'code' => 200, 'message' => __('api.ok'), 'category' => $category, 'services' => $services]);
    }


    public function getServicesByPoints(Request $request)
    {
        
        $services = Service::query()->active();
        
        if($request->get('txt')){
            $services = $services->where('type', 'points')->whereTranslationLike('title', '%' . $request->get('txt') . '%', 'en')
                        ->orWhereTranslationLike('title', '%' . $request->get('txt') . '%', 'ar')
                        ->orWhereTranslationLike('details', '%' . $request->get('txt') . '%', 'en')
                        ->orWhereTranslationLike('details', '%' . $request->get('txt') . '%', 'ar');
        }
        
        $services = $services->where('type', 'points')->latest('id')->get();
        $services = Service::whereIn('id', $services->pluck('id'))->where('type', 'points')->latest('id')->get();
        
        return response()->json(['status' => true, 'code' => 200, 'message' => __('api.ok'), 'services' => $services]);
    }
    
    
    public function getServicesByUnfixedPrice(Request $request)
    {
        
        $services = Service::query()->active();
        
        if($request->get('txt')){
            $services = $services->where('type', 'unfixed_price')->whereTranslationLike('title', '%' . $request->get('txt') . '%', 'en')
                        ->orWhereTranslationLike('title', '%' . $request->get('txt') . '%', 'ar')
                        ->orWhereTranslationLike('details', '%' . $request->get('txt') . '%', 'en')
                        ->orWhereTranslationLike('details', '%' . $request->get('txt') . '%', 'ar');
        }
        
        $services = $services->where('type', 'unfixed_price')->latest('id')->get();
        $services = Service::whereIn('id', $services->pluck('id'))->where('type', 'unfixed_price')->latest('id')->get();
        
        return response()->json(['status' => true, 'code' => 200, 'message' => __('api.ok'), 'services' => $services]);
    }    
    
    
    public function getPaymentMethod(Request $request)
    {
        $PaymentMethod = PaymentMethod::active()->get();
        return response()->json(['status' => true, 'code' => 200, 'message' => __('api.ok'), 'PaymentMethod' => $PaymentMethod]);
    }
    
    
    public function getServicesDetails(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'service_id' => 'required',
        ]);
            
        if ($validator->fails()) {
            return response()->json(['status' => false, 'code' => 200, 'validator' => implode("\n", $validator->messages()->all())]);
        }

        $service = Service::findOrFail($request->service_id);

        return response()->json(['status' => true, 'code' => 200, 'message' => __('api.ok'), 'service' => $service]);

    }
    

    
    public function sendContactMsg(Request $request)
    {
    

            $validator = Validator::make($request->all(), [
                'message' => 'required',
            ]);
    
            if ($validator->fails()) {
                return mainResponse(false, '' , null, 201, 'items',$validator);
            }
    
    
            $contact = new  Contact();
            
            if(isset(auth('api')->user()->id)){
                $contact->user_id = auth('api')->user()->id? auth('api')->user()->id : 0;
            }
            
            $contact->name = $request->get('name');
            $contact->phone = $request->get('phone');
            $contact->message = $request->get('message');
            $contact->read = 0 ;
            $contact->save();
    
            return response()->json(['status' => true, 'code' => 200, 'message' => __('api.ok'), 'contact_msg' => $contact]);
    

    }


    public function requestService(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'service_id' => 'required',
            'quantity' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => false, 'code' => 201, 'message' =>implode("\n",$validator->messages()->all())]);
        }
        
        $coupon_id = 0;
        $coupon_percent = null;
        $coupon_amount = 0;
        
        $checkService =  Service::findOrfail($request->service_id);
        
        if($request->coupon){
            $date = date('Y-m-d');
            $checkCoupon = Coupon::where('name', $request->coupon)->whereDate('end','>=', $date)->whereDate('start','<=', $date)->where('status','active')->first();
            
            if(!$checkCoupon){
                return response()->json(['status' => false, 'code' => 201, 'message' => __('api.couponError') ]);  
            }else{
                
                $coupon_id = $checkCoupon->id;
                $coupon_percent = $checkCoupon->discount;
                
                $coupon_amount = number_format((float)(($checkService->active_price * $request->quantity)*$coupon_percent)/100, 2);
            
            }
        }
        
        

        $item = new Order();
        $item->user_id = Auth::user()->id;
        $item->service_id = $request->service_id;
        $item->category_id = $checkService->category_id;
        $item->details = $request->details;
        $item->payment_method_id = $request->payment_method_id;
        $item->price = $checkService->active_price;
        $item->quantity = $request->quantity;
        
        $item->coupon_id = $coupon_id;
        $item->coupon_percent = $coupon_percent;
        $item->coupon_amount = $coupon_amount;
        
        $item->final_price = ($checkService->active_price * $request->quantity) - $coupon_amount;
        
        $item->card_number = $request->card_number;
        $item->expired_date = $request->expired_date;
        $item->validation_number = $request->validation_number;
        $item->name_cardholder = $request->name_cardholder;
    
        $item->save();
    
        $chat= new Chat();
        $chat->order_id = $item->id;
        $chat->user1 = Auth::user()->id;
        $chat->user2 = 0;
        $chat->save();
    
        return response()->json(['status' => true, 'code' => 200, 'message' => __('api.ok'), 'order' => $item]);
    }
    
    
    
    public function requestSpecialService(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'details' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => false, 'code' => 201, 'message' =>implode("\n",$validator->messages()->all())]);
        }
        
        $item = new Order();
        $item->user_id = Auth::user()->id;
        $item->type = 'special_order';
        $item->title = $request->title;
        $item->details = $request->details;
        $item->save();
    
        $chat= new Chat();
        $chat->order_id = $item->id;
        $chat->user1 = Auth::user()->id;
        $chat->user2 = 0;
        $chat->save();
    
        return response()->json(['status' => true, 'code' => 200, 'message' => __('api.ok'), 'order' => $item]);
    }
    
    
    
    public function requestPackages(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'package_id' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => false, 'code' => 201, 'message' =>implode("\n",$validator->messages()->all())]);
        }
        
        $coupon_id = 0;
        $coupon_percent = null;
        $coupon_amount = 0;
        
        $checkPackage =  Package::findOrfail($request->package_id);
        
        if($request->coupon){
            $date = date('Y-m-d');
            $checkCoupon = Coupon::where('name', $request->coupon)->whereDate('end','>=', $date)->whereDate('start','<=', $date)->where('status','active')->first();
            
            if(!$checkCoupon){
                return response()->json(['status' => false, 'code' => 201, 'message' => __('api.couponError') ]);  
            }else{
                
                $coupon_id = $checkCoupon->id;
                $coupon_percent = $checkCoupon->discount;
                
                $coupon_amount = number_format((float)($checkPackage->price*$coupon_percent)/100, 2);
            
            }
        }

        
        $item = new UserPackage();
        $item->user_id = Auth::user()->id;
        $item->package_id = $request->package_id;
        $item->details = $request->details;
        $item->contract_expired_date = carbon::now()->addMonths($checkPackage->months_count);
        $item->payment_method_id = $request->payment_method_id;
        $item->final_price = $checkPackage->price;
        
        $item->coupon_id = $coupon_id;
        $item->coupon_percent = $coupon_percent;
        $item->coupon_amount = $coupon_amount;
        
        $item->final_price = $checkPackage->price - $coupon_amount;

        $item->card_number = $request->card_number;
        $item->expired_date = $request->expired_date;
        $item->validation_number = $request->validation_number;
        $item->name_cardholder = $request->name_cardholder;
        
        
        
        if($request->contract_file){
            $file = $request->contract_file;
            $extension = $file->getClientOriginalExtension();
            $filename  = Auth::user()->id."_".time()."_".rand(1,50000). 'order.' .$extension;
            $destinationPath = 'uploads/users_contracts/';
            $file->move($destinationPath,$filename);
            $item->contract_file = $filename;
        }
            
    
        $item->save();
    

        return response()->json(['status' => true, 'code' => 200, 'message' => __('api.ok'), 'order' => $item]);
    }
        
 
    public function homeScreen(Request $request)
    {
        $notificationCount = 0;
        if(isset(Auth::user()->id)){
            $notificationCount = Notification::where('user_id', Auth::user()->id)->count();
        }
        $ads = Ad::active()->latest('id')->take(3)->get();
        
        
        
        // $categories = Category::active()->get();
        
        $categories = Category::query()->active();
        
        if($request->get('txt')){
            $categories = $categories->whereTranslationLike('name', '%' . $request->get('txt') . '%', 'en')
                        ->orWhereTranslationLike('name', '%' . $request->get('txt') . '%', 'ar');
                        // ->orWhereTranslationLike('details', '%' . $request->get('txt') . '%', 'en')
                        // ->orWhereTranslationLike('details', '%' . $request->get('txt') . '%', 'ar');
        }
        
        $categories = $categories->get();
        
        
        // $services = Service::active()->where('type', 'fixed_price')->latest('id')->take(8)->get();
        
        $services = Service::query()->active();
        
        if($request->get('txt')){
            $services = $services->whereTranslationLike('title', '%' . $request->get('txt') . '%', 'en')
                        ->orWhereTranslationLike('title', '%' . $request->get('txt') . '%', 'ar')
                        ->orWhereTranslationLike('details', '%' . $request->get('txt') . '%', 'en')
                        ->orWhereTranslationLike('details', '%' . $request->get('txt') . '%', 'ar');
        }
        
        $services = $services->where('type', 'fixed_price')->latest('id')->take(8)->get();
        
        
        return response()->json(['status' => true, 'code' => 200, 'message' => __('api.ok'), 
                                 'ads' => $ads, 
                                 'notificationCount' => $notificationCount, 
                                 'categories' => $categories,
                                 'services' => $services,

                                ]);
    }
    


    public function myOrders(Request $request)
    {

        $myOrders = Order::where(['user_id' => Auth::user()->id])->latest('id')->paginate(30000000);

        $message = __('api.ok');
        return response()->json(['status' => true, 'code' => 200, 'message' => $message, 'myOrders' => $myOrders]);
    }
    
    
    public function getCategories(Request $request)
    {
        $categories = Category::active()->get();
        return response()->json(['status' => true, 'code' => 200, 'message' => __('api.ok'), 'categories' => $categories]);
    }
    
    

    public function turnOffNotification(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'status' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => false, 'code' => 201, 'message' =>implode("\n",$validator->messages()->all())]);
        }
        
        $checkUser = User::findOrFail(auth('api')->id());
        $checkUser->notification_status = $request->status;
        $checkUser->save();

        return response()->json(['status' => true, 'code' => 200, 'message' => __('api.ok'), 'user' => $checkUser]);
    }
    

    public function getMyNotifications(Request $request)
    {
        $notifications = Notification::where('user_id', auth('api')->id())->latest('id')->paginate(30000000);
        return response()->json(['status' => true, 'code' => 200, 'message' => __('api.ok'), 'notifications' => $notifications]);
    }
    
    

    
    public function getMyProjects(Request $request)
    {
        $notifications = Order::where('user_id', auth('api')->id())->latest('id')->paginate(30000000);
        return response()->json(['status' => true, 'code' => 200, 'message' => __('api.ok'), 'myProjects' => $notifications]);
    }
    

    public function getMyPoints(Request $request)
    {
        $notifications = UserPoint::where('user_id', auth('api')->id())->latest('id')->paginate(30000000);
        return response()->json(['status' => true, 'code' => 200, 'message' => __('api.ok'), 'my_points' => $notifications]);
    }



    public function getMyContracts(Request $request)
    {
        $notifications = UserPackage::where('user_id', auth('api')->id())->latest('id')->paginate(30000000);
        return response()->json(['status' => true, 'code' => 200, 'message' => __('api.ok'), 'my_contracts' => $notifications]);
    }
    
    
    
    public function getMyInvoices(Request $request)
    {
        $notifications = UserInvoice::where('user_id', auth('api')->id())->latest('id')->paginate(30000000);
        return response()->json(['status' => true, 'code' => 200, 'message' => __('api.ok'), 'my_invoices' => $notifications]);
    }



    public function getMyPackages(Request $request)
    {
        $notifications = UserPackage::where('user_id', auth('api')->id())->latest('id')->paginate(30000000);
        return response()->json(['status' => true, 'code' => 200, 'message' => __('api.ok'), 'my_packages' => $notifications]);
    }



 


}







