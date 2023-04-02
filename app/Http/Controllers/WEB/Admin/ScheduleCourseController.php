<?php

namespace App\Http\Controllers\WEB\Admin;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\Course;
use App\Models\CourseCategory;
use App\Models\Location;
use App\Models\ScheduleCourse as TargetModel;
use App\Models\Language;
use App\Models\Setting;
use Illuminate\Http\Request;

use Image;

class ScheduleCourseController extends Controller
{
    public function __construct()
    {
        $this->baseFolder = 'admin.schedule_courses';
        $this->indexRoute = 'admin.schedule_courses.index';
        $this->locales = Language::all();
        $this->settings = Setting::query()->first();
        view()->share(['locales' => $this->locales, 'settings' => $this->settings]);
    }



    public function index(Request $request)
    {
        $items = TargetModel::query();
        $items = $items->latest()->paginate(20);
        return view($this->baseFolder . '.home', ['items' => $items]);
    }



    public function create()
    {
        $courses_categories = CourseCategory::active()->get();
        $courses= Course::active()->get();
        $locations= Location::active()->get();
        $branches= Branch::active()->get();
        return view($this->baseFolder . '.create' , ['courses_categories' => $courses_categories ,'courses' => $courses ,'locations' => $locations ,'branches' => $branches]);
    }



    public function store(Request $request)
    {

        $locales = Language::all()->pluck('lang');

//        foreach ($locales as $locale) {
//            $roles['name_' . $locale] = 'required';
//        }
        $roles['course_date'] = 'required';
        $roles['course_duration'] = 'required';
        $roles['course_cost'] = 'required';
        $roles['course_duration_type'] = 'required';
        $roles['course_cost_currency'] = 'required';

        $this->validate($request, $roles);

        $item = new TargetModel();
        $item->course_category_id = $request->course_category_id;
        $item->course_id = $request->course_id;
        $item->location_id = $request->location_id;
        $item->branch_id = $request->branch_id;
        $item->trainer_id = $request->trainer_id;
        $item->course_date = $request->course_date;
        $item->course_duration = $request->course_duration;
        $item->course_cost = $request->course_cost;
        $item->course_cost_currency = $request->course_duration_type;
        $item->course_duration_type = $request->course_cost_currency;
        $item->status = $request->status == 'on' ? 'active' : 'not_active';

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $extention = $image->getClientOriginalExtension();
            $file_name = str_random(15) . "" . rand(1000000, 9999999) . "" . time() . "_" . rand(1000000, 9999999) . "." . $extention;
            Image::make($image)->save("uploads/schedule_courses/".$file_name);
            $item->image = $file_name;
        }

        foreach ($locales as $locale)
        {
            $item->translateOrNew($locale)->notes = $request->get('notes_' . $locale);

        }

        $item->save();

        return redirect()->route($this->indexRoute)->with('status', __('cp.create'));
    }



    public function show($id)
    {
        $item = TargetModel::findOrFail($id);
        return view($this->baseFolder . '.show', ['item' => $item]);
    }




    public function edit($id)
    {
        $item = TargetModel::findOrFail($id);
        $courses_categories = CourseCategory::active()->get();
        $courses= Course::active()->get();
        $locations= Location::active()->get();
        $branches= Branch::active()->get();
        return view($this->baseFolder . '.edit', ['item' => $item, 'courses_categories' => $courses_categories ,'courses' => $courses ,'locations' => $locations ,'branches' => $branches]);
    }




    public function update(Request $request, $id)
    {

        $locales = Language::all()->pluck('lang');

//        foreach ($locales as $locale) {
//            $roles['name_' . $locale] = 'required';
//        }
         $roles['course_date'] = 'required';
        $roles['course_duration'] = 'required';
        $roles['course_cost'] = 'required';
        $roles['course_duration_type'] = 'required';
        $roles['course_cost_currency'] = 'required';

        $this->validate($request, $roles);

//        dd($request->course_duration_type);

        $item = TargetModel::query()->findOrFail($id);
        $item->course_category_id = $request->course_category_id;
        $item->course_id = $request->course_id;
        $item->location_id = $request->location_id;
        $item->branch_id = $request->branch_id;
        $item->trainer_id = $request->trainer_id;
        $item->course_date = $request->course_date;
        $item->course_duration = $request->course_duration;
        $item->course_cost = $request->course_cost;
        $item->course_cost_currency = $request->course_cost_currency;
        $item->course_duration_type = $request->course_duration_type;
        $item->status = $request->status == 'on' ? 'active' : 'not_active';

//        if ($request->hasFile('image')) {
//            $image = $request->file('image');
//            $extention = $image->getClientOriginalExtension();
//            $file_name = str_random(15) . "" . rand(1000000, 9999999) . "" . time() . "_" . rand(1000000, 9999999) . "." . $extention;
//            Image::make($image)->save("uploads/schedule_courses/".$file_name);
//            $item->image = $file_name;
//        }
        if (isset($request->image)) {
            $item->image = uploadImage($request->image, 'schedule_courses');
        }


        foreach ($locales as $locale)
        {
            $item->translateOrNew($locale)->notes = $request->get('notes_' . $locale);

        }

        $item->save();

        return redirect()->route($this->indexRoute)->with('status', __('cp.update'));
    }




    public function destroy($id)
    {
        $item = TargetModel::query()->findOrFail($id);
        if ($item) {
            TargetModel::query()->where('id', $id)->delete();
            return "success";
        }
        return "fail";
    }


}
