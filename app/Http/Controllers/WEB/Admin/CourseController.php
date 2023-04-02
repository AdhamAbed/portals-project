<?php

namespace App\Http\Controllers\WEB\Admin;

use App\Models\CourseDate;
use App\Models\CourseRequirement;
use App\Models\CoursesContent;
use App\Models\Trainer;
use App\User;
use App\Models\Language;

use App\Models\Setting;
use App\Models\Course as TargetModel;
use App\Models\Photo;
use App\Models\CourseCategory;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Image;

class CourseController extends Controller
{


    public function __construct()
    {
        $this->baseFolder = 'admin.courses';
        $this->indexRoute = 'admin.courses.index';
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
        $trainers = Trainer::active()->get();
        $courses_categories = CourseCategory::active()->get();

        return view($this->baseFolder . '.create', ['trainers' => $trainers,'courses_categories' => $courses_categories]);
    }


    public function store(Request $request)
    {

        $roles = [
            'image' => 'required|mimes:jpeg,jpg,png,gif',
            'trainer_id' => 'required',
        ];

        $locales = Language::all()->pluck('lang');

        foreach ($locales as $locale) {
            $roles['title_' . $locale] = 'required';
            $roles['summary_' . $locale] = 'required';
            $roles['details_' . $locale] = 'required';
        }

        $this->validate($request, $roles);

        $item = new TargetModel();
        $item->course_category_id = $request->course_category_id;
        $item->trainer_id = $request->trainer_id;
        $item->type = $request->type;
        $item->course_link = $request->course_link;
        $item->price = $request->price;
        $item->discount = $request->discount;
        $item->price_after_discount = $request->price_after_discount;
        $item->hours = $request->hours;
        $item->course_language = $request->course_language;
        $item->share_post = $request->share_post;
        $item->accept_comments = $request->accept_comments;
        $item->file_type = $request->file_type;

        foreach ($locales as $locale) {
            $item->translateOrNew($locale)->title = $request->get('title_' . $locale);
            $item->translateOrNew($locale)->summary = $request->get('summary_' . $locale);
            $item->translateOrNew($locale)->details = $request->get('details_' . $locale);
        }

        if (isset($request->image)) {
            $item->image = uploadImage($request->image, 'courses');
        }


        if (isset($request->type_image) && $request->file_type == 'image') {
            $item->file = uploadImage($request->type_image, 'courses');
        }elseif (isset($request->type_file) && $request->file_type == 'file'){
            $item->file = uploadFile($request->type_file, 'courses');

        }

//        if (isset($request->video)) {
//            $item->video = uploadFile($request->video, 'courses');
//        }

        $item->save();


//        foreach ($locales as $locale) {
//            $title = 'content_title_' . $locale;
//            $desc = 'content_description_' . $locale;
//
//            if ($request->$title != null && $request->$desc != null){
//                $count = count($request->$title);
//
//            for ($i = 1; $i <= $count; $i++) {
////            dd($request->$title[$i]);
//                $content = new CoursesContent();
//                $content->course_id = $item->id;
////                dd($request->get('content_description_ar'));
////                $content->courses_content_id =$content->id;
//                $content->translateOrNew($locale)->content_title = $request->$title[$i];
//                $content->translateOrNew($locale)->content_description = $request->$desc[$i];
////            dd($request->content_description_.$locale.'['.$i.']');
//                $content->save();
//            }
//            }
//
////            $requirement = 'requirement_title_' . $locale;
////            if ($request->$requirement != null){
////                $countRequirement = count($request->$requirement);
//////                dd($request->$requirement);
////
////            for ($y = 1; $y <= $countRequirement; $y++) {
////
////                $requirement = new CourseRequirement();
////                $requirement->courses_id = $item->id;
////                $requirement->translateOrNew($locale)->requirement_title = $request->$requirement[$y];
////                $requirement->save();
////
////            }
////            }
//        }
        $contents = $request->get('contents');
        if (isset($contents)) {
            foreach ($contents as $content)
            {
                $contentData = new CoursesContent();
                $contentData->course_id  =  $item->id;
                $contentData->translateOrNew('en')->content_title = $content['content_title_en'];
                $contentData->translateOrNew('ar')->content_title = $content['content_title_ar'];
                $contentData->translateOrNew('en')->content_description = $content['content_description_ar'];
                $contentData->translateOrNew('ar')->content_description = $content['content_description_ar'];

                $contentData->save();
//                dd($contentData);
            }
        }

        $requirements = $request->get('requirements');
        if (isset($requirements)) {
            foreach ($requirements as $requirement)
            {
                $requirementData = new CourseRequirement();
                $requirementData->course_id  =  $item->id;
                $requirementData->translateOrNew('en')->requirement_title = $requirement['requirement_title_en'];
                $requirementData->translateOrNew('ar')->requirement_title = $requirement['requirement_title_ar'];

                $requirementData->save();
//                dd($requirementData);
            }
        }

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
        $trainers = Trainer::active()->get();
        $contents = CoursesContent::where('course_id' , $id)->get();
        $requirements = CourseRequirement::where('course_id' , $id)->get();
        $dates = CourseDate::where('course_id' , $id)->get();
//        dd($dates);
        return view($this->baseFolder . '.edit', ['item' => $item,
            'courses_categories' => $courses_categories ,
            'contents' => $contents,
            'requirements' => $requirements,
            'trainers' => $trainers,
            'dates' => $dates
        ]);
    }


    public function update(Request $request, $id)
    {

        $roles = [
            'image' => 'nullable|image|mimes:jpeg,jpg,png,gif',
            'trainer_id' => 'required',
        ];

        $locales = Language::all()->pluck('lang');

        foreach ($locales as $locale) {
            $roles['title_' . $locale] = 'required';
            $roles['summary_' . $locale] = 'required';
            $roles['details_' . $locale] = 'required';
        }

        $this->validate($request, $roles);

        $item = TargetModel::query()->findOrFail($id);

        $item->course_category_id = $request->course_category_id;
        $item->trainer_id = $request->trainer_id;
        $item->type = $request->type;
        $item->course_link = $request->course_link;
        $item->price = $request->price;
        $item->discount = $request->discount;
        $item->price_after_discount = $request->price_after_discount;
        $item->hours = $request->hours;
        $item->course_language = $request->course_language;
        $item->share_post = $request->share_post;
        $item->accept_comments = $request->accept_comments;
        $item->file_type = $request->file_type;

        foreach ($locales as $locale) {
            $item->translateOrNew($locale)->title = $request->get('title_' . $locale);
            $item->translateOrNew($locale)->summary = $request->get('summary_' . $locale);
            $item->translateOrNew($locale)->details = $request->get('details_' . $locale);
        }

        if (isset($request->image)) {
            $item->image = uploadImage($request->image, 'courses');
        }

//        if (isset($request->video)) {
//            $item->video = uploadFile($request->video, 'courses');
//        }

        if (isset($request->type_image) && $request->file_type == 'image') {
            $item->file = uploadImage($request->type_image, 'courses');
        }elseif (isset($request->type_file) && $request->file_type == 'file'){
            $item->file = uploadFile($request->type_file, 'courses');

        }

        $item->save();
        CoursesContent::where('course_id', $request->course_id)->delete();
        CourseDate::where('course_id', $request->course_id)->delete();
        CourseRequirement::where('course_id', $request->course_id)->delete();


        $inputs = $request->get('rows');
        if (isset($inputs)) {
        foreach ($inputs as $input)
        {
            $dates = CourseDate::create([
                'course_id'=> $item->id,
                'time_from' =>$input ['time_from'],
                'time_to' =>$input ['time_to'],
                'date'=>$input['date'],
            ]);

        }
        }
        $contents = $request->get('contents');
        if (isset($contents)) {

                foreach ($contents as $content)
                {
                    $infos= new CoursesContent();
                    $infos->course_id  =  $item->id;
//                    dd($content['content_title_'.$locale] ,  $item->id);
//                    $infos->translateOrNew($locale)->content_title = $content['content_title_'.$locale];
//                    $infos->translateOrNew($locale)->content_description = $content['content_description_'.$locale];
                    $infos->translateOrNew('en')->content_title = $content['content_title_en'];
                    $infos->translateOrNew('ar')->content_title = $content['content_title_ar'];
                    $infos->translateOrNew('en')->content_description = $content['content_description_en'];
                    $infos->translateOrNew('ar')->content_description = $content['content_description_ar'];

                    $infos->save();
                }
        }
        $requirements = $request->get('requirements');
        if (isset($requirements)) {
            foreach ($requirements as $requirement)
            {
                $requirementData = new CourseRequirement();
                $requirementData->course_id  =  $item->id;
                $requirementData->translateOrNew('en')->requirement_title = $requirement['requirement_title_en'];
                $requirementData->translateOrNew('ar')->requirement_title = $requirement['requirement_title_ar'];
                $requirementData->save();
            }
        }


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

    public function deleteDate($id)
    {
        $item = CourseDate::query()->findOrFail($id);
        if ($item) {
            CourseDate::query()->where('id', $id)->delete();
//            return response()->json(['success' => true],200);
            return response('success', 200);

//            return response(true, 200);
//            return "success";
        }else{


        return "fail";
    }
    }

    public function deleteContent($id)
    {
        $item = CoursesContent::query()->findOrFail($id);
//        dd($item);
        if ($item) {
            CoursesContent::query()->where('id', $id)->delete();
//            return response()->json(['success' => true],200);
            return response('success', 200);

//            return response(true, 200);
//            return "success";
        }else{
            return "fail";
        }
    }
    public function deleteRequirement($id)
    {
        $item = CourseRequirement::query()->findOrFail($id);
//        dd($item);
        if ($item) {
            CourseRequirement::query()->where('id', $id)->delete();
//            return response()->json(['success' => true],200);
            return response('success', 200);

//            return response(true, 200);
//            return "success";
        }else{
            return "fail";
        }
    }


}
