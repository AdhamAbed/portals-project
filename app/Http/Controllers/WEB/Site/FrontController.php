<?php
namespace App\Http\Controllers\WEB\Site;
use App\Models\AboutUsGoals;
use App\Models\AboutUsReasons;
use App\Models\applyJob;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Consultant;
use App\Models\Contact;
use App\Models\CourseComments;
use App\Models\CourseLikes;
use App\Models\CoursesContent;
use App\Models\Customer;
use App\Models\Faq;
use App\Models\Feature;
use App\Models\Notification;
use App\Models\Partner;
use App\Models\PrivateCoursesRequest;
use App\Models\Project;
use App\Models\ProjectGallery;
use App\Models\SliderImages;
use App\Models\socialMedia;
use App\Models\UsersCourse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Response;
use Socialite;

use App\User;
use App\Admin;
use App\Models\Country;


use App\Models\Language;
use App\Models\Setting;
use App\Models\Event;
use App\Models\Post;
use App\Models\Article;
use App\Models\Course;
use App\Models\Donor;
use App\Models\Association;
use App\Models\Page;
use App\Models\ResearchStudy;
use App\Models\Ambassador;
use App\Models\City;
use App\Models\CourseCategory;
use App\Models\ConsultationCategory;
use App\Models\Consultation;


use Carbon\Carbon;

use Twilio;
use QrCode;
use Image;
use Session;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\App;


class FrontController extends Controller
{


    public function __construct()
    {
        $this->locales = Language::all();
        $this->settings = Setting::query()->first();
        $this->social = socialMedia::get();
        $this->course_categories = CourseCategory::query()->active()->take(4)->orderBy('created_at' , 'desc')->get();

        view()->share([
            'locales' => $this->locales,
            'settings' => $this->settings,
            'social' => $this->social,
            'course_categories' => $this->course_categories]);
    }

    public function MarkAsRead (Request $request)
    {

        $notification = Notification::where('notifiable_id' , auth()->user()->id)->find($request->notification_id);

        if($notification) {
            $data = json_decode($notification->data);
            $actionUrl = $data->action_url;

//            $notification->markAsRead();
            $notification->update([
                'read_at' => Carbon::now(),
            ]);
            return response()->json(['success' => true]);
//            return redirect()->to($actionUrl);
        }else{
            return response()->json(['success' => false]);
        }
    }

    public function index()
    {
        $courses = Course::query()->active()->count();
        $free_courses = Course::query()->active()->where(['price' => null])->take(4)->orderBy('created_at' , 'desc')->get();
        $paid_courses = Course::query()->active()->where('price' , '!=' , null)->take(4)->orderBy('created_at' , 'desc')->get();
        $students = User::query()->where(['type' => 'user' , 'status' => 'active'])->count();
        $categories  = Category::query()->active()->get();
        $features = Feature::active()->get();
        $headerSlider = SliderImages::where('section' , 'home_header')->get();
        $consultants = Consultant::active()->get();
        $blogs = Blog::active()->get();
        $faqs = Faq::active()->get();
        $comments = CourseComments::query()->orderBy('created_at' , 'desc')->take(10)->get();

        return view('website.index', [
            'features' => $features ,
            'free_courses' => $free_courses ,
            'paid_courses' => $paid_courses ,
            'consultants' => $consultants ,
            'blogs' => $blogs ,
            'faqs' => $faqs ,
            'categories' => $categories ,
            'courses' => $courses ,
            'students' => $students ,
            'headerSlider' => $headerSlider,
            'comments' => $comments
        ]);
    }



    public function showLoginForm()
    {

        if (Auth::user()){
            return redirect()->route('home');
        }else{
            return view('auth.login');
        }

    }
    public function showRegisterForm()
    {
        if (Auth::user()){
            return redirect()->route('home');
        }else{
            return view('auth.register');
        }
    }
    public function resetPassword()
    {
        return view('auth.reset-password');
    }
    public function loginUsers(Request $request)
    {

        $messages =  [
            'email.exists' => __('cp.The email does not match our records'),
            'password.min' => __('cp.Password must contain at least 6 letters or numbers'),
            'password.required' => __('cp.Password is required'),
        ];
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users',
            'password' => 'required|min:6',

        ] , $messages);

        if ($validator->fails()) {
//            dd($validator)
            alert()->warning(__('cp.Verify all data entered'), __('cp.Wrong'));
            return redirect()->to(route('user.login.form'))
                ->withErrors($validator)->withInput();
        }
        Auth::attempt(['email' => $request->email, 'password' => $request->password]);
        if (Auth::user()){

            if(Auth::user()->status == 'active'){
                return redirect()->route('home');
            }

            Auth::logout();
            $msg = __('website.yourAccountnotActive');
//            Session::flash("msg", "s: $msg ");
            alert()->warning($msg, __('cp.Wrong'));
//            dd('ibra2020@gmail.com');
            return redirect()->route('user.login.form')->with('sentStatus', $msg);
        }
        else{
            $msg = __('website.pleaseEnterTrueEmailAndPassword');
            alert()->warning($msg, __('cp.Wrong'));

//            Session::flash("msg", "s: $msg ");
            return redirect()->route('user.login.form')->with('sentStatus', $msg);
        }
    }

    function doLogin(Request $request)
    {

        $previousURL = url()->previous();
//        $url= explode('http://localhost/portals/public/' , $previousURL);
//        dd($url[1] ,'ddddd');
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',   // required and email format validation
            'password' => 'required', // required and number field validation

        ]); // create the validations
        if ($validator->fails())   //check all validations are fine, if not then redirect and show error messages
        {
            return response()->json($validator->errors(),422);
            // validation failed return with 422 status

        } else {
            //validations are passed try login using laravel auth attemp
            if (Auth::attempt($request->only(["email", "password"]))) {
                return response()->json(["status"=>true,"redirect_location"=> $previousURL]);

            } else {
                return response()->json([["Invalid credentials"]],422);

            }
        }
    }

    public function redirectToGoogel()
    {
        return Socialite::driver('google')->redirect();
    }

    public function lang_change(Request $request)
    {
//        dd($request->lang)
        App::setLocale($request->lang);
//        dd(app()->getLocale());
        session()->put('locale', $request->lang);
        return back();
    }

    public function googleSignin()
    {
        try {

            $user = Socialite::driver('google')->user();
            $googleId = User::where('google_id', $user->id)->first();

            if($googleId){
                if(Auth::user()->status == 'active'){
                    return redirect()->route('home');
                }else{
                    Auth::login($googleId);
                    return redirect('/home');
                }

            }else{

//                $token = $user->token;
//                $refreshToken = $user->refreshToken;
//                $expiresIn = $user->expiresIn;

                $createUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'image' => $user->avatar,
                    'google_id' => $user->id,
                    'password' => encrypt('Test123')
                ]);

                Auth::login($createUser);
                return redirect('/home');
            }

        } catch (\Exception $exception) {
            dd($exception->getMessage());
        }
    }






    public function allCourses()
    {

        $courses_categories = CourseCategory::active()->get();

        foreach($courses_categories as $one){
            $one->courses = Course::where('course_category_id', $one->id)->latest('id')->take(4)->get();
        }

        return view('website.pages.allCourses', ['courses_categories' => $courses_categories]);
    }


    public function courseByCategory($id)
    {

        $courses_categories = CourseCategory::active()->get();
        $category = CourseCategory::findOrFail($id);
        $courses = Course::where('course_category_id', $id)->latest('id')->get();

        return view('website.pages.courseByCategory', ['courses_categories' => $courses_categories, 'category' => $category, 'courses' => $courses]);
    }



    public function courseDetails($id)
    {
        $item = Course::findOrFail($id);
        $courses_categories = CourseCategory::active()->get();
        return view('website.pages.courseDetails', ['item' => $item, 'courses_categories' => $courses_categories]);
    }

    public function pageDetails($id)
    {
        $item = Page::findOrFail($id);
        return view('website.pages.pageDetails', ['item' => $item]);
    }



    public function userProfile()
    {
        return view('website.pages.userProfile');
    }



    public function editProfile()
    {
        $checkUser = Admin::where('id', Auth::user()->id)->first();
        $countries = Country::active()->get();
        $cities = City::active()->where('country_id', 1)->get();
        return view('website.pages.editProfile', ['countries' => $countries, 'cities' => $cities]);
    }



    public function usersPortal()
    {
        return view('website.pages.usersPortal');
    }


    public function storeNewUser(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,NULL,id,deleted_at,NULL',
            'password' => 'required|min:6',
            'confirm_password' => 'required|min:6|same:password',
            'type' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = new Admin();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->type = $request->type;

        if($request->type == 'association'){
            $user->association_name = $request->association_name;
            $user->association_id = $request->association_id;

            if(isset($request->association_image)){
                $user->association_image = uploadImage($request->association_image, 'admins');
            }

        }

        $user->save();

        $msg = __('website.accountCreatedSuccessfullyWaitingApproval');
        Session::flash("msg", "s: $msg ");
        return redirect()->route('usersPortal')->with('sentStatus', $msg);
    }

    public function registerUser(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,NULL,id,deleted_at,NULL',
            'password' => 'required|min:6',
            'confirm_password' => 'required|min:6|same:password',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(),422);
        }

        $user = new User();
        $user->name = $request->first_name.$request->last_name;
        $user->email = $request->email;
        $user->type = 'user';
        $user->status = 'active';
        $user->password = Hash::make($request->password);

        $user->save();
//        Auth::login($user);
        $previousURL = url()->previous();
        if (Auth::attempt($request->only(["email", "password"]))) {
            return response()->json(["status"=>true,"redirect_location"=> $previousURL]);

        } else {
            return response()->json([["Invalid credentials"]],422);

        }


        $msg = __('website.accountCreatedSuccessfullyWaitingApproval');
        Session::flash("msg", "s: $msg ");
//        return redirect()->route('home')->with('sentStatus', $msg);
    }





    public function blog()
    {

        $setting=Setting::all();
        $items = Blog::active()->get();
        return view('website.pages.blog', [
            'items' =>$items ,
            'setting' =>$setting,
        ]);
    }
    public function show_blog($id)
    {
        $blog = Blog::find($id);
//        $similar_blogs = Blog::find($id);
        return view('website.pages.show_blog', [
            'blog' =>$blog,
//            'similar_blogs' =>$similar_blogs,
        ]);
    }


}
