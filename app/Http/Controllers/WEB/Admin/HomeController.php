<?php

namespace App\Http\Controllers\WEB\Admin;

use App\Admin;
use App\Models\Course;
use App\User;

use App\Models\Ad;

use App\Models\CompetitionRegistration;
use App\Models\Contact;
use App\Models\City;
use App\Models\Article;



use App\Models\Permission;
use App\Models\Setting;
use App\Models\Category;
use App\Models\Coupon;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;
use Response;

class HomeController extends Controller
{


    public function index()
    {
        // $admin = Admin::findOrFail(auth()->guard('admin')->user()->id);
        // $competitions_registrations  = CompetitionRegistration::latest('id')->take(9)->get();
        // $contacts  = Contact::latest('id')->take(10)->get();
        // $articles  = Article::latest('id')->take(5)->get();
        // $events  = Event::latest('id')->take(5)->get();
        // $galleries  = Gallery::latest('id')->take(5)->get();

        $coursers = Course::where('status' ,'active')->count();
        $users = User::where('status' ,'active')->count();
        $categories = Category::where('status' ,'active')->count();
        return view('admin.home.dashboard' , ['coursers' =>$coursers ,'users' =>$users , 'categories' =>$categories]);
    }

    public function lang_change(Request $request)
    {
//        dd($request->lang)
        App::setLocale($request->lang);
//        dd(app()->getLocale());
        session()->put('locale', $request->lang);
        return back();
    }


    public function changeStatus($model,Request $request)
    {
        $role = "";

        if($model == "users") $role = 'App\Admin';
        if($model == "posts") $role = 'App\Models\Post';
        if($model == "articles") $role = 'App\Models\Article';
        if($model == "events") $role = 'App\Models\Event';
        if($model == "initiatives") $role = 'App\Models\Event';
        if($model == "courses") $role = 'App\Models\Course';
        if($model == "courses_categories") $role = 'App\Models\CourseCategory';
        if($model == "research_studies") $role = 'App\Models\ResearchStudy';
        if($model == "associations") $role = 'App\Admin';
        if($model == "donors") $role = 'App\Models\Donor';
        if($model == "ambassadors") $role = 'App\Admin';
        if($model == "consultations_categories") $role = 'App\Models\ConsultationCategory';
        if($model == "consultations") $role = 'App\Models\Consultation';
        if($model == "admins") $role = 'App\Admin';
        if($model == "customers") $role = 'App\Models\Customer';
        if($model == "locations") $role = 'App\Models\Location';
        if($model == "branches") $role = 'App\Models\Branch';
        if($model == "categories") $role = 'App\Models\Category';
        if($model == "partners") $role = 'App\Models\Partner';
        if($model == "projects") $role = 'App\Models\Project';
        if($model == "faqs") $role = 'App\Models\Faq';
        if($model == "schedule_courses") $role = 'App\Models\ScheduleCourse';
        if($model == "contact") $role = 'App\Models\Contact';
        if($model == "apply_jobs") $role = 'App\Models\applyJob';
        if($model == "features") $role = 'App\Models\Feature';
        if($model == "consultants") $role = 'App\Models\Consultant';
        if($model == "blogs") $role = 'App\Models\Blog';
        if($model == "sliders") $role = 'App\Models\SliderImages';
        if($model == "trainers") $role = 'App\Models\Trainer';
        if($model == "lessons") $role = 'App\Models\Lesson';
        if($model == "units") $role = 'App\Models\Unit';
        if($model == "course_statistics") $role = 'App\Models\CourseStatistics';



        if($model == "roles") $role = 'App\Models\Role';




        if($role !=""){
             if ($request->action == 'delete') {
                $role::query()->whereIn('id', $request->IDsArray)->delete();
            }
            else {
                if($request->action) {
                    $role::query()->whereIn('id', $request->IDsArray)->update(['status' => $request->action]);
                }
            }

            return $request->action;
        }
        return false;


    }



    public function getCities($id){
        return City::where(['country_id' => $id, 'status' => 'active'])->get();
    }

    public function getCountries(){
        return Country::where(['status' => 'active'])->get();
    }



}
