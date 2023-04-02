<?php
namespace App\Http\Controllers\WEB\Site;
use App\Models\Country;
use App\Models\CourseCategory;
use App\Models\CourseLikes;
use App\Models\CoursesContent;
use App\Models\socialMedia;
use App\Models\UsersCourse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Response;
use Image;
use Session;
use App\Models\Language;

use App\Models\Setting;
use App\User;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Auth;


class UserProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware(['auth']);
        $this->locales = Language::all();
        $this->settings = Setting::query()->first();
        $this->social = socialMedia::get();
        $this->course_categories = CourseCategory::query()->active()->take(4)->orderBy('created_at', 'desc')->get();

        view()->share([
            'locales' => $this->locales,
            'settings' => $this->settings,
            'social' => $this->social,
            'course_categories' => $this->course_categories]);
    }

    public function profile()
    {
        $countries = Country::active()->get();
        return view('website.pages.profile' , ['countries' => $countries]);
    }

    public function change_password()
    {
        $user = auth()->user();
        return view('website.pages.change_password' , ['user' => $user]);
    }
    public function save_password(Request $request)
    {
        $messages =  [
            'password.required' => __('cp.Password is required'),
            'confirm_password.required' => __('cp.Confirm password is required'),
            'confirm_password.same' => __('cp.Confirm password must be same new password'),
        ];
        $validator = Validator::make($request->all(), [
            'password' => 'required|min:6',
            'confirm_password' => 'required|min:6|same:password',

        ] , $messages);

        if ($validator->fails()) {
//            dd($validator)
            alert()->warning(__('cp.Verify all data entered'), __('cp.Wrong'));
            return redirect()->to(route('user.change_password'))
                ->withErrors($validator)->withInput();
        }

        $user = User::where('id', Auth::user()->id)->first();
        $user->password = bcrypt($request->password);
        $user->save();

        alert()->success(__('cp.Your data has been modified successfully'), __('cp.It was completed'));
        return redirect()->route('user.change_password');
    }


    public function update_profile_information(Request $request)
    {
        $user_id = (int) auth()->user()->id;
        $messages =  [
            'email.unique' => __('cp.Email already exists'),
            'email.required' => __('cp.Email is required'),
            'email.email' => __('cp.Email must be correct email'),
            'name.required' => __('cp.Name is required'),
        ];
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:users,email,'.$user_id,
            'name' => 'required',
//            'phone' => 'required',

        ] , $messages);

        if ($validator->fails()) {
//            dd($validator)
            alert()->warning(__('cp.Verify all data entered'), __('cp.Wrong'));
            return redirect()->to(route('user.profile'))
                ->withErrors($validator)->withInput();
        }

        $checkUser = User::where('id', Auth::user()->id)->first();
        $checkUser->name = $request->name;
        $checkUser->phone = $request->phone;
        $checkUser->email = $request->email;
        $checkUser->job_title = $request->job_title;
        if ($request->hasFile('image')) {
            $logo = $request->file('image');
            $extention = $logo->getClientOriginalExtension();
            $file_name = rand(1000000, 9999999) . "" . time() . "_" . rand(1000000, 9999999) . "." . $extention;
            Image::make($logo)->save("uploads/users/".$file_name);
            $checkUser->image = $file_name;

        }
        alert()->success(__('cp.Your data has been modified successfully'), __('cp.It was completed'));
        $checkUser->save();
        return redirect()->route('user.profile');
    }



    public function change_profile_img(Request $request)
    {

        $user = User::findOrFail(auth()->user()->id);
        if ($request->hasFile('image')) {
            $logo = $request->file('image');
            $extention = $logo->getClientOriginalExtension();
            $file_name = rand(1000000, 9999999) . "" . time() . "_" . rand(1000000, 9999999) . "." . $extention;
            Image::make($logo)->save("uploads/users/".$file_name);
            $user->image = $file_name;
        }
        if ($user->save()){
            alert()->success('تم تعديل الصورة الشخصية بنجاح', 'تم');
        }else{
            alert()->success('لم يتم تعديل الصورة الشخصية', 'خطأ');
        }


        return redirect()->route('user.profile');

    }

    public function my_courses()
    {
        $courses = UsersCourse::where('user_id', auth()->user()->id)->latest('id')->get();
//        $imgsIds = $item->photos->pluck('id')->toArray();
//        $courses = Course::active()->latest('id')->get();
//           dd($courses->myCourses);


        return view('website.pages.myCourses' , ['courses' => $courses]);
    }
    public function my_favorite()
    {
        $courses = CourseLikes::where(['user_id' => auth()->user()->id , 'like' => 2])->latest('id')->get();


        return view('website.pages.myFavorite' , ['courses' => $courses]);
    }
    public function add_favorite(Request $request,$id)
    {
        $existing_like = CourseLikes::where(['user_id' => auth()->user()->id , 'course_id' => $id])->first();

        if (!isset($existing_like)) {
            $like = CourseLikes::create([
                'user_id' => auth()->user()->id,
                'course_id' => $id,
                'like' => 2, //if ==2 is favorite else it luke
            ]);

            $data = [
                'status'=>true,
                'statusCode'=>200,
                'message'=>'like',
                'items'=>$like,
            ];
            alert()->success('تم اضافة الدورة الى المفضلة بنجاح', 'تم');
        } else{
            $existing_like->delete(); // في حالة بعتت id مخزن مسبقا هيقوم بحذفه مباشرة (هادي الطريقة الاحسن)

            alert()->success('تم حذف الدورة من المفضلة', 'تم');
            $data = [
                'status'=>true,
                'statusCode'=>200,
                'message'=>'unlike',
                'items'=>[],
            ];
        }
//        return response()->json($data);


//        return response()->json(['success'=>$response]);
        return redirect()->back();
    }

    public function showCourse(Request $request)
    {
        $courses = UsersCourse::where('user_id', auth()->user()->id);

        $coursesContent = CoursesContent::all();
        $search = $request->get('search', false);

//        dd($coursesContent);
        $coursesContent = DB::table('courses_content')->select('courses_content.*', 'courses_content_translations.content_title')->leftJoin('courses_content', 'courses_content_translations.courses_content_id', '=', 'courses_content.id');

        if ($search) {
            $coursesContent = $coursesContent->where(function ($query) use ($search) {
                $query->where('courses_content.id', 'like', '%' . $search . '%')
                ->orWhere('courses_content_translations.content_title', '%' . $search . '%');
//                    ->orWhereTranslationLike('content_title', '%' . $search . '%', 'en')
//                    ->orWhereTranslationLike('content_description', '%' . $search . '%', 'ar')
//                    ->orWhereTranslationLike('content_description', '%' . $search . '%', 'en')
//                    ->orWhere('id', 'like', '%' . $search . '%');
            })->orderBy('id' , 'desc')->get();
        }
        dd($coursesContent);
        return view('website.pages.myCourses' , ['courses' => $courses]);

    }



}
