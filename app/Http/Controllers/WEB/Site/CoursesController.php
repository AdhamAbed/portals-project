<?php

namespace App\Http\Controllers\WEB\Site;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Country;
use App\Models\Course;
use App\Models\CourseCategory;
use App\Models\CourseComments;
use App\Models\CourseDate;
use App\Models\CoursesContent;
use App\Models\Faq;
use App\Models\Language;
use App\Notifications\CoursesNotifications;
use Notification;
use App\Models\PaidCourse;
use App\Models\ScheduleCourse;
use App\Models\Setting;
use App\Models\socialMedia;
use App\Models\UsersCourse;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Session;
use Stripe;

class CoursesController extends Controller
{
    public function __construct()
    {
        Carbon::setLocale('ar');
        $this->locales = Language::all();
        $this->settings = Setting::query()->first();
        $this->social = socialMedia::get();
        $this->course_categories = CourseCategory::query()->active()->take(4)->orderBy('created_at' , 'desc')->get();


        view()->share([
            'locales' => $this->locales,
            'settings' => $this->settings,
            'social' => $this->social,
            'course_categories' => $this->course_categories,
        ]);
    }


    public function courses()
    {
        $courses_categories = CourseCategory::active()->get();

        $courses = Course::active()->orderBy('updated_at', 'desc')->get();
//        $courses = Course::where(['public_private' => 'public'])->active()->latest('id')->get();
        return view('website.pages.courses', ['courses' => $courses, 'courses_categories' => $courses_categories]);
    }

    public function categoryCourses($id)
    {
        $course_category = CourseCategory::find($id);

        $courses = Course::where(['course_category_id' => $id])->active()->latest('id')->get();

        return view('website.pages.coursesByCategory', ['courses' => $courses, 'course_category' => $course_category]);
    }

    public function onlineCourses()
    {
        $courses_categories = CourseCategory::active()->get();

        $courses = Course::where(['type' => 'online', 'public_private' => 'public'])->active()->latest('id')->get();
        return view('website.pages.onlineCourses', ['courses' => $courses, 'courses_categories' => $courses_categories]);
    }

    public function categoryOnlineCourses($id)
    {
        $course_category = CourseCategory::find($id);

        $courses = Course::where(['type' => 'online', 'public_private' => 'public', 'course_category_id' => $id])->active()->latest('id')->get();
        $scheduleCourses = ScheduleCourse::query()->active()->where(['course_id' => $id])->get();


        return view('website.pages.categoryOnlineCourses', ['courses' => $courses, 'course_category' => $course_category, 'scheduleCourses' => $scheduleCourses]);
    }

    public function selfLearningCourses()
    {
        $courses_categories = CourseCategory::active()->get();

        $courses = Course::where(['type' => 'live', 'public_private' => 'public'])->active()->latest('id')->get();


        return view('website.pages.selfLearningCourses', ['courses' => $courses, 'courses_categories' => $courses_categories]);
    }

    public function categorySelfLearningCourses($id)
    {
        $course_category = CourseCategory::find($id);

        $courses = Course::where(['type' => 'live', 'public_private' => 'public', 'course_category_id' => $id])->active()->latest('id')->get();
        $scheduleCourses = ScheduleCourse::query()->active()->where(['course_id' => $id])->get();

        return view('website.pages.categorySelfLearningCourses', ['courses' => $courses, 'course_category' => $course_category, 'scheduleCourses' => $scheduleCourses]);
    }


    public function view_course($id)
    {
        $course = Course::find($id);
        $course->update(['views_count' => $course->views_count + 1]);
//        dd($course->reviews);
        $courseContents = CoursesContent::where('course_id', $id)->get();
        $courseDates = CourseDate::where('course_id', $id)->latest('id')->first();
//        dd($courseDates);
        $coursesChoose = Course::where(['course_category_id' => $course->course_category_id])
            ->where('id', '!=', $id)
            ->active()->latest('id')->take(5)->get();
        $faqs = Faq::active()->get();

        $scheduleCourses = ScheduleCourse::query()->active()->where(['course_id' => $id])
            ->orderBy('course_date', 'desc')->get();

        $comments = CourseComments::where('course_id', $id)->orderBy('id', 'desc')->get();
        $main_comments = [];
        $items = [];

        $temp = 0;

        foreach ($comments as $comment) {

            $items [] = $comment;

            if (count($items) == 6) {
                $main_comments[] = $items;
                $items = [];
            }

            if ($temp++ == count($comments) - 1 && count($items) > 0) {
                $main_comments[] = $items;
            }
        }

//        $coursesChoose = Course::where(['type' =>$course->type , 'course_category_id' =>$course->course_category_id])->active()->latest('id')->get();
        return view('website.pages.view_course',
            ['course' => $course,
                'faqs' => $faqs,
                'courseDates' => $courseDates,
                'coursesChoose' => $coursesChoose,
                'courseContents' => $courseContents,
                'comments' => $comments,
                'scheduleCourses' => $scheduleCourses,
                'main_comments' => $main_comments,
            ]);
    }


    public function view_course_register($id)
    {
        $course = Course::find($id);
        $countries = Country::active()->get();
        return view('website.pages.course_register', ['course' => $course, 'countries' => $countries]);
    }

    public function course_register(Request $request, $id)
    {
//        $user_id = (int) auth()->user()->id;
        if (auth()->user()) {
            $user_id = (int)auth()->user()->id;

            $messages = [
                'name.required' => 'الاسم مطلوب',
                'email.required' => 'البريد الإلكتروني مطلوب',
                'email.unique' => 'البريد الإلكتروني موجود مسبقا',
                'phone.required' => 'رقم الجوال مطلوبة',

            ];
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'email' => 'required|email|unique:users,email,' . $user_id,
                'phone' => 'required',

            ], $messages);

            if ($validator->fails()) {
//            dd($validator)
                alert()->warning('تأكد من جميع البيانات المدخلة', 'خطـأ');
                return redirect()->to(route('view_course_register', $id))
                    ->withErrors($validator)->withInput();
            }

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'gender' => $request->gender,
                'job_title' => $request->job_title,
                'company_name' => $request->company_name,
                'phone' => $request->phone,
                'country_id' => $request->country_id,

            ]);
            $data = UsersCourse::create([
                'user_id' => $user->id,
                'course_id' => $request->course_id,
            ]);
            $course = Course::find($id);
            return view('website.pages.course_pay', ['data' => $data, 'course' => $course]);
        } else {
            return view('auth.login');
        }
    }

    public function course_pay($id)
    {
        $course = Course::find($id);
        return view('website.pages.course_pay', ['course' => $course]);
    }

    public function my_courses()
    {
        if (Auth::check()){
            $user =  User::find(\auth()->user()->id);
            $paid_courses = $user->paid_courses;

            return view('website.pages.my_courses', ['paid_courses' => $paid_courses]);
        }else{
            return redirect()->back();
        }
    }
    public function my_course($id)
    {

        if (Auth::check()){
//        $course = Course::find($id);
        $course = Course::where('id', $id)->whereHas('paid_courses')->first();
        if ($course != null){

        $courseContents = CoursesContent::where('course_id', $id)->get();
        $courseDates = CourseDate::where('course_id', $id)->latest('id')->first();
//        dd($courseDates);
        $coursesChoose = Course::where(['course_category_id' => $course->course_category_id])
            ->where('id', '!=', $id)
            ->active()->latest('id')->take(5)->get();
        $faqs = Faq::active()->get();

        $scheduleCourses = ScheduleCourse::query()->active()->where(['course_id' => $id])
            ->orderBy('course_date', 'desc')->get();

        $comments = CourseComments::where('course_id', $id)->orderBy('id', 'desc')->get();
        $main_comments = [];
        $items = [];

        $temp = 0;

        foreach ($comments as $comment) {

            $items [] = $comment;

            if (count($items) == 6) {
                $main_comments[] = $items;
                $items = [];
            }

            if ($temp++ == count($comments) - 1 && count($items) > 0) {
                $main_comments[] = $items;
            }
        }
        }else{
            return redirect()->back();
        }
        }

//        $coursesChoose = Course::where(['type' =>$course->type , 'course_category_id' =>$course->course_category_id])->active()->latest('id')->get();
        return view('website.pages.my_course',
            ['course' => $course,
                'faqs' => $faqs,
                'courseDates' => $courseDates,
                'coursesChoose' => $coursesChoose,
                'courseContents' => $courseContents,
                'comments' => $comments,
                'scheduleCourses' => $scheduleCourses,
                'main_comments' => $main_comments,
            ]);
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function cart()
//    public function cart(Request $request)
    {
//        $request->session()->forget('cart');

        $cart = session()->get('cart', []);
        $cartA = Cart::get();
        $cart_collection = collect($cart);
        $cart_total_price = $cart_collection->sum('price');

//        dd($cart , $cartA, $cartP );
        $coursesChoose = Course::active()
//           ->where(['course_category_id' =>$course->course_category_id])
            ->active()->latest('id')->take(4)->get();
        return view('website.pages.cart', compact('coursesChoose', 'cart_total_price'));
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function addToCart($id)
    {
        $course = Course::findOrFail($id);

        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "course_id" => $course->id,
                "name" => $course->title,
                "quantity" => 1,
                "price" => $course->price,
                "image" => $course->image
            ];
        }
        if (Auth::check()) {
//        if (auth()->user()){
            if ($course->discount != '' && $course->price_after_discount != '') {
                $price = $course->price_after_discount;
            } else {
                $price = $course->price;
            }
            $auth_cart = Cart::create([
                'course_id' => $course->id,
                'user_id' => auth()->user()->id,
                'price' => $price,
            ]);
        }

        session()->put('cart', $cart);

        $cart_count = count($cart);
        return response()->json(['added' => $cart, 'count_cart' => $cart_count], 200);
//        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function updateCart(Request $request)
    {
        if ($request->id && $request->quantity) {
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart updated successfully');
        }
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function removeFromCart(Request $request)
    {
        if ($request->id) {
            $cart = session()->get('cart');
            if (isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }

            $cart_count = count($cart);
            session()->flash('success', 'Course removed successfully');


            if (Auth::check()) {
                $course = Cart::where([
                    'course_id' => $request->id,
                    'user_id' => auth()->user()->id
                ])->delete();
            }

            return response()->json(['added' => $cart, 'count_cart' => $cart_count], 200);
        }
    }

    public function cart_checkout()
    {
        $cart = session()->get('cart', []);
        $courses_ids = collect($cart);
        $price = $courses_ids->sum('price');
        $stripeKey = env('STRIPE_KEY');
        return view('website.pages.cart_checkout', compact('price', 'courses_ids','stripeKey'));
    }


    public function stripeCheckout(Request $request)
    {
        if (Auth::check()) {
            try {
                Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
                Stripe\Charge::create([
                    "amount" => $request->price * 100,
                    "currency" => "usd",
                    "source" => $request->stripeToken,
                    "description" => "Payment from training portals",
                ]);
            } catch (Stripe\Exception\CardException $e) {
                // Catch the card exception and return an error message to the user
                $error = $e->getError();
                $settings = Setting::query()->first();
                $message = $error['message'].' <a target="_blank" href="https://wa.me/.'.$settings->whatsapp.'.">Call us</a>';
//                alert()->success($message, 'error');
                alert()->warning( $message, 'error')->html()->autoClose(80000);
                return redirect()->back()->with('error', $message);
            }
            $user = User::find(auth()->user()->id);

            $courses = $request->get('course');
            $course_price = $request->get('course_price');
            if (isset($courses)) {
                foreach ($courses as $key => $course) {
                    $Paid_course = PaidCourse::create([
                        'course_id' => $course,
                        'user_id' => auth()->user()->id,
                        'price' => $request->course_price[$key],
                    ]);

                    $mail_details = [
                        'greeting' => 'Hi '.$user->name,
                        'body' => 'You are pay new course',
                        'thanks' => 'Thank you for using our site',
                        'actionText' => 'Course url',
                        'actionURL' => route('my_course' , $course),
                        'course_id' => $course
                    ];
                    $database_details = [
                        'title' => 'You are pay new course',
                        'action_url' => route('my_course' , $course),
                        'course_id' => $course
                    ];

                    $user->notify(new CoursesNotifications($mail_details , $database_details));
                }

            }

            $cart = session()->get('cart');
            Session::forget('cart');

//            Session::flush($cart);
            if (Auth::check()) {
                $course = Cart::where([
                    'user_id' => auth()->user()->id
                ])->delete();
            }

            Session::flash('success', 'Payment successful!');
//            alert()->success('Payment successful!', 'Success');
            alert()->success( 'Payment successful!', 'Success')->autoClose(80000);
//            alert()->success( admin('Your request has been submitted successfully, we will contact you soon by your email'),  admin('Done'))->autoClose(8000);


            return redirect()->route('my_courses');
//            return redirect()->route('cart_checkout');
        } else {
            return redirect()->route('user.login.form');
        }
    }

    public function course_checkout($course_id)
    {

        $course = Course::find($course_id);
        $stripeKey = env('STRIPE_KEY');

        return view('website.pages.course_checkout', compact('course' , 'stripeKey'));
    }

    public function courseStripeCheckout(Request $request)
    {
        if (Auth::check()) {
//            Stripe\Stripe::setApiKey('sk_test_51KDqR1HS92ieJeDHcX1GM2d1mgwV1MZSzOts1VoSbUUn1s2MkhNNeddSSSSpORRexrh3RQOIU2tOI5Rstnro4w6E00mpp4u5cG');
            try {
                Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
                Stripe\Charge::create([
                    "amount" => $request->price * 100,
                    "currency" => "usd",
                    "source" => $request->stripeToken,
                    "description" => "Payment from training portals",
                ]);
            } catch (Stripe\Exception\CardException $e) {
                // Catch the card exception and return an error message to the user
                $error = $e->getError();
                $settings = Setting::query()->first();
                $message = $error['message'].' <a target="_blank" href="https://wa.me/.'.$settings->whatsapp.'.">Call us</a>';
                return redirect()->back()->with('error', $message);
            }

            $user = User::find(auth()->user()->id);

            $Paid_course = PaidCourse::create([
                'course_id' => $request->course_id,
                'user_id' => auth()->user()->id,
                'price' => $request->price,
            ]);

            Session::flash('success', 'Payment successful!');

            $mail_details = [
                'greeting' => 'Hi '.$user->name,
                'body' => 'You are pay this course',
                'thanks' => 'Thank you for using our site',
                'actionText' => 'Course url',
                'actionURL' => route('my_course' , $request->course_id),
                'course_id' => $request->course_id
            ];
            $database_details = [
                'title' => 'You are pay this course',
                'action_url' => route('my_course' , $request->course_id),
                'course_id' => $request->course_id
            ];

            $user->notify(new CoursesNotifications($mail_details , $database_details));
//            alert()->success('Payment successful!', 'Success');
            alert()->success( 'Payment successful!', 'Success')->autoClose(80000);

            return redirect()->route('my_course' , $request->course_id);
//            return redirect()->route('checkout');

        } else {
            return redirect()->route('user.login.form');
        }
    }

}

